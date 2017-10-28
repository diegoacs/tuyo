
<div class="container-fluid c-detals">
    <div class="container">
    
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">     
                        <h2><?php echo $nombre; ?></h2>
                        <p><span class="fa fa-map-marker text-danger"></span>&nbsp;<?php echo $ubicacion; ?></p>
                        <p>
                            <span class="fa fa-star color-star"></span>
                            <span class="fa fa-star color-star"></span>
                            <span class="fa fa-star color-star"></span>
                            <span class="fa fa-star color-star"></span>
                            <span class="fa fa-star color-star"></span>
                        </p>

                        <p class="text-paragraph">
                            <?php echo $descripcion; ?>
                        </p>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 destaca">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <p><span class="fa fa-cutlery"></span>&nbsp;Cocina/Restaurante </p>
                                <p><span class="fa fa-hotel"></span>&nbsp;Habitaciones </p> 
                                <p><span class="fa fa-bath"></span>&nbsp;Baños privados</p>  
                                <p><span class="fa fa-television"></span>&nbsp;TV por cable </p> 
                                <p><span class="fa fa-life-bouy"></span>&nbsp;Piscina </p> 
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <p><span class="fa fa-group"></span>&nbsp;Salón de eventos</p>
                                <p><span class="fa fa-car"></span>&nbsp;Parqueadero     </p>                  
                                <p><span class="fa fa-coffee"></span>&nbsp;Cafetería  </p>
                                <p><span class="fa fa-wifi"></span>&nbsp;Wifi    </p>              
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center destaca">
                            <div class="seemore" data-toggle="modal" href='#map_modal'>ver mapa</div>
                            <p id="map"></p>

                            <script type="text/javascript">

                                findme();

                                function findme(){

                                    function localizacion(posicion){

                                        var lat = '<?php echo $lat; ?>';
                                        var lon = '<?php echo $lon; ?>';
                                        // solo imagen
                                        var imgURL = "https://maps.googleapis.com/maps/api/staticmap?center="+lat+","+lon+
                                                     "&zoom=17&size=250x200&markers=color:blue%7C";
                                            imgURL+=lat+","+lon+"&MapType=hybrid&key=AIzaSyDP5opBg3ZbeX96OI9l7Zh_Mc1iK7_NIBs";
                                        var showMap = "<img src="+imgURL+">"

                                        document.getElementById('map').innerHTML=showMap;
                                    }

                                    function error(){
                                        document.getElementById('map').innerHTML='Atención! este navegador no soporta geolocalización.';
                                    }

                                    navigator.geolocation.getCurrentPosition(localizacion,error);
                                    
                                }                                


                            </script>





                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 destaca">
                        <a href="#"><span class="fa fa-comments-o"></span>&nbsp;comentarios</a>
                    </div>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="carousel-id" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-id" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                                <li data-target="#carousel-id" data-slide-to="2" class=""></li>
                                <li data-target="#carousel-id" data-slide-to="3" class=""></li>
                                <li data-target="#carousel-id" data-slide-to="4" class=""></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:fside" alt="fside" 
                                    src="<?php echo base_url("assets/public/img/mp1.jpg"); ?>">
                                    <div class="container">
                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:sside" alt="sside" 
                                    src="<?php echo base_url("assets/public/img/mp2.jpg"); ?>">
                                    <div class="container">
                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:tside" alt="tside" 
                                    src="<?php echo base_url("assets/public/img/mp3.jpg"); ?>">
                                    <div class="container">
                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:ftside" alt="ftside" 
                                    src="<?php echo base_url("assets/public/img/mp4.jpg"); ?>">
                                    <div class="container">
                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:fvside" alt="fvside" 
                                    src="<?php echo base_url("assets/public/img/mp5.jpg"); ?>">
                                    <div class="container">
                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                            <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h3><span class="fa fa-tags text-primary"></span>&nbsp;Verifica disponibilidad</h3>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-4 form-group">
                        <label><span class="fa fa-calendar"></span>&nbsp;Fecha de entrada</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-4 form-group">
                        <label><span class="fa fa-calendar"></span>&nbsp;Fecha de salida</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 form-group">
                        <label>Habitaciones</label>
                        <input type="text" class="form-control intFor" value="1">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 form-group">
                        <label>Personas</label>
                        <input type="text" class="form-control intFor" value="1">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <button type="button" class="btn btn-primary">ver disponibilidad</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h3><span class="fa fa-pencil-square text-primary"></span>&nbsp;Condiciones de servicio</h3>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <?php echo $condiciones; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>