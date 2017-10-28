    
    <!-- portada de imagen -->
    <div class="container-fluid c1" id='c1'>
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
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                            <button type="button" class="btn btn-info">
                                <span class="fa fa-search"></span>&nbsp;buscar ahora
                            </button>
                            <br><br>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 panel-radi">

                            <div class="form-horizontal">
                                    <div class="form-group">
                                        <label for="" class="col-sm-12 col-md-4 control-label text-bar"><span class="fa fa-map-marker text-danger"></span>&nbsp;Destino</label>
                                        <div class="col-sm-12 col-md-8">
                                            <input type="text" id="input" class="form-control">
                                        </div>
                                    </div>                                
                                    <div class="form-group">
                                        <label for="" class="col-sm-12 col-md-4 control-label text-bar"><span class="fa fa-calendar-check-o text-primary"></span>&nbsp;Fecha</label>
                                        <div class="col-sm-12 col-md-8">
                                        <input type="date" class="form-control" id="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-sm-12 col-md-4 control-label text-bar"><span class="fa fa-h-square text-info"></span>&nbsp;Busco</label>
                                        <div class="col-sm-12 col-md-8">
                                            <select name="" id="input" class="form-control">
                                                <option value="H">Hoteles</option>
                                                <option value="A">Apartamentos</option>
                                                <option value="R">Espacios recreativos</option>
                                            </select>
                                        </div>
                                    </div>
                            </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    
                </div>
            </div>
        </div>
    </div>

    <!-- ciudades -->
    <div class="container-fluid c4">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <h3><span class="fa fa-map-signs text-title"></span>&nbsp;<b>Guia de ciudades</b></h3>
                </div>
            </div>
            <br><br>

            <div id="guiciudad" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#guiciudad" data-slide-to="0" class="active"></li>
                    <li data-target="#guiciudad" data-slide-to="1" class=""></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <a href="<?php echo base_url('index.php/Panel_ini/cityDetails/Floridablanca'); ?>">
                                <img src="<?php echo base_url("assets/public/img/bucaramanga.jpg?n=".rand()); ?>" alt="Sitio A" class="img-guia img-thumbnail img-responsive">
                                <h3>Bucaramanga</h3>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <a href="<?php echo base_url('index.php/Panel_ini/cityDetails/Floridablanca'); ?>">
                                <img src="<?php echo base_url("assets/public/img/giron.jpg?n=".rand()); ?>" alt="Sitio A" class="img-guia img-thumbnail img-responsive">
                                <h3>Girón</h3>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <a href="<?php echo base_url('index.php/Panel_ini/cityDetails/Floridablanca'); ?>">
                                <img src="<?php echo base_url("assets/public/img/lebrija.jpg?n=".rand()); ?>" alt="Sitio A" class="img-guia img-thumbnail img-responsive">
                                <h3>Lebrija</h3>
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <a href="<?php echo base_url('index.php/Panel_ini/cityDetails/Floridablanca'); ?>">
                                <img src="<?php echo base_url("assets/public/img/florida.jpg?n=".rand()); ?>" alt="Sitio A" class="img-guia img-thumbnail">
                                <h3>Floridablanca</h3>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <a href="<?php echo base_url('index.php/Panel_ini/cityDetails/Floridablanca'); ?>">
                                <img src="<?php echo base_url("assets/public/img/piedecuesta.jpg?n=".rand()); ?>" alt="Sitio A" class="img-guia img-thumbnail">
                                <h3>Piedecuesta</h3>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <a href="<?php echo base_url('index.php/Panel_ini/cityDetails/Floridablanca'); ?>">
                                <img src="<?php echo base_url("assets/public/img/lebrija.jpg?n=".rand()); ?>" alt="Sitio A" class="img-guia img-thumbnail">
                                <h3>Lebrija</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <a class="left" href="#guiciudad" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right" href="#guiciudad" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
    </div>

    <!-- lugares cercanos -->
    <div class="row c2">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2 class="text-center text-title">
                <span class="fa fa-map-marker text-danger"></span>
                 <b>Lugares cerca de ti</b>
            </h2>
        </div>
    </div>

    <!-- map -->
    <div class="container-fluid mapgral">
        <input type="hidden" id='routelist' value="<?php echo base_url("assets/public/img/logo2.png"); ?>">
        <div id="map_gral" style="height: 400px; width:auto;"></div>

        <script>
            
            var map;
            function initMap() {
                //Obtenemos latitud y longitud
                function localizacion(posicion){

                    var img=document.getElementById('routelist').value;
                    var latitude = posicion.coords.latitude;
                    var longitude = posicion.coords.longitude;

                    map = new google.maps.Map(document.getElementById('map_gral'), {
                    center: {lat: latitude, lng: longitude},
                    zoom: 10
                    });

                    var desc = '<h3>hotel<h3>'+  
                                'Descripcion de hotel';

                    var infowindow = new google.maps.InfoWindow({
                      content: desc
                    });
                    var villa = new google.maps.Marker({
                        position: {lat: 7.014035, lng: -73.111061},
                        map: map,
                        icon: img,
                        title: 'Villa Maria Paula',
                        draggable: false
                    });
            
                    villa.addListener('click', function() {
                      infowindow.open(map, villa);
                    });

                    var marker = new google.maps.Marker({
                        position: {lat: 7.111982, lng: -73.215040},
                        map: map,
                        icon: img,
                        title: 'Hospedaje Palonegro',
                        draggable: false
                    });
                    var marker = new google.maps.Marker({
                        position: {lat: 7.111447, lng: -73.216389},
                        map: map,
                        icon: img,
                        title: 'Hotel Cascade Real',
                        draggable: false
                    });                    
                }



                function error(){
                    $("#map_gral").html("tu navegador no soporta geolocation");
                }

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
                    <h3><span class="fa fa-user-o text-title"></span>&nbsp;<b>Unete a nosotros</b></h3>
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
                                comparte con tus amigos la mejor experiencia, buscanos en las redes sociales.
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


 


