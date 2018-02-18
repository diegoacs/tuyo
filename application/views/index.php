    
    <!-- portada de imagen -->
    
    <div class="container-fluid" style="background-color: #eae8e8;margin-top: 50px;padding-top: 30px">

        <div class="container">
            
            <div class="row">
                
                <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/Panel_ini/searchRta'); ?>">

                    <div class="form-group text-center">

                        <label class="control-label col-xs-12">
                            <span class="fa fa-search"></span>&nbsp;
                            Busco
                        </label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <select class="selectpicker form-control" name="searchcategory" data-live-search="true">
                                
                                <?php echo $categorias; ?>

                            </select>
                        </div>                        
                    </div>
                    
                    <div class="form-group text-center">

                        <label class="control-label col-xs-12">
                            <span class="fa fa-map-marker"></span>&nbsp;
                            Lugar
                        </label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
                            
                            <?php

                                echo form_input(array('type'=>'text','name'=>'searchcity',
                                                    'class'=>'form-control'));
                            ?>

                        </div>                        
                    </div>

                    <div class="form-group text-center">
                        
                        <label class="control-label col-xs-6">
                            <span class="fa fa-calendar"></span>&nbsp;
                            Llegada
                        </label>
                        <label class="control-label col-xs-6">
                            <span class="fa fa-calendar"></span>&nbsp;
                            Salida
                        </label>

                    </div>
                    
                    <div class="form-group">

                        <div class="col-xs-6">
                            
                            <?php

                                echo form_input(array('type'=>'date','class'=>'form-control','name'=>'finin'));
                            ?>
                        </div>
                        <div class="col-xs-6">
                            
                            <?php

                                echo form_input(array('type'=>'date','class'=>'form-control','name'=>'ffin'));
                            ?>
                        </div>


                    </div>

                    <div class="form-group text-center">
                        
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-info searchbtn">
                                <span class="fa fa-search"></span>&nbsp;buscar
                            </button>
                        </div>

                    </div>  

                </form>
     


            </div>
        </div>

    </div>

    <div class="container-fluid c1 hidden-xs hidden-sm" id='c1'>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <img src="<?php echo base_url("assets/public/img/logo_tuyo.png"); ?>" class="img-responsive img-medium">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h1>Encuentra las mejores ofertas</h1>
                            <h3>y disfruta tus vacaciones al máximo</h3>
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 panel-radi">

                            <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('index.php/Panel_ini/searchRta'); ?>">
                                    <div class="form-group">
                                        <label for="" class="col-sm-12 col-md-4 control-label text-bar"><span class="fa fa-map-marker text-danger"></span>&nbsp;Destino</label>
                                        <div class="col-sm-12 col-md-8">
                                            <input type="text" id="input" class="form-control" name="searchcity">
                                        </div>
                                    </div>                                
                                    <div class="form-group">
                                        <label for="" class="col-sm-12 col-md-4 control-label text-bar"><span class="fa fa-calendar-check-o text-primary"></span>&nbsp;Desde</label>
                                        <div class="col-sm-12 col-md-8">
                                        <input type="date" class="form-control" name="searchdate1">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-sm-12 col-md-4 control-label text-bar"><span class="fa fa-calendar-check-o text-primary"></span>&nbsp;Hasta</label>
                                        <div class="col-sm-12 col-md-8">
                                        <input type="date" class="form-control" name="searchdate2">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-12 col-md-4 control-label text-bar"><span class="fa fa-h-square text-info"></span>&nbsp;Busco</label>
                                        <div class="col-sm-12 col-md-8">
                                            <select class="selectpicker form-control" name="searchcategory" data-live-search="true">
                                                <?php echo $categorias; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-12 col-md-offset-4 col-sm-12 col-md-8">
                                            <button type="submit" class="btn btn-info searchbtn">
                                                <span class="fa fa-search"></span>&nbsp;buscar
                                            </button>
                                        </div>
                                    </div>
                            </form>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    
                </div>
            </div>
        </div>
    </div>

    <!-- ciudades -->
    <div class="container-fluid c4 hidden-xs hidden-sm">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <h3><span class="fa fa-map-signs text-title"></span>&nbsp;<b>Guia de ciudades</b></h3>
                </div>
            </div>
            <br><br>

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="gallery-places">
                        <div>
                            <a href="<?php echo base_url('index.php/Panel_ini/cityDetails/912'); ?>">
                            <img src="<?php echo base_url("assets/public/img/bucaramanga.jpg?n=".rand()); ?>" alt="Sitio A">
                            </a>
                        </div>
                        <div>
                            <a href="<?php echo base_url('index.php/Panel_ini/cityDetails/939'); ?>">
                            <img src="<?php echo base_url("assets/public/img/giron.jpg?n=".rand()); ?>" alt="Sitio A">
                            </a>
                        </div>
                        <div>
                            <a href="<?php echo base_url('index.php/Panel_ini/cityDetails/951'); ?>">
                            <img src="<?php echo base_url("assets/public/img/lebrija.jpg?n=".rand()); ?>" alt="Sitio A">
                            </a>
                        </div>
                        <div>
                            <a href="<?php echo base_url('index.php/Panel_ini/cityDetails/936'); ?>">
                            <img src="<?php echo base_url("assets/public/img/florida.jpg?n=".rand()); ?>" alt="Sitio A">
                            </a>
                        </div>
                        <div>
                            <a href="<?php echo base_url('index.php/Panel_ini/cityDetails/964'); ?>">
                            <img src="<?php echo base_url("assets/public/img/piedecuesta.jpg?n=".rand()); ?>" alt="Sitio A">
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- lugares cercanos -->
    <div class="row c2 hidden-xs hidden-sm">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2 class="text-center text-title">
                <span class="fa fa-map-marker text-danger"></span>
                 <b>Lugares cerca de ti</b>
            </h2>
        </div>
    </div>

    <!-- map -->
    <div class="container-fluid mapgral hidden-xs hidden-sm">
        <input type="hidden" id='routelist' value="<?php echo base_url("assets/public/img/logo2.png"); ?>">
        <div id="map_gral" style="height: 400px; width:auto;"></div>

        <script>
    
            var map;
            var route='http://localhost/tuyo/index.php/';

            var customLabel = {
                hotel: {
                    label: 'H'
                },
                bar: {
                    label: 'B'
                }
            };

            function initMap() {
                //Obtenemos latitud y longitud
                function localizacion(posicion){

                    var latitude = posicion.coords.latitude;
                    var longitude = posicion.coords.longitude;

                    map = new google.maps.Map(document.getElementById('map_gral'), {
                    center: {lat: latitude, lng: longitude},
                    zoom: 10
                    });

                    var infoWindow = new google.maps.InfoWindow;
                    
                    downloadUrl(route+'Panel_ini/getMapData/', function(data) {
                        var xml = data.responseXML;
                        var markers = xml.documentElement.getElementsByTagName('marker');
                        Array.prototype.forEach.call(markers, function(markerElem) {
                          var name = markerElem.getAttribute('name');
                          var address = markerElem.getAttribute('address');
                          var type = markerElem.getAttribute('type');
                          var point = new google.maps.LatLng(
                              parseFloat(markerElem.getAttribute('lat')),
                              parseFloat(markerElem.getAttribute('lng')));

                          var infowincontent = document.createElement('div');
                          var strong = document.createElement('strong');
                          strong.textContent = name
                          infowincontent.appendChild(strong);
                          infowincontent.appendChild(document.createElement('br'));

                          var text = document.createElement('text');
                          text.textContent = address
                          infowincontent.appendChild(text);
                          var icon = customLabel[type] || {};
                          var marker = new google.maps.Marker({
                            map: map,
                            position: point,
                            label: icon.label
                          });
                          marker.addListener('click', function() {
                            infoWindow.setContent(infowincontent);
                            infoWindow.open(map, marker);
                          });
                        });
                    });                   
                }



                function error(){
                    $("#map_gral").html("tu navegador no soporta geolocation");
                }

                function downloadUrl(url, callback) {
                    var request = window.ActiveXObject ?
                        new ActiveXObject('Microsoft.XMLHTTP') :
                        new XMLHttpRequest;

                    request.onreadystatechange = function() {
                        if (request.readyState == 4) {
                            request.onreadystatechange = doNothing;
                            callback(request, request.status);
                        }
                    };

                    request.open('GET', url, true);
                    request.send(null);
                }

              function doNothing() {}

                // iniciar funcion
                navigator.geolocation.getCurrentPosition(localizacion,error);
            }

        </script>
    </div>

    <!-- unete a nosostros -->
    <div class="container-fluid c4">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <h3>
                        
                        <?php
                            $text="<span class='fa fa-user-o text-title'></span>&nbsp;<b>Unete a nosotros</b>";
                            echo anchor(base_url().'index.php/Signup/mainregister', $text, array(
                                                                                                 'style'=>'text-decoration:none;color:inherit;'));
                        ?>

                    </h3>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="desc">
                            <h3><span class="fa fa-envelope-o text-title"></span>&nbsp;Ofertas increibles</h3>
                            <p>
                                Recibe en tu correo ofertas y descuentos increibles 
                                para tus vacaciones.
                            </p>
                        </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="desc">
                            <h3><span class="fa fa-smile-o text-title"></span>&nbsp;Fácil y rápido</h3>
                            <p>
                                Desde la comodidad de tu hogar u oficina, reservar tus proximas vacaciones.
                            </p>
                        </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="desc">
                            <h3><span class="fa fa-heart text-title"></span>&nbsp;Compartenos</h3>
                            <p>
                                Comparte con tus amigos la mejor experiencia, buscanos en las redes sociales.
                            </p>
                        </div>
                </div>             
            </div>  
        </div>
    </div> 


