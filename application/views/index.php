    
    <!-- busqueda para moviles -->
    
    <div class="container-fluid hidden-sm hidden-md hidden-lg" style="background-color: #eae8e8;margin-top: 50px;padding-top: 30px">

        <div class="container">
            
            <div class="row">

                <?php  
                    $hidden = [];
                    echo form_open('Panel_ini_searchRta',['role'=>'form','class'=>'form-horizontal','method'=>'post'], $hidden);
                ?>
                
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

                <?php  
                    echo form_close();
                ?>
     


            </div>
        </div>

    </div>

    <!-- portada de imagen -->

    <div class="container-fluid c1 hidden-xs" id='c1'>

        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <img src="<?php echo base_url("assets/public/img/logo_tuyo.png"); ?>" class="img-responsive img-medium">
                </div>
            </div>

            <div class="row">

                <div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h1>Encuentra las mejores ofertas</h1>
                            <h3>y disfruta tus vacaciones al máximo</h3>
                        </div>
                    </div>

                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 panel-radi">

                            <?php  

                                $hidden =[];
                                echo form_open('Panel_ini/searchRta',['class'=>'form-horizontal','role'=>'form','method'=>'post'], $hidden);

                            ?>

                                    <div class="form-group">

                                        <label for="" class="col-sm-3 col-md-3 control-label text-bar">
                                            <span class="fa fa-map-marker text-danger"></span>
                                            &nbsp;Destino
                                        </label>

                                        <div class="col-sm-9 col-md-9">
                                            <?php  

                                                echo form_input('searchcity', '', ['class'=>'form-control','id'=>'input']);
                                            ?>
                                        </div>

                                    </div>   

                                    <div class="form-group">

                                        <label for="" class="col-sm-3 col-md-3 control-label text-bar">
                                            <span class="fa fa-calendar-check-o text-primary"></span>
                                            &nbsp;Desde
                                        </label>

                                        <div class="col-sm-9 col-md-9">

                                            <?php  
                                                echo form_input(['type'=>'date','class'=>'form-control','name'=>'searchdate1']);
                                            ?>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label for="" class="col-sm-3 col-md-3 control-label text-bar">
                                            <span class="fa fa-calendar-check-o text-primary"></span>
                                            &nbsp;Hasta
                                        </label>
                                        
                                        <div class="col-sm-9 col-md-9">

                                            <?php  
                                                echo form_input(['type'=>'date','class'=>'form-control','name'=>'searchdate2']);
                                            ?>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label for="" class="col-sm-3 col-md-3 control-label text-bar">
                                            <span class="fa fa-h-square text-info"></span>
                                                &nbsp;Busco
                                        </label>
                                        
                                        <div class="col-sm-9 col-md-9">

                                            <select class="selectpicker form-control" name="searchcategory" data-live-search="true">
                                                <?php echo $categorias; ?>
                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="col-sm-12 col-md-12">

                                            <?php  

                                                $text = "<span class='fa fa-search'></span>&nbsp;buscar";
                                                echo form_button(['type'=>'submit','class'=>'btn btn-info searchbtn','content'=>$text]);

                                            ?>

                                        </div>

                                    </div>

                            
                            <?php  

                                echo form_close();

                            ?>

                </div>

                <div class="col-xs-0 col-sm-1 col-md-2 col-lg-2">
                    
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
                <div class="col-xs-12 text-center">
                    <h3>
                        
                        <?php
                            $text="<span class='fa fa-user-o text-title'></span>&nbsp;<b>Unete a nosotros</b>";
                            echo anchor(base_url().'index.php/Signup/mainregister', $text, array('style'=>'text-decoration:none;color:inherit;'));
                        ?>

                    </h3>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="desc">
                            <h3><span class="fa fa-envelope-o text-title"></span>&nbsp;Ofertas increibles</h3>
                            <p>
                                Recibe en tu correo ofertas y descuentos increibles 
                                para tus vacaciones.
                            </p>
                        </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="desc">
                            <h3><span class="fa fa-smile-o text-title"></span>&nbsp;Fácil y rápido</h3>
                            <p>
                                Desde la comodidad de tu hogar u oficina, reservar tus proximas vacaciones.
                            </p>
                        </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
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
