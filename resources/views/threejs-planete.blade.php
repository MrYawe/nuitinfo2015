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
        // transformation en tableau JSON des types d'événement
        var eventsInterm = "{{ json_encode($lesEvents) }}";
        var intermEvents = eventsInterm.replace(/&quot;/g, '"');
        var typesEvents = jQuery.parseJSON(intermEvents);
        console.log(typesEvents);
    </script>
    <!-- api webglearth pour le globe -->
    <script src="{{ asset('assets/js/webglearth_api.js') }}"></script>
    <!-- les options pour l'api -->
    <script src="{{ asset('assets/js/threejs-planete.js') }}"></script>
    <script src="{{ asset('assets/js/socket.io/socket.io.js') }}"></script>
    <script>
        var socket = io("{{url()}}:3000");
        var imark = 1;
        var afermer;
        socket.on("tweet", function(tweet, type){
            console.log("message");

            var color;
            for (var j=0; j<typesEvents.length;j++) {
                if(type == typesEvents[j].name) {
                    color = typesEvents[j].color;
                }
            }

            var x = tweet.place.bounding_box.coordinates[0][0][1];
            var y = tweet.place.bounding_box.coordinates[0][0][0];
            
            var marker = WE.marker([x, y], color).addTo(earth);
            marker.bindPopup("<b>" + type + "</b><br>" + tweet.place.name, {maxWidth: 150, closeButton: true});  
            //allMarkers.push(marker);
            marker.id = imark;
            var enregistrerIdMarker = function(e) {
                if(afermer) { // not null = existe, donc y'a une valeur à fermer
                    afermer.closePopup();
                    afermer=marker;
                }
                else { // afermer = 1ère popup qu'on ouvre
                    afermer=marker;
                }
                
            };
            marker.on('click', enregistrerIdMarker);
            imark++;

            /*allEvents.push({ 
                x:tweet.place.bounding_box.coordinates[0][0][1], 
                y:tweet.place.bounding_box.coordinates[0][0][0], 
                type: type, 
                ville: tweet.place.name
            });
            */
        });
    </script>
@stop