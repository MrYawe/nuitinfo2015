@extends('app')

@section('content')
    <style>
        body {
            font-family: Monospace;
            background-color: #000;
            margin: 0px;
            overflow: hidden;
        }
    </style>
@stop

@section('javascript')
    <script src="{{ asset('assets/bower/three.js/build/three.min.js') }}"></script>
    <script src="{{ asset('assets/js/Detector.js') }}"></script>
    <script src="{{ asset('assets/js/stats.min.js') }}"></script>
    <script>
        var imgPath = "{{ asset('assets/img/UV_Grid_Sm.jpg') }}";
    </script>
    <!-- api webglearth pour le globe -->
    <script src="{{ asset('assets/js/webglearth_api.js') }}"></script>
    <!-- les options pour l'api -->
    <script src="{{ asset('assets/js/threejs-planete.js') }}"></script>
@stop