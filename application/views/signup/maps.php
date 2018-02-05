<script type="text/javascript">

    var route='http://localhost/tuyo/index.php/';
    function getAddressParts(obj) {

        var address = [];

        obj.address_components.forEach( function(el) {
            address[el.types[0]] = el.short_name;
        });

        return address;

    } //getAddressParts()


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

                            var addressParts =  getAddressParts(results[0]);

                            var city = addressParts.locality;

                            var state = addressParts.administrative_area_level_1;

                            var country = addressParts.country;

                            var postal = addressParts.postal_code;

                            $("#postal").val(postal);

                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {

                                    var rtx = this.responseText;
                                    var rta =rtx.split(String.fromCharCode(9));

                                    setTimeout(function(){ 

                                        $("#departamento").val(rta[1]);
                                        $("#departamento").change();

                                    }, 2000);
                                    setTimeout(function(){ 

                                        $("#ciudad").val(rta[2]);
                                        $("#ciudad").change();

                                    }, 4000);

                                }
                            };

                            if(city == undefined) var stat='0';
                            else var stat ='1';

                            var rta ='country='+country+'&state='+state+'&city='+city+'&stat='+stat;
                            xhttp.open("GET", route+"Signup/getPositions?"+rta, true);
                            xhttp.send();

                            

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
