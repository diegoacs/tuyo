


<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			<span class="fa fa-user text-title"></span>
			&nbsp;Datos personales
		</h3>
	</div>
	<div class="panel-body">
		
		<div class="form-horizontal">
				
			<div class="form-group">
				
				<label class="control-label col-xs-12 col-md-2">
					<span class="fa fa-id-card-o text-title"></span>
					&nbsp;Nombres
				</label>
				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
				
					<?php

						echo form_input(array(
							'type' =>'text',
							'class' => 'form-control',
							'id' => 'nombre-usr',
							'value' => $this->session->nombres
						));

					?>

				</div>

			</div>

			<div class="form-group">
				
				<label class="control-label col-xs-12 col-md-2">
					<span class="fa fa-envelope-o text-title"></span>
					&nbsp;E-mail
				</label>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				
					<?php

						echo form_input(array(
							'type' =>'text',
							'class' => 'form-control',
							'id' => 'email-usr',
							'value' => $this->session->user
						));

					?>

				</div>		


				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				
					<?php

						$content = "<span class='fa fa-check'></span>&nbsp;actualizar información";

						echo form_button(
							array('type' => 'button',
								'class' => 'btn btn-primary',
								'content' => $content,
								'id' => 'change-info')
						);

					?>

				</div>

			</div>

		</div>


	</div>
</div>