<!--     <div class="container-fluid c2" id='c2'>
        <div class="container">
            <h2 class="text-center text-title">
                <span class="fa fa-map-marker text-danger"></span>
                 <b>Lugares cerca de ti</b></h2>
            <br><br>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 marginA">
                    <div id="map_gral" style="height: 400px; width: 100%"></div>



                    <script>
                        var map;
                        function initMap() {
                            map = new google.maps.Map(document.getElementById('map_gral'), {
                            center: {lat: -34.397, lng: 150.644},
                            zoom: 9
                        });

                        var marker = new google.maps.Marker({
                            position: {lat: -34.397, lng: 150.644},
                            map: map,
                            title: 'Hello World!',
                            animation: google.maps.Animation.BOUNCE,
                            draggable: true
                        });
                    }

                    </script>







                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 panel-destacado">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 marginA">
                                <div>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href=" <?php echo base_url('index.php/Panel_ini/productDetals'); ?> ">
                                                <img class="media-object img-circle img-ini"
                                                src="<?php echo base_url('assets/public/img/mp3.jpg'); ?>" alt="Villa María Paula">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"><span class="fa fa-bookmark-o text-title"></span>&nbsp;Villa María Paula</h4>
                                            <p>Finca campestre en Floridablanca<br>
                                            <a href="<?php echo base_url('index.php/Panel_ini/productDetals');?>">
                                                <span class="fa fa-chevron-circle-right text-title"></span>&nbsp;ver más
                                            </a> 
                                            </p>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 marginA">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object img-circle img-ini" 
                                        src="<?php echo base_url("assets/public/img/parapente.jpg"); ?>" alt="hotel colonial">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><span class="fa fa-bookmark-o text-title"></span>&nbsp;Parapente</h4>
                                    <p>Parapente y deportes extremos <br>
                                    <a href="#"><span class="fa fa-chevron-circle-right text-title"></span>&nbsp;ver más</a> </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 marginA">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object img-circle img-ini" 
                                        src="<?php echo base_url("assets/public/img/colonial1.jpg"); ?>" alt="hotel colonial">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><span class="fa fa-bookmark-o text-title"></span>&nbsp;Hotel Real</h4>
                                    <p>Hotel estilo colonial,buena ubicación en centro histórico de la ciudad. <br>
                                    <a href="#"><span class="fa fa-chevron-circle-right text-title"></span>&nbsp;ver más</a> </p>
                                </div>
                            </div>
                        </div>   

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 marginA text-right">
                            <button type="button" class="btn btn-danger">
                                más lugares&nbsp;<span class="fa fa-arrow-right"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


