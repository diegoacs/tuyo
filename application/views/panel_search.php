


<div class="container-fluid margin-search">
	<div class="container">

		<form class="row form-inline hidden-xs hidden-sm" role="form" method="post" action="<?php echo base_url('index.php/Panel_ini/searchRta'); ?>">
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-group">
				<label for="">Desde</label>
					<input type="date" class="form-control" name="searchdate1">		
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-group">
				<label for="">Hasta</label>
					<input type="date" class="form-control" name="searchdate2">		
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-group">
					<select class="selectpicker form-control" name="searchcategory" data-live-search="true">
                    <?php echo $categorias; ?>		
					</select>
					

			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-group">
				<label for="">Destino</label>
				<div class="input-group">
					<input type="text" class="form-control" name="searchcity" value="<?php echo $city; ?>">		
					<span class="input-group-btn">
						<button type="submit" class="btn btn-success">
							<span class="fa fa-search"></span>
						</button>
					</span>	
				</div>
			</div>
		</form>

		<form class="form-horizontal hidden-md hidden-lg" role="form" method="post" action="<?php echo base_url('index.php/Panel_ini/searchRta'); ?>">

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
						<input type="text" class="form-control" name="searchcity" value="<?php echo $city; ?>"
						placeholder='Elige tu destino'>		
						<span class="input-group-btn">
							<button type="submit" class="btn btn-success">
								<span class="fa fa-search"></span>
							</button>
						</span>	
					</div>
				</div>
			</div>


		</form>
			
	</div>	
</div>