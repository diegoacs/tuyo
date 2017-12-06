


<div class="container-fluid margin-search">
	<div class="container">

		<div class="row form-inline">
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-group">
				<label for="">Desde</label>
					<input type="date" class="form-control">		
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-group">
				<label for="">Hasta</label>
					<input type="date" class="form-control">		
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-group">
					<select class="selectpicker form-control" data-live-search="true">
                    <?php echo $categorias; ?>		
					</select>
					

			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 form-group">
				<label for="">Destino</label>
				<div class="input-group">
					<input type="text" class="form-control" value="<?php echo $city; ?>">		
					<span class="input-group-btn">
						<button type="button" class="btn btn-success">
							<span class="fa fa-search"></span>
						</button>
					</span>	
				</div>
			</div>
		</div>
			
	</div>	
</div>