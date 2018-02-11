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


							</div>

						</div>
							

						<?php

								if($this->session->perfil == 'A' || $this->session->perfil == 'P'){
						?>
						<div class="form-group">
							
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

						

									<?php

									echo anchor(base_url().'index.php/Signup/enter_panel/', 
										"<span class='fa fa-home'></span>&nbsp;volver a mis lugares", 
										array('id' => 'back_panel',
											'name' => 'back_panel',
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

									
								</div>
								
							</div>

						</div>
						
					</div>
	
				</div>
			</div>
			
		</div>
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

			
			<?php

				echo $personal_data;

			?>

			<?php

				echo $pass_data;

			?>

			
		</div>


	</div>
	

</div>