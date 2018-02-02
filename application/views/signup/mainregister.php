<div>
	
	<div class="container">
		
		
		<div class="row" style="margin: 180px 0px 150px 0px">
			
			<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

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
				</div>

					<br><br>

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">
									<span class="fa fa-home text-title"></span>&nbsp;
									Mi sitio
								</h3>
							</div>
							<div class="panel-body">

								<?php

									echo form_open('Signup/enterapp',array(

										'id' => 'enter',
										'class' => 'form-horizontal'
									));
								?>

									<div class="form-group">
										<label class="control-label col-xs-12 col-md-3">
											<span class="fa fa-envelope-o"></span>&nbsp;
											Nombre
										</label>

										<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
											
											<?php

												echo form_input(array('type' => 'text', 
													'class' => 'form-control',
													'name' => 'enter_form',
													'id' => 'enter_form'
												));	

											?>

										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-md-3">
											<span class="fa fa-key"></span>&nbsp;
											Password										
										</label>

										<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
											
											<?php

												echo form_input(array('type' => 'password', 
													'class' => 'form-control',
													'name' => 'pass_form',
													'id' => 'pass_form'
												));	

											?>

										</div>
									</div>


									<div class="form-group">
										<div class="col-xs-12 col-md-3"></div>
										<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
											
											<?php

												echo form_button(
													array(
														'type' => 'submit',
														'content' => 'entrar',
														'class' => 'btn btn-primary',
														'id' => 'enter-btn'
													)
												);

											?>

										</div>
									</div>


									<div class="form-group">
										<div class="col-xs-12 col-md-3"></div>
										<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
											<?php

												echo validation_errors("<p class='text-danger'><span class='fa fa-exclamation-triangle'></span>&nbsp;",'</p>');
											?>
                                        <?php if($this->session->flashdata('error_usr')){
                                            echo "<div class='alert alert-danger alert-dismissible' role='alert'>".
                                            "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
                                            "<span aria-hidden='true'>&times;</span></button>".
                                            "<span class='fa fa-exclamation-triangle'></span>&nbsp;".$this->session->flashdata('error_usr').
                                            "</div>";
                                        }?>											
										</div>
									</div>

								<?php

									echo form_close();
								?>
								
							</div>
						</div>

					</div>
				</div>





				
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