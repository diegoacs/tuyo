
<div class="modal fade" id="map_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Mapa de lugares</h4>
            </div>
            <div class="modal-body">

                <div id="map_gral" style="height: 400px; width:auto;"></div>
                <input type="hidden" id='lat' value='<?php echo $lat; ?>'>
                <input type="hidden" id='lon' value='<?php echo $lon; ?>'>
                <input type="hidden" id='routelist' value="<?php echo base_url("assets/public/img/logo2.png"); ?>">

                <script>
                    
                    var lat = parseFloat(document.getElementById('lat').value);
                    var lon = parseFloat(document.getElementById('lon').value);
                    var map;
                    function initMap() {
                        //Obtenemos latitud y longitud
                        function localizacion(posicion){

                            var img=document.getElementById('routelist').value;
                            map = new google.maps.Map(document.getElementById('map_gral'), {
                            center: {lat: lat, lng: lon},
                            zoom: 16
                            });

                            var mark = new google.maps.Marker({
                                position: {lat: lat, lng: lon},
                                map: map,
                                icon: img,
                                title: 'Nombre',
                                draggable: false
                            });                  
                        }

                        function error(){
                            document.getElementById('map_gral').innerHTML="tu navegador no soporta geolocation";
                        }

                        // iniciar funcion
                        navigator.geolocation.getCurrentPosition(localizacion,error);
                    }

                </script>
                
            </div>
        </div>
    </div>
</div>