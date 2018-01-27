<div>
	
	<div class="container">
		
		
		<div class="row" style="margin: 180px 0px 150px 0px">
			
			<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">

				<p style="font-size: 35px;" class="text-title">
					Registrate con nosotros
				</p>
				<p style="font-size: 15px">
					registra tu lugar, recibe las mejores ofertas.
				</p>
				<br>
				<p>
					
					<?php
						$text="<span class='fa fa-user'></span>&nbsp;";
						echo anchor(base_url().'index.php/Signup/users', $text.'registrate como usuario', array('class'=>'btn btn-primary'));
					?>
					
				</p>
				<p>
					
					<?php
						$text="<span class='fa fa-home'></span>&nbsp;";
						echo anchor(base_url().'index.php/Signup/places', $text.'registra tu lugar', array('class'=>'btn btn-primary'));
					?>
					
				</p>
				
			</div>

			<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
				

	            <div class="row">
	                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	                        <div class="desc">
	                            <h3><span class="fa fa-envelope-o text-title"></span>&nbsp;Ofertas increibles</h3>
	                            <p>
	                                Recibe en tu correo ofertas y descuentos increibles 
	                                para tus vacaciones.
	                            </p>
	                        </div>
	                </div>
	                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	                        <div class="desc">
	                            <h3><span class="fa fa-smile-o text-title"></span>&nbsp;Fácil y rápido</h3>
	                            <p>
	                                Desde la comodidad de tu hogar u oficina, reservar tus proximas vacaciones.
	                            </p>
	                        </div>
	                </div>
	                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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


	</div>


</div>