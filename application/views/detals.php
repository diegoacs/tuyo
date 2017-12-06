
<div class="container-fluid c-detals">
    <div class="container">
    
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">     
                        <h2><?php echo $nombre; ?></h2>
                        <input type="hidden" class="codePlace" value="<?php echo base64_encode($code); ?>">
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
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <?php echo $caracteristicas; ?>
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
                        <?php echo $imagenes; ?>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h3><span class="fa fa-tags text-primary"></span>&nbsp;Verifica disponibilidad</h3>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-4 form-group">
                        <label><span class="fa fa-calendar"></span>&nbsp;Fecha de entrada</label>
                        <input type="date" class="form-control date1">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-4 form-group">
                        <label><span class="fa fa-calendar"></span>&nbsp;Fecha de salida</label>
                        <input type="date" class="form-control date2">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group">
                        <label>Busco</label>
                        <select class="form-control selectpicker tipoUnd" data-live-search="true">
                            <?php echo $tipos; ?>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <button type="button" class="btn btn-primary ver-disponible">ver disponibilidad</button>
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