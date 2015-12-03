var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis();
var cookie = require('cookie');
var mcrypt = require('mcrypt');
var MCrypt = require('mcrypt').MCrypt;
var PHPUnserialize = require('php-unserialize');
var util = require("util");
require('dotenv').load();

process.env.REDIS_DB = 0;
var cookieKey = 'login_82e5d2c56bdd0811318f0cf078b78bfc'; // name of the cookie used for authentication. Get by Auth::getName() in Laravel
var key = process.env.APP_KEY;

var connectedUsers = [];

redis.psubscribe('*', function(err, count) {
});

redis.on('pmessage', function(subscribed, channel, message) {
    message = JSON.parse(message);
   
    if(!message.data.to) { // si il n'y a pas de destinataire défini -> c'est un message public 
        console.log('Public Message Recieved: ' + util.inspect(message));
        io.emit(channel + ':' + message.event, message.data);
    }
});

/**
 * Helper function to return ASCII code of character
 * @param  [string] string
 * @return [ascii code]
 */
function ord( string ) {
    return string.charCodeAt( 0 );
}

/**
 * This function retrieves the laravel session stored in redis
 * from a cookie
 * @param  [cookie] cookie
 * @return session
 */
function getSessionIdFromLaravelCookie( cookie, key ) {

    var cookie = JSON.parse( new Buffer( cookie, 'base64' ) );

    var iv     = new Buffer( cookie.iv, 'base64' );
    var value  = new Buffer( cookie.value, 'base64' );

    var rijCbc = new MCrypt( 'rijndael-128', 'cbc' );
    rijCbc.open( key, iv ); // it's very important to pass iv argument!

    var decrypted = rijCbc.decrypt( value ).toString();

    var len = decrypted.length - 1;
    var pad = ord( decrypted.charAt( len ) );
    var sessionId = PHPUnserialize.unserialize( decrypted.substr( 0, decrypted.length - pad ) );

    return sessionId;
}

// On websocket connections
io.on( 'connection', function( client ) {

    const redisClient = Redis.createClient();
    // Select the correct redis db
    redisClient.select( process.env.REDIS_DB, function() {});
    console.log( 'Connected and listening to redis db ' + process.env.REDIS_DB + '.....' );

    // Get the laravel cookie
    var cookies        = cookie.parse( client.handshake.headers.cookie );
    var laravelSession = cookies.laravel_session;
    var sessionId      = 'laravel:' + getSessionIdFromLaravelCookie( laravelSession, key );
    var userId;

    // Find the user id
    redisClient.get( sessionId, function( err, session ) {
        try {
            client.laravelSession = PHPUnserialize.unserialize( PHPUnserialize.unserialize( session ) );
            userId = client.laravelSession[ cookieKey ];
            connectedUsers[ userId ] = client;
        }
        catch ( err ) {
            console.log( 'Error unserializing session!', err );
        }

        if ( userId ) {
            console.log( 'User connected: ' + userId );
            //console.log( 'Total connected: ' + connectedUsers.length-1);
            //console.log("Session:" + util.inspect(connectedUsers));
        }

    });


    redisClient.psubscribe('*', function(err, count) {

    });

    redisClient.on('pmessage', function(subscribed, channel, message) {

        message = JSON.parse( message );

        // Check to see whether this user should recieve this message
        if ( message.data.to && message.data.to.indexOf( userId ) > -1 ) {

            // Check the message is not from the connected user
            console.log('Private Message Recieved : ' + util.inspect(message));
            client.emit(channel + ':' + message.event, message.data);
        }
    });

});

http.listen(3000, function(){
    console.log('Listening on Port 3000');
});
