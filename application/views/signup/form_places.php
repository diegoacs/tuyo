<div>
	
	<div class="container-fluid" style="">


		<div class="container" >
			
			<div class="row" style="margin: 150px 0px 70px 0px">
				
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

					<div class="desc">
						
						<nav>
							<ul style="list-style-type: none">
								<li><span class="fa fa-user"></span>&nbsp;Información personal</li>
								<li><span class="fa fa-h-square"></span>&nbsp;Información general</li>
								<li><span class="fa fa-bed"></span>&nbsp;Información horarios</li>
								<li><span class="fa fa-bed"></span>&nbsp;Información habitaciones</li>
								<li><span class="fa fa-coffee"></span>&nbsp;Servicios y caracteristicas</li>
							</ul>
						</nav>

					</div>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title"></h3>
						</div>
						<div class="panel-body">
							<a class="btn btn-primary" data-toggle="modal" href='#modal-id'>
								<span class="fa fa-file-o"></span>&nbsp;
								condiciones del servicio
							</a>
						</div>
					</div>
					
				</div>

				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
					
					<!-- info personal -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<span class='fa fa-user text-title'></span>&nbsp;
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
								<span class="fa fa-h-square text-title"></span>
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
										<span class="fa fa-bars"></span>&nbsp;
										Tipo
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php
										
											echo $tipo_establecimiento;
										?>
									</div>

									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-phone"></span>&nbsp;
										Teléfono
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php

											echo form_input(array('type'=>'text','id'=>'telefonoentidad',
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

											echo form_input(array('type'=>'text','id'=>'emailentidad',
																  'class'=>'form-control'));
										?>
									</div>

									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-location-arrow"></span>&nbsp;
										País
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php

											echo $pais;
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

											echo $departamento;
										?>
									</div>


									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-location-arrow"></span>&nbsp;
										Ciudad
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php

											echo $ciudad;
										?>
									</div>


								</div>								

							</div>


						</div>
					</div>

					
					<!-- mapa google -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<span class="fa fa-location-arrow text-title"></span>
								Ubicación geografica
							</h3>
						</div>	
						<div class="panel-body">

							<div class="form-horizontal">
								
								<div class="form-group">
									
									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-building"></span>&nbsp;
										Dirección
									</label>
									<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
										<?php

											echo form_input(array('type'=>'text','id'=>'direccionentidad',
																  'class'=>'form-control'));
										?>
									</div>

								</div>


								<div class="form-group">

									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-map-marker text-danger"></span>&nbsp;
										Coodernadas
									</label>	
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							    		<input id="latlng" type="text" class="form-control">							
									</div>							
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<button id="getGeo" type="button" class="btn btn-info">
											obtener dirección
										</button>

									</div>
								</div>

								<div class="form-group">
									<div id='map_canvas' style='width:auto;height:230px;'></div>
								</div>

							</div>

						</div>

						<?php
							echo form_input(array('type'=>'hidden','id'=>'latitude'));
							echo form_input(array('type'=>'hidden','id'=>'longe'));
						?>

					</div>

					<!-- info general hotel -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<span class="fa fa-bed text-title"></span>&nbsp;
								Información de horarios
							</h3>
						</div>
						<div class="panel-body">
							
							<div class="form-horizontal">
								
								<div class="form-group">
									
									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-clock-o"></span>&nbsp;
										Check-in
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
										Check-out desde
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php

											echo form_input(array('type'=>'time','id'=>'salidadesde',
																  'class'=>'form-control'));
										?>
									</div>

									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-clock-o"></span>&nbsp;
										Check-out hasta
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
								<span class="fa fa-bed text-title"></span>&nbsp;
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
																  'class'=>'form-control mFor'));
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

											echo $categoria;
										?>
									</div>

									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-home"></span>&nbsp;
										Tipo Lugar
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php

											echo $unidad;
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
																  'class'=>'form-control mFor'));
										?>
									</div>

									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-dollar"></span>&nbsp;
										Precio
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php

											echo form_input(array('type'=>'text','id'=>'preciounidad',
																  'class'=>'form-control mFor'));
										?>
									</div>

									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
										
										<?php

											echo form_button(array('type'=>'button',
																	'class' => 'btn btn-primary',
																	'content' => 
																	"<span class='fa fa-plus-circle'></span>&nbsp;agregar",
																	'id' => 'add-room'));

										?>

									</div>

								</div>


								<div class="form-group">
									
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										
										<div class="table-responsive">
											<table class="table table-hover table-bordered table-concept">
												<thead>
													<tr>
														<th>Cantidad</th>
														<th>Nombre</th>
														<th>Categoria</th>
														<th>Tipo</th>
														<th>Personas</th>
														<th>Precio</th>
														<th>Acciones</th>
													</tr>
												</thead>
												<tbody class="table-concept-show"></tbody>
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
								<span class="fa fa-coffee text-title"></span>&nbsp;
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
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
										<?php

											echo $caracteristicas;
										?>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php

											echo form_button(array('type'=>'button',
																	'class'=>'btn btn-primary',
																	'id' =>'selall',
																	'content' =>
																	"<span class='fa fa-check'></span>&nbsp;todos"));
										?>

										<?php

											echo form_button(array('type'=>'button',
																	'class'=>'btn btn-danger',
																	'id' =>'desall',
																	'content' =>
																	"<span class='fa fa-check'></span>&nbsp;ninguno"));
										?>
									</div>

								</div>

								<div class="form-group">
									
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
									<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
										<span class="fa fa-lightbulb-o text-warning"></span>&nbsp;
										Puede seleccionar multiples opciones, mantenga presionado Ctrl y haga click en las opciones.
									</div>

								</div>

							</div>


						</div>
					</div>

					<!-- adicionales -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								<span class="fa fa-coffee text-title"></span>&nbsp;
								Adicionales
							</h3>
						</div>
						<div class="panel-body">
							
							<div class="form-horizontal">

								<div class="form-group">
									
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

										<?php echo form_checkbox(array('class'=>'adicional',
											'value'=>'1',
											'checked'=>false)).'&nbsp;'.
											'Traslado a aeropuerto.' 
										?>

									</div>

									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

										<?php echo form_checkbox(array('class'=>'adicional',
											'value'=>'2',
											'checked'=>false)).'&nbsp;'.
											'Salón de eventos.' 
										?>

									</div>

									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

										<?php echo form_checkbox(array('class'=>'adicional',
											'value'=>'3',
											'checked'=>false)).'&nbsp;'.
											'Zona de juegos infantiles.' 
										?>

									</div>


								</div>

								<div class="form-group">
									
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

										<?php echo form_checkbox(array('class'=>'adicional',
											'value'=>'4',
											'checked'=>false)).'&nbsp;'.
											'Restaurante.' 
										?>

									</div>

									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

										<?php echo form_checkbox(array('class'=>'adicional',
											'value'=>'5',
											'checked'=>false)).'&nbsp;'.
											'Actividades de senderismo/caminata.' 
										?>

									</div>

									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

										<?php echo form_checkbox(array('class'=>'adicional',
											'value'=>'6',
											'checked'=>false)).'&nbsp;'.
											'Guarda equipaje.' 
										?>

									</div>


								</div>

								<div class="form-group">
									
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

										<?php echo form_checkbox(array('class'=>'adicional',
											'value'=>'7',
											'checked'=>false)).'&nbsp;'.
											'Gimnasio.' 
										?>

									</div>

									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

										<?php echo form_checkbox(array('class'=>'adicional',
											'value'=>'8',
											'checked'=>false)).'&nbsp;'.
											'Aire Acondicionado.' 
										?>

									</div>

									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

										<?php echo form_checkbox(array('class'=>'adicional',
											'value'=>'9',
											'checked'=>false)).'&nbsp;'.
											'Barbacoa.' 
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
										'Acepto las condiciones del servicio.' 
										?>
										
									</div>

								</div>

								<div class="form-group">
									
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>

									<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 texto-msg">
										
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



<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">
					<span class="fa fa-pencil-square text-title"></span>&nbsp;
					Condiciones del servicio
				</h4>
			</div>
			<div class="modal-body">

				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur cumque deserunt, molestiae eum ratione vel error earum id provident sequi culpa voluptate, ducimus dolores amet, nihil voluptatum harum atque hic.

				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus impedit laudantium consequatur dignissimos, quo quos ex id molestiae obcaecati neque quis quasi ducimus, veritatis itaque, sapiente, dolorem. Id, ut nemo.
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">
					<span class="fa fa-close"></span>&nbsp;
					Cerrar
				</button>
			</div>
		</div>
	</div>
</div>