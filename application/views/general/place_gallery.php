

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">
			<span class="fa fa-file-image-o text-title"></span>
			&nbsp;Galeria
		</h3>
	</div>
	<div class="panel-body">

		<div class="form-horizontal">
			
			<div class="form-group">
	
				<div class="img-gallery col-xs-12 col-sm-12 col-md-12 col-lg-12">
					
					<?php

						echo $gallery;

					?>

				</div>
				
			</div>

            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-12 col-md-2 col-lg-2">Nombre</label>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <input type="text" id="nomimg" class="form-control">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <input type="file" id="getimg" class="form-control">
                </div>
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    
                    <?php

                    	echo form_button(
                    		array('type' =>"button",
                    		'class' => "btn btn-primary saveImg",
                    		'content' => '<span class="fa fa-file-image-o"></span>&nbsp;Guardar imagen')
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
			<span class="fa fa-home"></span>
			&nbsp;Descripciones</h3>
	</div>
	<div class="panel-body">
		<div class="form-horizontal">
			
			<div class="form-group">
				<label class="control-label col-xs-12 col-md-2">Condiciones de servicio</label>
				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
					<textarea class='form-control' id="condi" rows="4" placeholder="Escriba las condiciones del servicio..."><?php echo $desc[1]; ?></textarea>
				</div>

			</div>

			<div class="form-group">
				<label class="control-label col-xs-12 col-md-2">Descripción</label>
				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
					<textarea class='form-control' id="desc" rows="4" placeholder="Escriba una descripción de su sitio..."><?php echo $desc[0]; ?></textarea>
				</div>
			</div>

		</div>
	</div>
</div>











