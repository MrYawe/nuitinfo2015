@extends('app')

@section('content')
    <p id="power">0</p>
@stop

@section('javascript')
    <script src="https://cdn.socket.io/socket.io-1.3.5.js"></script>
    <script>
        //var socket = io('http://localhost:3000');
        var socket = io('http://nuitinfo2015.app:3000');
        socket.on("test-channel:App\\Events\\EventName", function(message){
            // increase the power everytime we load test route
            $('#power').text(parseInt($('#power').text()) + parseInt(message.data.power));
        });
    </script>
@stop