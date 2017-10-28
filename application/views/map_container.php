<div class="container-fluid c2">
    <div id="map_canvas"></div>
    <script type="text/javascript">
        var map;
        function initMap(){
            map = new google.maps.Map(document.getElementById('map_canvas'),{
                center: {lat: -34.397, lng: 150.644},
                zoom: 9
            });
            var maker= new google.maps.Marker({
                position: {lat: -34.397 , lng: 150.644 },
                map: map,
                title: "Mi ejemplo."
            });
        }
    </script>
</div>