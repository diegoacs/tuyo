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

							<div class="form-horizontal">
								
								<div class="form-group">
		
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										
										<a class="btn btn-primary" data-toggle="modal" href='#modal-id'>
											<span class="fa fa-file-o"></span>&nbsp;
											condiciones del servicio
										</a>

									</div>

								</div>

								<div class="form-group">

									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										
										<?php

											if($this->session->has_userdata('user')){

												if($this->session->perfil == 'A' || $this->session->perfil == 'P'){

														echo anchor(base_url().'index.php/Signup/enter_panel/', 
															"<span class='fa fa-home'></span>&nbsp;volver a mis lugares", 
															array('id' => 'back_places',
																'name' => 'back_places',
																'class' => 'btn btn-primary'));
												}

											}

										?>
										
									</div>
									
								</div>


							</div>



						</div>
					</div>
					
				</div>

				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">


					
			<?php

				if(!$this->session->has_userdata('user')){
			?>
			
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
					
			<?php		

				}

			?>

					
					<?php 

						echo $data_form;

						echo $unidades_form;

						echo $caract_form;
					?>

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

											if($this->session->has_userdata('user')){

												if($this->session->perfil == 'A' || $this->session->perfil == 'P'){

													echo form_button(array('type'=>'button',
																			'class'=>'btn btn-primary',
																			'id' =>'addentidad',
																			'content' =>
																			"<span class='fa fa-save'></span>&nbsp;agregar nuevo establecimiento"));
												}

											}
											else{
												
												echo form_button(array('type'=>'button',
																		'class'=>'btn btn-primary',
																		'id' =>'saveentidad',
																		'content' =>
																		"<span class='fa fa-save'></span>&nbsp;guardar establecimiento"));

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