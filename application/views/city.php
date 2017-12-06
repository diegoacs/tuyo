
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
							<button type="button" class="btn btn-success">
								<span class="fa fa-search"></span>&nbsp;buscar
							</button>
						</div>

					</div>			

            	</div>


            	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
						
						
							<div class="row">

                                <?php
                                $html='';
                                foreach ($places as $row) {
                                    $html.="
                                    <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 destaca'>
                                        <div class='media'>
                                            <div class='media-left'>
                                                <a href='#'>
                                                    <img class='media-object img-oferta' 
                                                    src='http://localhost/cdig/assets/public/img/img_enti/".$row['id_entidad']."/".
                                                    $row['nombre']."_thumb".$row['tipo']."' alt='".$row['nom_entidad']."'>
                                                </a>
                                            </div>
                                            <div class='media-body'>
                                                <h4 class='media-heading'><span class='fa fa-bookmark-o text-title'></span>&nbsp;".$row['nom_entidad']."</h4>
                                                <span class='fa fa-star color-star'></span>
                                                <span class='fa fa-star color-star'></span>
                                                <span class='fa fa-star color-star'></span>
                                                <span class='fa fa-star color-star'></span>
                                                <span class='fa fa-star-o color-star'></span>
                                                4.3
                                                <p class='text-paragraph mright'>".$row['descripcion']."</p>
                                                <br>

                                                <a href=".base_url('index.php/Panel_ini/productDetals/'.$row['id_entidad'].'/'.$idcity).">
                                                <span class='fa fa-chevron-circle-right text-title'></span>&nbsp;ver más</a>
                                                <div class='text-right mright'>
                                                    <a href='#'><span class='fa fa-comments-o'></span>&nbsp;comentarios</a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>";
                                }
                                echo $html;

                                ?>

							</div>

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