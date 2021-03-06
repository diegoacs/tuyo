<div class="container">

	<div class="row" style="margin: 180px 0px 150px 0px">

		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<span class="fa fa-home text-title"></span>
						&nbsp;Mi información
					</h3>
				</div>
				<div class="panel-body">

					<div class="form-horizontal">

						<div class="form-group">
				
							<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
								<?php echo $this->session->nombres; ?>
							</div>
				
						</div>

						<div class="form-group">
				
							<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
								<?php echo $this->session->user; ?>
							</div>

						</div>

						<?php
							
							if($this->session->has_userdata('perfil')){

						?>


						<div class="form-group">
							
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

						

									<?php

									echo anchor(base_url().'index.php/Places_admin/myprofile/', 
										"<span class='fa fa-user'></span>&nbsp;mi perfil", 
										array('id' => 'add_place',
											'name' => 'add_place',
											'class' => 'btn btn-primary'));

									?>

							</div>

						</div>
							

						<?php

								if($this->session->perfil == 'A' || $this->session->perfil == 'P'){
						?>
						<div class="form-group">
							
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

						

									<?php

									echo anchor(base_url().'index.php/Signup/addplace/', 
										"<span class='fa fa-plus-circle'></span>&nbsp;agregar establecimiento", 
										array('id' => 'add_place',
											'name' => 'add_place',
											'class' => 'btn btn-success'));

									?>

							</div>

						</div>
										
						<?php
								}

						?>



						<?php

								if($this->session->perfil == 'A'){
						?>
						<div class="form-group">
							
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

						

									<?php

									echo anchor(base_url().'index.php/Places_admin/adminusers/', 
										"<span class='fa fa-users'></span>&nbsp;administrar usuarios", 
										array('id' => 'admin-users',
											'name' => 'admin-users',
											'class' => 'btn btn-primary'));

									?>

							</div>

						</div>
										
						<?php
								}

						?>								
						

						<?php

							}

						?>


						<div class="form-group">
				
							<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

								<?php

									echo anchor(base_url().'index.php/Signup/log_out/', 
										"<span class='fa fa-close'></span>&nbsp;cerrar sesion", 
										array('id' => 'close_session',
												'name' => 'close_session',
												'class' => 'btn btn-danger'));

								?>

							</div>

						</div>

						<div class="form-group">

							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							
							</div>
							
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

								<div class="list-group">


									<?php

										for($i=0; $i<count($entidades['id']); $i++){

											echo "<a href='".base_url().'index.php/Signup/enter_panel/'.$entidades['id'][$i]."' class='list-group-item'>".
											"<span class='fa fa-home'></span>&nbsp;".$entidades['nom'][$i]."</a>";		

										}

									?>
									
								</div>
								
							</div>

						</div>
						
					</div>
	
				</div>
			</div>
			
		</div>
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<span class="fa fa-bars text-title"></span>&nbsp;
						Menú administración
					</h3>
				</div>
				<div class="panel-body">

					<div class="form-horizontal">
						
						<div class="form-group">

							<div class="col-xs-12 col-md-12">
								<p>
									<span class="fa fa-home"></span>&nbsp;
									Lugar / Entidad :
									
									<?php echo strtoupper($default[1]); ?>
									
								</p>

							</div>
							
						</div>

						<div class="form-group">
							
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

								<div class="btn-group" role="group">
									
									<?php

										echo 
											anchor(
												base_url().'index.php/Signup/enter_panel/'.$default[0], 
												"<span class='fa fa-bars text-title'></span>&nbsp;conf. general",
												array('id'=>'conf_hab','class'=>'btn btn-default')).
											anchor(
												base_url().'index.php/Places_admin/roommenu/'.$default[0], 
												"<span class='fa fa-bed text-title'></span>&nbsp;habitaciones",
												array('id'=>'conf_hab','class'=>'btn btn-default')).
											anchor(
												base_url().'index.php/Places_admin/settingsmenu/'.$default[0], 
												"<span class='fa fa-home text-title'></span>&nbsp;caracteristicas",
												array('id'=>'conf_hab','class'=>'btn btn-default')).
											form_button(array('type' => 'button',
															'id' => 'deletestb',
															'class' => 'btn btn-default',
															'content' =>'<span class=\'fa fa-close text-title\'></span>&nbsp;eliminar'))
										;

									?>

								</div>
								
							</div>


						</div>

					</div>



					
				</div>
			</div>

			<?php echo $datos_form; ?>


			<div class="panel panel-default">
				<div class="panel-body">

					<div class="form-horizontal">
						
						<div class="form-group">
							
							<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>

							<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 texto-msg">
								
							</div>

						</div>

						<div class="form-group">
							
							<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>

							<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
								
								<?php 

									switch ($tipo) {
										case '1':

											echo form_button(

												array('id' => 'saveInfo',
													'class' =>'btn btn-primary',
													'content' =>'<span class=\'fa fa-save\'></span>&nbsp;Actualizar información'

												)

											);

										break;
										case '3': 

											echo form_button(

												array('id' => 'saveAdd',
													'class' =>'btn btn-primary',
													'content' =>'<span class=\'fa fa-save\'></span>&nbsp;Actualizar información'

												)

											);

										break;
									}

								?>

							</div>

						</div>

					</div>

				</div>
			</div>

			
		</div>


	</div>
	

</div>