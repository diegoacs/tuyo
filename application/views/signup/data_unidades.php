
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
									
									<label class="label-control col-xs-12 col-md-3">
										<span class="fa fa-clock-o"></span>&nbsp;
										Check-in desde
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
										<?php

											echo form_input(array('type'=>'time','id'=>'entrada',
																  'class'=>'form-control','value' =>$rta[8]));
										?>
									</div>

									<label class="label-control col-xs-12 col-md-3">
										<span class="fa fa-clock-o"></span>&nbsp;
										Check-in hasta
									</label>
									<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
										<?php

											echo form_input(array('type'=>'time','id'=>'salida',
																  'class'=>'form-control','value' =>$rta[9]));
										?>
									</div>

								</div>

								<div class="form-group">
									
									<label class="label-control col-xs-12 col-md-3">
										<span class="fa fa-clock-o"></span>&nbsp;
										Check-out desde
									</label>
									<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
										<?php

											echo form_input(array('type'=>'time','id'=>'salidadesde',
																  'class'=>'form-control','value' =>$rta[6]));
										?>
									</div>

									<label class="label-control col-xs-12 col-md-3">
										<span class="fa fa-clock-o"></span>&nbsp;
										Check-out hasta
									</label>
									<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
										<?php

											echo form_input(array('type'=>'time','id'=>'salidahasta',
																  'class'=>'form-control','value' =>$rta[7]));
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
										<span class="fa fa-bed"></span>&nbsp;
										Tipo
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