<!--     <div class="container-fluid c3 main-destacado" id='c3'>
        <div class="container" >
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <h3><span class="fa fa-map text-title"></span>&nbsp;<b>Lugares destacados</b></h3>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-1 col-lg-1"></div>
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 destaca">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-circle img-oferta" 
                                src="<?php echo base_url("assets/public/img/colonial.jpg"); ?>" alt="hotel colonial">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><span class="fa fa-bookmark-o text-title"></span>&nbsp;Hotel Colonial</h4>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star-o color-star'></span>
                            <br>                             
                            <a href="#"><span class="fa fa-chevron-circle-right text-title"></span>&nbsp;ver más</a>
                        </div>
                    </div>
                </div>      
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 destaca">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-circle img-oferta" 
                                src="<?php echo base_url("assets/public/img/colonial.jpg"); ?>" alt="hotel colonial">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><span class="fa fa-bookmark-o text-title"></span>&nbsp;Hotel Colonial</h4>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star-o color-star'></span>
                            <br>                             
                            <a href="#"><span class="fa fa-chevron-circle-right text-title"></span>&nbsp;ver más</a>
                        </div>
                    </div>
                </div>  
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 destaca">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-circle img-oferta" src="<?php echo base_url("assets/public/img/colonial.jpg"); ?>" alt="hotel colonial">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><span class="fa fa-bookmark-o text-title"></span>&nbsp;Hotel Colonial</h4>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star-o color-star'></span>
                            <br>                             
                            <a href="#"><span class="fa fa-chevron-circle-right text-title"></span>&nbsp;ver más</a>
                        </div>
                    </div>
                </div>      
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 destaca">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-circle img-oferta" src="<?php echo base_url("assets/public/img/colonial.jpg"); ?>" alt="hotel colonial">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><span class="fa fa-bookmark-o text-title"></span>&nbsp;Hotel Colonial</h4>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star-o color-star'></span>
                            <br>                             
                            <a href="#"><span class="fa fa-chevron-circle-right text-title"></span>&nbsp;ver más</a>
                        </div>
                    </div>
                </div>   
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 destaca">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-circle img-oferta" src="<?php echo base_url("assets/public/img/colonial.jpg"); ?>" alt="hotel colonial">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><span class="fa fa-bookmark-o text-title"></span>&nbsp;Hotel Colonial</h4>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star-o color-star'></span>
                            <br>                             
                            <a href="#"><span class="fa fa-chevron-circle-right text-title"></span>&nbsp;ver más</a>
                        </div>
                    </div>
                </div>    
                <div class="col-xs-2 col-sm-2 col-md-1 col-lg-1"></div>
            </div>
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-1 col-lg-1"></div>
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 destaca">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-thumbnail img-oferta" src="<?php echo base_url("assets/public/img/colonial.jpg"); ?>" alt="hotel colonial">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><span class="fa fa-bookmark-o text-title"></span>&nbsp;Hotel Colonial</h4>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star-o color-star'></span>
                            <span class='fa fa-star-o color-star'></span>
                            <br>   
                            <a href="#"><span class="fa fa-chevron-circle-right text-title"></span>&nbsp;ver más</a>
                        </div>
                    </div>
                </div>   
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 destaca">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-thumbnail img-oferta" src="<?php echo base_url("assets/public/img/colonial.jpg"); ?>" alt="hotel colonial">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><span class="fa fa-bookmark-o text-title"></span>&nbsp;Hotel Colonial</h4>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star-o color-star'></span>
                            <span class='fa fa-star-o color-star'></span>
                            <br>                             
                            <a href="#"><span class="fa fa-chevron-circle-right text-title"></span>&nbsp;ver más</a>
                        </div>
                    </div>
                </div>  
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 destaca">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-thumbnail img-oferta" src="<?php echo base_url("assets/public/img/colonial.jpg"); ?>" alt="hotel colonial">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><span class="fa fa-bookmark-o text-title"></span>&nbsp;Hotel Colonial</h4>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star-o color-star'></span>
                            <span class='fa fa-star-o color-star'></span>
                            <br>                             
                            <a href="#"><span class="fa fa-chevron-circle-right text-title"></span>&nbsp;ver más</a>
                        </div>
                    </div>
                </div>      
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 destaca">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-thumbnail img-oferta" src="<?php echo base_url("assets/public/img/colonial.jpg"); ?>" alt="hotel colonial">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><span class="fa fa-bookmark-o text-title"></span>&nbsp;Hotel Colonial</h4>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star-o color-star'></span>
                            <span class='fa fa-star-o color-star'></span>
                            <br>                             
                            <a href="#"><span class="fa fa-chevron-circle-right text-title"></span>&nbsp;ver más</a>
                        </div>
                    </div>
                </div>  
                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 destaca">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-thumbnail img-oferta" src="<?php echo base_url("assets/public/img/colonial.jpg"); ?>" alt="hotel colonial">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><span class="fa fa-bookmark-o text-title"></span>&nbsp;Hotel Colonial</h4>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star color-star'></span>
                            <span class='fa fa-star-o color-star'></span>
                            <span class='fa fa-star-o color-star'></span>
                            <br>                             
                            <a href="#"><span class="fa fa-chevron-circle-right text-title"></span>&nbsp;ver más</a>
                        </div>
                    </div>
                </div>     
                <div class="col-xs-2 col-sm-2 col-md-1 col-lg-1"></div>
            </div>
          
        </div>
    </div>   -->


 


