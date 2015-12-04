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

var types = ['Earthquake', 'Flood', 'Storm', 'Volcanic eruption', 'Avalanche', 'Plant explosion', 'Pollution', 'Attack', 'Hostage'];

client.stream('statuses/filter', {track: 'twitter'},  function(stream){
  	stream.on('data', function(tweet) {
    	console.log(tweet.text);
	//allEvents.push(tsunami1);
    	io.emit('tweet', tweet, types[Math.floor(Math.random() * (8 - 0 + 1)) + 0]);
  	});

  	stream.on('error', function(error) {
    	console.log(error);
  	});
});

client.stream('statuses/filter', {track: 'Tsunami'},  function(stream){
    stream.on('data', function(tweet) {
      console.log(tweet.text);
  //allEvents.push(tsunami1);
      io.emit('tweet', tweet, 'Tsunami');
    });

    stream.on('error', function(error) {
      console.log(error);
    });
});

/*
client.stream('statuses/filter', {track: 'Flood'},  function(stream){
    stream.on('data', function(tweet) {
      console.log(tweet.text);
  //allEvents.push(tsunami1);
      io.emit('tweet', tweet, 'Flood');
    });

    stream.on('error', function(error) {
      console.log(error);
    });
});

client.stream('statuses/filter', {track: 'Storm'},  function(stream){
    stream.on('data', function(tweet) {
      console.log(tweet.text);
  //allEvents.push(tsunami1);
      io.emit('tweet', tweet, 'Storm');
    });

    stream.on('error', function(error) {
      console.log(error);
    });
});


client.stream('statuses/filter', {track: 'Volcanic eruption'},  function(stream){
    stream.on('data', function(tweet) {
      console.log(tweet.text);
  //allEvents.push(tsunami1);
      io.emit('tweet', tweet, 'Volcanic eruption');
    });

    stream.on('error', function(error) {
      console.log(error);
    });
});

client.stream('statuses/filter', {track: 'Avalanche'},  function(stream){
    stream.on('data', function(tweet) {
      console.log(tweet.text);
  //allEvents.push(tsunami1);
      io.emit('tweet', tweet, 'Avalanche');
    });

    stream.on('error', function(error) {
      console.log(error);
    });
});

/*
client.stream('statuses/filter', {track: 'Plant explosion'},  function(stream){
    stream.on('data', function(tweet) {
      console.log(tweet.text);
  //allEvents.push(tsunami1);
      io.emit('tweet', tweet, 'Plant explosion');
    });

    stream.on('error', function(error) {
      console.log(error);
    });
});

client.stream('statuses/filter', {track: 'Pollution'},  function(stream){
    stream.on('data', function(tweet) {
      console.log(tweet.text);
  //allEvents.push(tsunami1);
      io.emit('tweet', tweet, 'Pollution');
    });

    stream.on('error', function(error) {
      console.log(error);
    });
});

client.stream('statuses/filter', {track: 'Attack'},  function(stream){
    stream.on('data', function(tweet) {
      console.log(tweet.text);
  //allEvents.push(tsunami1);
      io.emit('tweet', tweet, 'Attack');
    });

    stream.on('error', function(error) {
      console.log(error);
    });
});

client.stream('statuses/filter', {track: 'Hostage'},  function(stream){
    stream.on('data', function(tweet) {
      console.log(tweet.text);
  //allEvents.push(tsunami1);
      io.emit('tweet', tweet, 'Hostage taking');
    });

    stream.on('error', function(error) {
      console.log(error);
    });
});


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

http.listen(3210, function(){
    console.log('Listening on Port 3210');
});