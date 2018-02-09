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
																  'class'=>'form-control','value' => $rta[0]));
										?>
									</div>

								</div>

								<div class="form-group">
									
									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-phone"></span>&nbsp;
										Teléfono
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php
											echo form_input(array('type'=>'text','id'=>'telefonoentidad',
																  'class'=>'form-control','value' => $rta[1]));
										?>
									</div>

									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-envelope-o"></span>&nbsp;
										Correo
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php
											echo form_input(array('type'=>'text','id'=>'emailentidad',
																  'class'=>'form-control','value' => $rta[2]));
										?>
									</div>
								</div>


								<div class="form-group">
									
									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-location-arrow"></span>&nbsp;
										País
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php
											echo $pais;
										?>
									</div>

									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-location-arrow"></span>&nbsp;
										Departamento
									</label>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<?php
											echo $departamento;
										?>
									</div>
									
								</div>

								<div class="form-group">
									


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


					<!-- checks establecimientos -->
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
							<span class="fa fa-bars text-title"></span>&nbsp;
								Tipo establecimiento
							</h3>
						</div>
						<div class="panel-body">

							<?php

								echo $tipo_establecimiento;

							?>
							
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
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
										<?php
											echo form_input(array('type'=>'text','id'=>'direccionentidad',
																  'class'=>'form-control','value' => $rta[3]));
										?>
									</div>

									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-envelope-o"></span>&nbsp;
										Código postal
									</label>
									<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
										<?php
											echo form_input(array('type'=>'text','id'=>'postal',
																  'class'=>'form-control','value' => $rta[5]));
										?>
									</div>

								</div>


								<div class="form-group">

									<label class="label-control col-xs-12 col-md-2">
										<span class="fa fa-map-marker text-danger"></span>&nbsp;
										Coordenadas
									</label>	
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

										<?php
											echo form_input(array('type'=>'text','id'=>'latlng',
																  'class'=>'form-control','value' => $rta[4]));
										?>

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


