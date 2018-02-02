<script type="text/javascript">
            var map = null;
            var infoWindow = null;
            var geocoder = null;

            function initMap() {
                //Obtenemos latitud y longitud
                function localizacion(posicion){

                    var latitude = '';
                    var longitude ='';

                    if($('#latitude').val()>0) latitude = parseFloat($('#latitude').val());
                    else latitude = posicion.coords.latitude;
                    if($('#longe').val()>0) longitude = parseFloat($('#longe').val());
                    else longitude = posicion.coords.longitude;
                    map = new google.maps.Map(document.getElementById('map_canvas'), {
                    center: {lat: latitude, lng: longitude},
                    zoom: 10
                    });

                    infoWindow = new google.maps.InfoWindow();
                    var myLatlng = new google.maps.LatLng(latitude,longitude);
                    var marker = new google.maps.Marker({
                        position: myLatlng,
                        draggable: true,
                        map: map,
                        title:'Buscar mi posicion'
                    });

                    google.maps.event.addListener(marker, 'click', function(){
                        openInfoWindow(marker);
                    });
                                       
                }

                function openInfoWindow(marker) {
                    var markerLatLng = marker.getPosition();
                    infoWindow.setContent([
                        'Latitud: ',
                        markerLatLng.lat(),
                        ',Longitud: ',
                        markerLatLng.lng(),
                        '<br>Mueva el cursor y haga click para actualizar posición.'
                    ].join(''));
                    infoWindow.open(map, marker);
                    document.getElementById('latitude').value=markerLatLng.lat();
                    document.getElementById('longe').value=markerLatLng.lng();
                    document.getElementById('latlng').value=markerLatLng.lat()+','+markerLatLng.lng();



                }

                var geocoder = new google.maps.Geocoder;
                var infowindow = new google.maps.InfoWindow;

                document.getElementById('getGeo').addEventListener('click', function() {
                    geocodeLatLng(geocoder, map, infowindow);
                });


                function geocodeLatLng(geocoder, map, infowindow) {

                    var input = document.getElementById('latlng').value;

                    if(input=='') return false;

                    var latlngStr = input.split(',', 2);
                    var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};

                    geocoder.geocode({'location': latlng}, function(results, status) {
                        if (status === 'OK') {

                            if (results[1]) {

                                document.getElementById('direccionentidad').value=results[1].formatted_address;

                            } 
                            else {
                                document.getElementById('direccionentidad').value='';
                            }

                        } 
                        else {
                            document.getElementById('direccionentidad').value='Geocoder failed due to: ' + status;
                        }

                    });
                }

                function error(){
                    $("#map_canvas").html("tu navegador no soporta geolocation");
                }
              function doNothing() {}
                // iniciar funcion
                navigator.geolocation.getCurrentPosition(localizacion,error);
            }
</script>
