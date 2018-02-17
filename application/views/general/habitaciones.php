
<div class="panel panel-default">
	<div class="panel-body">
		
		<div class="fom-horizontal">
			
			<div class="form-group">
				
				<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
					
				</div>

				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
					
					<?php

						echo form_button(array(
							'id' => 'savenewhbs',
							'class' => 'btn btn-primary',
							'content' => '<span class=\'fa fa-plus-circle\'></span>&nbsp;Incluir nuevas habitaciones'
						));

						echo form_button(

							array('id' => 'saveUnds',
								'class' =>'btn btn-primary',
								'content' =>'<span class=\'fa fa-save\'></span>&nbsp;Actualizar información horarios'

							)

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
			<span class="fa fa-bars text-title"></span>
			&nbsp;Tipos
		</h3>
	</div>
	<div class="panel-body">

		<div class="alert alert-info">
			En esta tabla se describen los tipos habitaciones/unidades en la entidad.
		</div>
		
		<div class="table-responsive">
			

			<table class="table table-hover table-bordered table-unidades">
				<thead>
					<tr>
						<th>Tipo</th>
						<th>Detalle</th>
						<th>Precio</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody class="table-unidades-show">
					
					<?php

						echo $undcal;

					?>

				</tbody>
			</table>
		</div>

	</div>
</div>


<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			<span class="fa fa-bed text-title"></span>
			&nbsp;Habitaciones detalladas
		</h3>
	</div>
	<div class="panel-body">

		<div class="alert alert-info">
			En esta tabla se describen los las habitaciones detalladas.
		</div>

		<div class="form-horizontal">
			
			<div class="form-group">
				
				<label class="control-label col-xs-12 col-md-2">
					<span class="fa fa-bars text-title"></span>
					&nbsp;Tipo
				</label>

				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<?php

						echo $sel_unds;
					?>
				</div>

			</div>

		</div>

		<div class="table-responsive">
			<table class="table table-hover table-bordered table-hab">
				<thead>
					<tr>
						<th>Categoria</th>
						<th>Tipo</th>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Camas</th>
						<th>Personas</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody class="table-hab-show">
					<?php

						echo $hab_act;

					?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<div class="modal fade" id="new-cama">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Camas</h4>
			</div>
			<div class="modal-body">

				<div class="form-horizontal">
					
					<?php

						echo form_input(array('type' => 'hidden',
										'id' => 'idhb', 'value' =>''));

					?>
					<div class="form-group">
						
						<label class='control-label col-xs-12 col-md-2'>
							Cama							
						</label>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<?php
								echo $camas;
							?>
						</div>
						<label class='control-label col-xs-12 col-md-2'>
							Cantidad							
						</label>
						<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
							<input type="text" class="intFor form-control" id='ccama'>
						</div>

					</div>

				</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary nueva-cama">Guardar</button>
			</div>
		</div>
	</div>
</div>


