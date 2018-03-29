


<div class="container-fluid margin-search">

	<div class="container">

		<?php  

			echo form_open('Panel_ini/panelRta',['class'=>'hidden-xs','role'=>'form','method'=>'post'],'');

		?>

			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
				<label for="">Desde</label>
					<input type="date" class="form-control" name="searchdate1">		
			</div>

			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
				<label for="">Hasta</label>
					<input type="date" class="form-control" name="searchdate2">		
			</div>

			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
				<label for="">Categorias</label>
					<select class="selectpicker form-control" name="searchcategory" data-live-search="true">
                    <?php echo $categorias; ?>		
					</select>
			</div>

			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">

				<label for="">Destino</label>

				<div class="input-group">
					<?php  

						echo form_input('searchcity', $city,['class'=>'form-control','placeholder'=>'Elige tu destino']);

					?>

					<span class="input-group-btn">
						<button type="submit" class="btn btn-success">
							<span class="fa fa-search"></span>
						</button>
					</span>	
				</div>

			</div>

		<?php  
			
			echo form_close();

		?>	


		<?php

			echo form_open('Panel_ini/panelRta',['class'=>'hidden-sm hidden-md hidden-lg','role'=>'form','method'=>'post'],'');

		?>

			<div class="form-group">
				<label class="control-label col-xs-6">
					<span class="fa fa-calendar"></span>&nbsp;Llegada
				</label>
				<label class="control-label col-xs-6">
					<span class="fa fa-calendar"></span>&nbsp;Salida
				</label>
			</div>

			<div class="form-group">
				<div class="col-xs-6">
					<input type="date" class="form-control" name="searchdate1">		
				</div>
				<div class="col-xs-6">
					<input type="date" class="form-control" name="searchdate2">		
				</div>
			</div>

			<div class="form-group">			
				<div class="col-xs-12">
						<select class="selectpicker form-control" name="searchcategory" data-live-search="true">
	                    <?php echo $categorias; ?>		
						</select>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<div class="input-group">

					<?php  

						echo form_input('searchcity', $city,['class'=>'form-control','placeholder'=>'Elige tu destino']);

					?>						
						<span class="input-group-btn">
							<button type="submit" class="btn btn-success">
								<span class="fa fa-search"></span>
							</button>
						</span>	
					</div>
				</div>
			</div>


		<?php  

			echo form_close();

		?>
			
	</div>	
</div>