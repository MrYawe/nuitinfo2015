@extends('app')

@section('content')
    <p id="power">0</p>
    <ul id="chat">
    </ul>
@stop

@section('javascript')
    <!--<script src="https://cdn.socket.io/socket.io-1.3.5.js"></script>-->
    <script src="{{ asset('assets/js/socket.io/socket.io.js') }}"></script>
    <script>
        //var socket = io('http://localhost:3000');
        var socket = io('http://nuitinfo2015.app:3000');
        
        socket.on("test-channel:App\\Events\\EventName", function(message){
            // increase the power everytime we load test route
            $('#power').text(parseInt($('#power').text()) + parseInt(message.data.power));
        });

        socket.on("test-private-message:App\\Events\\PrivateMessageTest", function(message){
            $('#chat').append('<li>'+message.from.name+' : '+message.text+'</li>');
        });
    </script>
@stop