var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis();
var cookie = require('cookie');
var mcrypt = require('mcrypt');
var MCrypt = require('mcrypt').MCrypt;
var PHPUnserialize = require('php-unserialize');

redis.subscribe('test-channel', function(err, count) {
});

redis.on('message', function(channel, message) {
    console.log('Message Recieved: ' + message);
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
});

http.listen(3000, function(){
    console.log('Listening on Port 3000');
});


/******************************* LAB ********************************/
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
function getSessionIdFromLaravelCookie( cookie ) {

    var cookie = JSON.parse( new Buffer( cookie, 'base64' ) );

    var iv     = new Buffer( cookie.iv, 'base64' );
    var value  = new Buffer( cookie.value, 'base64' );
    var key    = '8XALUlWopC72qQtnWPN7r5LEzgCu2aJm'; // laravel app key

    var rijCbc = new MCrypt( 'rijndael-128', 'cbc' );
    rijCbc.open( key, iv ); // it's very important to pass iv argument!

    var decrypted = rijCbc.decrypt( value ).toString();

    var len = decrypted.length - 1;
    var pad = ord( decrypted.charAt( len ) );
    var sessionId = PHPUnserialize.unserialize( decrypted.substr( 0, decrypted.length - pad ) );

    return sessionId;
}

process.env.REDIS_DB = 0;
var cookieKey = 'login_82e5d2c56bdd0811318f0cf078b78bfc';
var connectedUsers = Array();
// On websocket connections
io.on( 'connection', function( client ) {

    const redisClient = Redis.createClient();
    // Select the correct redis db
    redisClient.select( process.env.REDIS_DB, function() {});
    console.log( 'Connected and listening to redis db ' + process.env.REDIS_DB + '.....' );

    // Get the laravel cookie
    var cookies        = cookie.parse( client.handshake.headers.cookie );
    var laravelSession = cookies.laravel_session;
    var sessionId      = 'laravel:' + getSessionIdFromLaravelCookie( laravelSession );
    var userId;

    // Find the user id
    redisClient.get( sessionId, function( err, session ) {
        try {
            client.laravelSession = PHPUnserialize.unserialize( PHPUnserialize.unserialize( session ) );
            connectedUsers[ client.laravelSession[ cookieKey ] ] = client;
        }
        catch ( err ) {
            console.log( 'Error unserializing session!', err );
        }

        if ( client.laravelSession[ cookieKey ] ) {
            console.log( 'User connected: ' + client.laravelSession[ cookieKey ] );
            //console.log( 'Total connected: ' + _.keys( connectedUsers ).length );
            userId = client.laravelSession[ cookieKey ];
            console.log("userid:"+userId);
        }

    } );

} );