
    <div class="container-fluid c-detals">
        <div class="container">


			<div class="row">



				<div class="col-xs-12 col-sm-12 col-lg-offset-9 col-md-offset-9 col-md-3 col-lg-3">

					<select class="form-control">
						<option value="">Mayores calificaciónes</option>						
						<option value="">Menos calificaciones</option>
						<option value="">Más comentarios</option>
						<option value="">Menos comentarios</option>

					</select>

				</div>

			</div>

            <div class="row">


            	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 filtro">
				
					<div class="row">
						
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
							<h3><span class="fa fa-sliders"></span>&nbsp;Filtros</h3>
						</div>


                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            Desde
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                            <?php 
                                echo form_input(array('type' => 'date','id' => 'fechadesde1','class' => 'form-control', 'value' => date('Y-m-d')));
                            ?>
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            Hasta
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                            <?php 
                                echo form_input(array('type' => 'date','id' => 'fechahasta1','class' => 'form-control', 'value' => date('Y-m-d')));
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
                                echo form_input(array('type' => 'text','id' => 'ciudad1','class' => 'form-control', 'value' => $city));
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
							<button type="button" class="btn btn-success filter-char-city">
								<span class="fa fa-search"></span>&nbsp;buscar
							</button>
						</div>

					</div>			

            	</div>


            	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
						
                        <?php  

                            foreach ($places as $row) {
                        
                        ?>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">

                                        <a href='<?php echo base_url('index.php/Panel_ini/productDetals/'.$row['id_entidad'].'/'.$idcity); ?>'>
                                            <span class="fa fa-home text-title"></span>&nbsp;
                                            <?php echo $row['nom_entidad'];?>
                                        </a>

                                    </h3>
                                </div>
                                <div class="panel-body">


                                        <div class='media'>
                                            <div class='media-left'>
                                                <a href='#'>
                                                    <img class='media-object img-oferta' 
                                                    src="
                                                    
                                                    <?php  
    
                                                        echo ruta_conf().$row['id_entidad'].'/'.
                                                        $row['nombre'].'_thumb'.$row['tipo'];

                                                    ?>

                                                    ">
                                                </a>
                                            </div>
                                            <div class='media-body'>

                                                <h4 class='media-heading'>
                                                    <span class='fa fa-bookmark-o text-title'></span>
                                                        &nbsp;

                                                        <?php 

                                                            echo $row['nom_entidad']; 

                                                        ?>
                                                </h4>

                                                <span class='fa fa-star color-star'></span>
                                                <span class='fa fa-star color-star'></span>
                                                <span class='fa fa-star color-star'></span>
                                                <span class='fa fa-star color-star'></span>
                                                <span class='fa fa-star-o color-star'></span>

                                                4.3

                                                <p class='text-paragraph mright'>
                                                    
                                                    <?php

                                                        echo $row['descripcion'];

                                                    ?>
                                                </p>

                                                <br>

                                                <a href="

                                                    <?php  

                                                        echo base_url('index.php/Panel_ini/productDetals/'.$row['id_entidad'].'/'.$idcity);

                                                    ?> 
                                                ">
                                                
                                                    <span class='fa fa-chevron-circle-right text-title'>
                                                        &nbsp;ver más
                                                    </span>
                                                </a>

                                                <div class='text-right mright'>
                                                    <a href='#'><span class='fa fa-comments-o'></span>&nbsp;comentarios</a>
                                                </div>


                                            </div>

                                        </div>

                                </div>
                            </div>


                        <?php

                            }

                        ?>


            	</div>
            </div>


            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-lg-offset-9 col-md-offset-9 col-md-3 col-lg-3">
            		
					<ul class="pagination">
						<li><a href="#"><span class="fa fa-chevron-circle-left"></span></a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#"><span class="fa fa-chevron-circle-right"></span></a></li>
					</ul>

            	</div>
            </div>
            
        </div>
    </div> 