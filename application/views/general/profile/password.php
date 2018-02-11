<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			<span class="fa fa-key text-title"></span>
			&nbsp;Contraseña
		</h3>
	</div>
	<div class="panel-body">
		
		<div class="form-horizontal">
				
			<div class="form-group">
				
				<label class="control-label col-xs-12 col-md-2">
					<span class="fa fa-unlock-alt text-title"></span>
					&nbsp;Nueva contraseña
				</label>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				
					<?php

						echo form_input(array(
							'type' =>'password',
							'class' => 'form-control',
							'id' => 'nwp-usr'
						));

					?>

				</div>

				<label class="control-label col-xs-12 col-md-2">
					<span class="fa fa-unlock-alt text-title"></span>
					&nbsp;Repetir nueva contraseña
				</label>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				
					<?php

						echo form_input(array(
							'type' =>'password',
							'class' => 'form-control',
							'id' => 'nwpr-usr'
						));

					?>

				</div>

			</div>

			<div class="form-group">
				
				<label class="control-label col-xs-12 col-md-2">
					<span class="fa fa-unlock-alt text-title"></span>
					&nbsp;Contraseña anterior
				</label>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				
					<?php

						echo form_input(array(
							'type' =>'password',
							'class' => 'form-control',
							'id' => 'pant-usr'
						));

					?>

				</div>	

				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				
					<?php

						$content = "<span class='fa fa-key'></span>&nbsp;actualizar contraseña";

						echo form_button(
							array('type' => 'button',
								'class' => 'btn btn-primary',
								'content' => $content,
								'id' => 'change-pass')
						);

					?>

				</div>	

			</div>

		</div>


	</div>
</div>