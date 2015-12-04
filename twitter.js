var Twitter = require('twitter');
var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis();
var util = require("util");
require('dotenv').load();
 
var client = new Twitter({
  consumer_key: '25XWN9IhktIvqHocWSh9Skz66',
  consumer_secret: 'NECaQiQgNGAXA90JGVVyCnAilwIkO2n3s3Xh4u46ZFhEscVuOW',
  access_token_key: '2321461308-aofEHjfFnuZtidJqEzSogQ1vkkDQUBP5pC5l0XQ',
  access_token_secret: 'HWgdvEDOCSbijblbapmtIn8ld8AJfM3YgjkNtcMnLr03S'
});
 
var params = {screen_name: 'nodejs'};

/*
client.get('statuses/user_timeline', params, function(error, tweets, response){
  if (!error) {
    console.log(tweets);
  }
});
*/


client.stream('statuses/filter', {track: 'twitter'},  function(stream){
  	stream.on('data', function(tweet) {
    	console.log(tweet.text);
	//allEvents.push(tsunami1);
    	io.emit('tweet', tweet, 'Earthquake');
  	});

  	stream.on('error', function(error) {
    	console.log(error);
  	});
});

/*
client.stream('statuses/filter', {follow: 2321461308},  function(stream){
  stream.on('data', function(tweet) {
    console.log(tweet.text);
    io.socket.emit('tweet', tweet);
    //console.log(tweet.place.bounding_box.coordinates[0][0][0]);
  });

  stream.on('error', function(error) {
    console.log(error);
  });
});
*/

io.on( 'connection', function( client ) {
});

http.listen(3000, function(){
    console.log('Listening on Port 3000');
});