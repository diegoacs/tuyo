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
				
							<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
							<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
								<?php echo $this->session->nombres; ?>
							</div>
				
						</div>

						<div class="form-group">
				
							<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>
							<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
								<?php echo $this->session->user; ?>
							</div>

						</div>

						<div class="form-group">
				
							<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3"></div>

							<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

								<?php
									echo form_button(array('id' => 'close_session',
														   'name' => 'close_session',
														   'class' => 'btn btn-danger',
														   'content' =>"<span class='fa fa-close'></span>&nbsp;cerrar sesion"	
															));
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

											echo "<a href='".$entidades['id'][$i]."' class='list-group-item'>".
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

					<p>
						<span class="fa fa-home"></span>&nbsp;
						Lugar / Entidad :
						
						<?php echo strtoupper($default[1]); ?>
						
					</p>


					
				</div>
			</div>

			<?php echo $datos_form; ?>
			
		</div>


	</div>
	

</div>