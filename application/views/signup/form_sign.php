
<div>
	
	<div class="container">

			<div class="row" style="margin:150px 0px 70px 0px;">


				<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<span class="fa fa-file-o text-title"></span>
								Condiciones del servicio</h3>
						</div>
						<div class="panel-body">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam, cupiditate, consequuntur. Expedita eveniet voluptatum consectetur molestiae nam sunt earum sint iste commodi qui assumenda veniam praesentium eos soluta, rem aspernatur.
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam, cupiditate, consequuntur. Expedita eveniet voluptatum consectetur molestiae nam sunt earum sint iste commodi qui assumenda veniam praesentium eos soluta, rem aspernatur.
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam, cupiditate, consequuntur. Expedita eveniet voluptatum consectetur molestiae nam sunt earum sint iste commodi qui assumenda veniam praesentium eos soluta, rem aspernatur.
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam, cupiditate, consequuntur. Expedita eveniet voluptatum consectetur molestiae nam sunt earum sint iste commodi qui assumenda veniam praesentium eos soluta, rem aspernatur.
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam, cupiditate, consequuntur. Expedita eveniet voluptatum consectetur molestiae nam sunt earum sint iste commodi qui assumenda veniam praesentium eos soluta, rem aspernatur.
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam, cupiditate, consequuntur. Expedita eveniet voluptatum consectetur molestiae nam sunt earum sint iste commodi qui assumenda veniam praesentium eos soluta, rem aspernatur.
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam, cupiditate, consequuntur. Expedita eveniet voluptatum consectetur molestiae nam sunt earum sint iste commodi qui assumenda veniam praesentium eos soluta, rem aspernatur.
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam, cupiditate, consequuntur. Expedita eveniet voluptatum consectetur molestiae nam sunt earum sint iste commodi qui assumenda veniam praesentium eos soluta, rem aspernatur.												
						</div>
					</div>
					
				</div>
				<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">


					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<span class="fa fa-pencil text-title"></span>&nbsp;
								Registro de usuario
							</h3>
						</div>
						<div class="panel-body">

							<div class='form-horizontal'>

								<div class='form-group'>

									<label class='control-label col-xs-12 col-md-3'>
									Nombres
									</label>

									<div class='col-xs-12 col-md-9'>
										
										<?php echo form_input(array('type'=>'text',
																	'class'=>'form-control',
																	'id' =>'nombres')); ?>

									</div>

								</div>

								<div class='form-group'>

									<label class='control-label col-xs-12 col-md-3'>
									Apellidos
									</label>

									<div class='col-xs-12 col-md-9'>
										
										<?php echo form_input(array('type'=>'text',
																	'class'=>'form-control',
																	'id' =>'apellidos')); ?>

									</div>

								</div>

								<div class='form-group'>

									<label class='control-label col-xs-12 col-md-3'>
									<span class="fa fa-calendar text-title"></span>&nbsp;
									Fecha nacimiento
									</label>

									<div class='col-xs-12 col-md-4'>
										
										<?php echo form_input(array('type'=>'date',
																	'class'=>'form-control',
																	'id' =>'fechanac')); ?>

									</div>

								</div>							

								<div class='form-group'>

									<label class='control-label col-xs-12 col-md-3'>
									<span class="fa fa-envelope-o text-title"></span>&nbsp;
									Correo electrónico
									</label>

									<div class='col-xs-12 col-md-4'>
										
										<?php echo form_input(array('type'=>'text',
																	'class'=>'form-control',
																	'id' =>'email')); ?>

									</div>

									<label class='control-label col-xs-12 col-md-2'>
									<span class="fa fa-phone text-title"></span>&nbsp;
									Teléfono
									</label>

									<div class='col-xs-12 col-md-3'>
										
										<?php echo form_input(array('type'=>'text',
																	'class'=>'form-control',
																	'id' =>'telefono')); ?>

									</div>
								</div>	

								<div class='form-group'>

									<label class='control-label col-xs-12 col-md-3'>
									<span class="fa fa-home text-title"></span>&nbsp;
									Dirección
									</label>

									<div class='col-xs-12 col-md-9'>
										
										<?php echo form_input(array('type'=>'text',
																	'class'=>'form-control',
																	'id' =>'direccion')); ?>

									</div>

								</div>	


								<div class="form-group">
									
									<label class='control-label col-xs-12 col-md-3'>
									<span class="fa fa-location-arrow text-title"></span>&nbsp;
									Pais
									</label>
									<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
										<?php

											echo $pais;
										?>
									</div>

									<label class='control-label col-xs-12 col-md-3'>
									<span class="fa fa-location-arrow text-title"></span>&nbsp;
									Departamento
									</label>
									<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
										<?php

											echo $departamento;
										?>
									</div>

								</div>

								<div class="form-group">

									<label class='control-label col-xs-12 col-md-3'>
									<span class="fa fa-location-arrow text-title"></span>&nbsp;
									Ciudad
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php

											echo $ciudad;
										?>
									</div>


								</div>




								<div class="form-group">
									
									<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
										
									</div>
									<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

										<?php 
											echo $captcha['image'];
										?>
										
									</div>

								</div>

								<div class="form-group">
									
									<label class="control-label col-xs-12 col-md-3">Escribe el código,
										así sabremos que no eres un robot
									</label>

									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										
										<?php

											echo form_input(array('type' => 'text',
																  'maxlength' => 6,
																  'class' => 'form-control',
																  'id' => 'captchacode'));		 

										?>
										
									</div>
								</div>


								<div class="form-group">
									
									<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
										
									</div>
									<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

										<?php echo form_checkbox(array('id'=>'info',
																		'value'=>'informacion',
																		'checked'=>false)).
										'Deseo recibir información de promociones y novedades a mi correo electrónico.' 
										?>
										
									</div>
								</div>

								<div class="form-group">
									
									<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
										
									</div>
									<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

										<?php echo form_checkbox(array('id'=>'accept',
																		'value'=>'acepto',
																		'checked'=>true)).
										'Acepto las condiciones del servicio.' 
										?>
										
									</div>
								</div>

								<div class="form-group">
									<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
										
									</div>
									<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

										<?php 
											echo form_button(array('type'=>'button',
																	'class'=>'btn btn-primary',
																	'id'=>'register',
																	'content'=>"<span class='fa fa-check-circle'></span>&nbsp;registrarme"));
										?>
										
									</div>
								</div>

							</div>

						</div>
					</div>
					
				</div>
			</div>







	</div>

</div>









