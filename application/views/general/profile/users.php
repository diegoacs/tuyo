<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			<span class="fa fa-users text-title"></span>
			&nbsp;Usuarios actuales
		</h3>
	</div>
	<div class="panel-body">
		
		<div class="form-horizontal">
			
			<div class="form-group">
				
				<label class="col-xs-12 col-md-2 control-label">
					<span class="fa fa-users text-title"></span>
					&nbsp;Usuario
				</label>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					
					<?php

						echo $usuarios;

					?>


				</div>

				<label class="col-xs-12 col-md-2 control-label">
					<span class="fa fa-bars text-title"></span>
					&nbsp;Perfil
				</label>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					
					<?php

						echo $perfiles;

					?>


				</div>

			</div>


		</div>


	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			<span class="fa fa-users text-title"></span>
			&nbsp;Entidades asignadas
		</h3>
	</div>
	<div class="panel-body">
		
		<div class="form-horizontal">
			
			<div class="form-group">
				
				<div class="col-xs-12 col-sm-12 col-md-11 col-lg-12">
					
					<?php

						echo $entidades;

					?>


				</div>

			</div>

			<div class="form-group">
				
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					
					<?php

						$content = "<span class='fa fa-check'></span>&nbsp;guardar cambios";

						echo form_button(
							array('type' =>'button',
								'id' => 'change-admin',
								'class' => 'btn btn-primary',
								'content' => $content)
						);

					?>

				</div>

			</div>

		</div>

	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			<span class="fa fa-plus text-title"></span>
			&nbsp;Crear nuevos usuarios
		</h3>
	</div>
	<div class="panel-body">
		
		<div class="form-horizontal">
			
			<div class="form-group">
				
				<label class="control-label col-xs-12 col-md-2">
					<span class="fa fa-envelope-o text-title"></span>
					&nbsp;E-mail
				</label>

				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					
					<?php

						echo form_input(array('type'=>'text',
										'class'=>'form-control',
										'id' => 'newusr'
										 ));

					?>

				</div>

				<label class="control-label col-xs-12 col-md-2">
					<span class="fa fa-bars text-title"></span>
					&nbsp;Perfil
				</label>

				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					
					<?php

						echo form_dropdown('newprofile', $newperfil,'',array('id' => 'newprofile','class' => 'form-control'));

					?>

				</div>

			</div>

			<div class="form-group">
				
				<label class="control-label col-xs-12 col-md-2">
				</label>

				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					
					<?php
						
						echo form_button(array(
											'type' => 'button',
											'class' => 'btn btn-primary',
											'id' => 'sendusr',
											'content' => "<span class='fa fa-plus'></span>&nbsp;crear usuario"
											));

					?>

				</div>

			</div>

		</div>

	</div>
</div>