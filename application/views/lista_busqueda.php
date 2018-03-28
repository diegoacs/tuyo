
    <div class="container-fluid c-detals">
        <div class="container">

            <!-- filtro de acordeon para movil -->

            <div id="accordion" class="panel-group hidden-sm hidden-md hidden-lg">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#filtrar">
                                <span class="fa fa-search"></span>&nbsp;Filtrar
                            </a>
                        </h4>
                    </div>
                    <div id="filtrar" class="panel-collapse collapse">
                        <div class="panel-body filtro">

                                <div class="row">
                                    
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                        <h3><span class="fa fa-sliders"></span>&nbsp;Filtros</h3>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        Desde
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                        <?php 
                                            echo form_input(array('type' => 'date','id' => 'fechadesde1','class' => 'form-control', 'value' => $fecha1));
                                        ?>
                                    </div>
                                    
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        Hasta
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                        <?php 
                                            echo form_input(array('type' => 'date','id' => 'fechahasta1','class' => 'form-control', 'value' => $fecha2));
                                        ?>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        Busco
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                        <select class="selectpicker form-control filtrocat" name="searchcategory1" data-live-search="true">
                                        <?php echo $categorias; ?>      
                                        </select>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        Lugar
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                        <?php 
                                            echo form_input(array('type' => 'text','id' => 'ciudad1','class' => 'form-control', 'value' => $ciudad));
                                        ?>
                                    </div>



                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        Calificaciones
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <span class="fa fa-star color-star"></span> 
                                        <span class="fa fa-star color-star"></span> 
                                        <span class="fa fa-star color-star"></span> 
                                        <span class="fa fa-star-o color-star"></span>   
                                        <span class="fa fa-star-o color-star"></span>   
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        Servicios
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                        <div class="row">
                                            
                                            <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12">
                                                
                                                <?php

                                                    $html='';
                                                    foreach ($filtros as $row) {
                
                                                        $html.="<div class='checkbox'><label>".
                                                        "<input class='caracteristica' data-id='".$row['id_caracter']."' type='checkbox'>".
                                                        "<span class='".$row['icono']."'></span>&nbsp;".$row['descripcion'].
                                                        "</label></div>";
                
                                                    }

                                                    echo $html;

                                                ?>

                                            </div>

                                        </div>


                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <button type="button" class="btn btn-success filter-char">
                                            <span class="fa fa-search"></span>&nbsp;buscar
                                        </button>
                                    </div>

                                </div>  

                        </div>
                    </div>
                </div>
            </div>

            <!-- filtro normal -->
            
            <div class="row">


                <div class="hidden-xs col-sm-4 col-md-3 col-lg-3 filtro">
                
                    <div class="row">
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                            <h3><span class="fa fa-sliders"></span>&nbsp;Filtros</h3>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            Desde
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                            <?php 
                                echo form_input(array('type' => 'date','id' => 'fechadesde1','class' => 'form-control', 'value' => $fecha1));
                            ?>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            Hasta
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                            <?php 
                                echo form_input(array('type' => 'date','id' => 'fechahasta1','class' => 'form-control', 'value' => $fecha2));
                            ?>
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            Busco
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                            <select class="selectpicker form-control filtrocat" name="searchcategory1" data-live-search="true">
                            <?php echo $categorias; ?>      
                            </select>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            Lugar
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                            <?php 
                                echo form_input(array('type' => 'text','id' => 'ciudad1','class' => 'form-control', 'value' => $ciudad));
                            ?>
                        </div>



                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            Calificaciones
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <span class="fa fa-star color-star"></span> 
                            <span class="fa fa-star color-star"></span> 
                            <span class="fa fa-star color-star"></span> 
                            <span class="fa fa-star-o color-star"></span>   
                            <span class="fa fa-star-o color-star"></span>   
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            Servicios
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <div class="row">
                                
                                <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12">
                                    
                                    <?php

                                        $html='';
                                        foreach ($filtros as $row) {
    
                                            $html.="<div class='checkbox'><label>".
                                            "<input class='caracteristica' data-id='".$row['id_caracter']."' type='checkbox'>".
                                            "<span class='".$row['icono']."'></span>&nbsp;".$row['descripcion'].
                                            "</label></div>";
    
                                        }

                                        echo $html;

                                    ?>

                                </div>

                            </div>


                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button type="button" class="btn btn-success filter-char">
                                <span class="fa fa-search"></span>&nbsp;buscar
                            </button>
                        </div>

                    </div>          

                </div>


                <div class="col-xs-12 col-sm-7 col-md-8 col-lg-8">
                        
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        
                                    <?php echo $rta; ?>
                        
                                </div>
                            </div>
                            
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <?php echo $gallery; ?>
                                </div>

                            </div>

                            <div class="row">
                                <?php echo $condiciones; ?>
                                <br><br>
                            </div>

                </div>
            </div>
            
        </div>
    </div> 