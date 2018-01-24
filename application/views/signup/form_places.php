<div>
	
	<div class="container-fluid" style="">


		<div class="container" >
			
			<div class="row" style="margin: 150px 0px 70px 0px">
				
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

					<nav>
						<ul style="list-style-type: none">
							<li><span class="fa fa-pencil"></span>&nbsp;seccion 1</li>
							<li><span class="fa fa-pencil"></span>&nbsp;seccion 1</li>
							<li><span class="fa fa-pencil"></span>&nbsp;seccion 1</li>
							<li><span class="fa fa-pencil"></span>&nbsp;seccion 1</li>
						</ul>
					</nav>
					
				</div>

				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
					
					<!-- info personal -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<span class='fa fa-user'></span>&nbsp;
								Información personal
							</h3>
						</div>
						<div class="panel-body">
							
							<div class="form-horizontal">
								
								<div class="form-group">
									
									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-user"></span>&nbsp;
										Nombre
									</label>
									<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
										<?php

											echo form_input(array('type'=>'text','id'=>'nombreusr',
																  'class'=>'form-control'));
										?>
									</div>

								</div>

								<div class="form-group">
									
									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-envelope-o"></span>&nbsp;
										Correo
									</label>
									<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
										<?php

											echo form_input(array('type'=>'text','id'=>'mailuser',
																  'class'=>'form-control'));
										?>
									</div>

								</div>

							</div>


						</div>
					</div>
					
					<!-- info entidad -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<span class="fa fa-h-square"></span>
								Información general
							</h3>
						</div>
						<div class="panel-body">
							
							<div class="form-horizontal">
								
								<div class="form-group">
									
									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-building"></span>&nbsp;
										Nombre establecimiento
									</label>
									<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
										<?php

											echo form_input(array('type'=>'text','id'=>'nombreentidad',
																  'class'=>'form-control'));
										?>
									</div>

								</div>

								<div class="form-group">
									
									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-envelope-o"></span>&nbsp;
										Tipo
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php

											echo form_dropdown('',array('1' => 'hotel',
																		'2'=> 'zona recreacional',
																		'3'=>'chalet'), '',array('id' =>'tipoentidad',
																								 'class' =>'form-control')
											);
										?>
									</div>

								</div>

								<div class="form-group">
									
									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-building"></span>&nbsp;
										Dirección
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php

											echo form_input(array('type'=>'text','id'=>'nombreentidad',
																  'class'=>'form-control'));
										?>
									</div>

									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-building"></span>&nbsp;
										Teléfono
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php

											echo form_input(array('type'=>'text','id'=>'nombreentidad',
																  'class'=>'form-control'));
										?>
									</div>

								</div>

								<div class="form-group">
									
									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-envelope-o"></span>&nbsp;
										Correo
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php

											echo form_input(array('type'=>'text','id'=>'nombreentidad',
																  'class'=>'form-control'));
										?>
									</div>

									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-location-arrow"></span>&nbsp;
										País
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php

											echo form_dropdown('',array('1' => 'Colombia',
																		), '',array('id' =>'tipoentidad',
																								 'class' =>'form-control')
											);
										?>
									</div>


									
								</div>

								<div class="form-group">
									
									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-location-arrow"></span>&nbsp;
										Departamento
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php

											echo form_dropdown('',array('1' => 'Santander',
																		), '',array('id' =>'tipoentidad',
																								 'class' =>'form-control')
											);
										?>
									</div>


									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-location-arrow"></span>&nbsp;
										Ciudad
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php

											echo form_dropdown('',array('1' => 'Floridablanca',
																		'2' => 'Bucaramanga',
																		'3'	=> 'Giron'
																		), '',array('id' =>'tipoentidad',
																								 'class' =>'form-control')
											);
										?>
									</div>


								</div>								

							</div>


						</div>
					</div>

					<!-- info general hotel -->

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<span class="fa fa-bed"></span>&nbsp;
								Información de horarios
							</h3>
						</div>
						<div class="panel-body">
							
							<div class="form-horizontal">
								
								<div class="form-group">
									
									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-clock-o"></span>&nbsp;
										Entrada
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php

											echo form_input(array('type'=>'time','id'=>'entrada',
																  'class'=>'form-control'));
										?>
									</div>


								</div>

								<div class="form-group">
									
									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-clock-o"></span>&nbsp;
										Salida desde
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php

											echo form_input(array('type'=>'time','id'=>'salidadesde',
																  'class'=>'form-control'));
										?>
									</div>

									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-clock-o"></span>&nbsp;
										Salida hasta
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php

											echo form_input(array('type'=>'time','id'=>'salidahasta',
																  'class'=>'form-control'));
										?>
									</div>



								</div>

							</div>


						</div>
					</div>


					<!-- info habitaciones -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<span class="fa fa-bed"></span>&nbsp;
								Información habitaciones y espacios
							</h3>
						</div>
						<div class="panel-body">
							
							<div class="form-horizontal">
								
								<div class="form-group">
									
									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-bed"></span>&nbsp;
										Nombre
									</label>
									<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
										<?php

											echo form_input(array('type'=>'text','id'=>'nombrehab',
																  'class'=>'form-control'));
										?>
									</div>

									<label class="label-control col-xs-12 col-md-1">
										Cantidad
									</label>
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
										<?php

											echo form_input(array('type'=>'text','id'=>'cantidadhab',
																  'class'=>'form-control'));
										?>
									</div>



								</div>

								<div class="form-group">
									
									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-list"></span>&nbsp;
										Categoria
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php

											echo form_dropdown('',array('1' => 'Hotel',
																		'2'=> 'Espacios deportivos',
																		'3'=>'Espacios recreativos'), '',array('id' =>'categorias',
																								 'class' =>'form-control')
											);
										?>
									</div>

									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-home"></span>&nbsp;
										Tipo Lugar
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php

											echo form_dropdown('',array('1' => 'Habitacion sencilla',
																		'2'=> 'Habitacion doble',
																		'3'=>'Cancha sintetica',
																		'4'=>'Salon de eventos'), '',array('id' =>'unidades',
																								 'class' =>'form-control')
											);
										?>
									</div>

								</div>

								<div class="form-group">
									
									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-users"></span>&nbsp;
										Capacidad
									</label>
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
										<?php

											echo form_input(array('type'=>'text','id'=>'capacidad',
																  'class'=>'form-control'));
										?>
									</div>

									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>

									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-dollar"></span>&nbsp;
										Precio
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php

											echo form_input(array('type'=>'text','id'=>'preciounidad',
																  'class'=>'form-control'));
										?>
									</div>

								</div>

								<div class="form-group">
									
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
										
									</div>

									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
										
										<?php

											echo form_button(array('type'=>'button',
																	'class' => 'btn btn-primary',
																	'content' => 
																	"<span class='fa fa-plus-circle'></span>&nbsp;agregar"));

										?>

									</div>

								</div>

								<div class="form-group">
									
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										
										<div class="table-responsive">
											<table class="table table-hover table-bordered">
												<thead>
													<tr>
														<th>Cantidad</th>
														<th>Nombre</th>
														<th>Personas</th>
														<th>Precio</th>
														<th>Acciones</th>
													</tr>
												</thead>
												<tbody>
													<tr><td>3</td><td>Habitacion sencilla</td><td>1</td><td>35,000.00</td><td>
													<button type="button" class="btn btn-danger btn-xs">
														<span class="fa fa-close"></span>
													</button>
													</td></tr>
												</tbody>
											</table>
										</div>

									</div>


								</div>


							</div>


						</div>
					</div>

					<!-- info servicios -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<span class="fa fa-coffee"></span>&nbsp;
								Servicios y caracteristicas
							</h3>
						</div>
						<div class="panel-body">
							
							<div class="form-horizontal">

								<div class="form-group">
									
									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-coffee"></span>&nbsp;
										Caracteristica
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php

											echo form_dropdown('',array('1' => 'Wifi',
																		'2'=> 'Parqueadero',
																		'3'=>'Bar'), '',array('id' =>'servicios',
																								 'class' =>'form-control')
											);
										?>
									</div>

								</div>

							</div>


						</div>
					</div>

					<!-- info guardar -->

					<div class="panel panel-default">

						<div class="panel-body">
							
							<div class="form-horizontal">


								<div class="form-group">
									
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>

									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

										<?php echo form_checkbox(array('id'=>'info',
																		'value'=>'acepto',
																		'checked'=>true)).'&nbsp;'.
										'<span class="fa fa-check text-success"></span>&nbsp;'.
										'Acepto las condiciones del servicio.' 
										?>
										
									</div>

								</div>

								<div class="form-group">
									
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>

									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php

											echo form_button(array('type'=>'button',
																	'class'=>'btn btn-primary',
																	'id' =>'saveentidad',
																	'content' =>
																	"<span class='fa fa-save'></span>&nbsp;guardar establecimiento"));
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

</div>