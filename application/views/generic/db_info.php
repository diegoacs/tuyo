<!DOCTYPE html>
<html>
<head>
	<title>DB info - version 0.1</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container">

		<div class="row" style="margin: 20px 0px 10px 0px;">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"></h3>
					</div>
					<div class="panel-body">
						<h1>Info generador version 0.1 beta</h1>
						<h3>base de datos: <?php echo $db; ?></h3> 
						<p>autor_ Diego Castellanos</p>  
					</div>
				</div>

			</div>
		</div>
		
		<div class="row">
			
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

					    <div class="panel-group" id="accordion">
					       
					        <div class="panel panel-default">

								<?php

									$f=1;

									foreach ($html as $value) {


							            echo "<div class='panel-heading'>
							                <h4 class='panel-title'>
							                    <a data-toggle='collapse' data-parent='#accordion' href='#".$value['nombre']."'>".$f.' - '.$value['nombre']."</a>
							                </h4>
							            </div>
							            <div id='".$value['nombre']."' class='panel-collapse collapse in'>
							                <div class='panel-body'>
												".$value['content']."
							                </div>
							            </div>";
										
										$f++;

									}



					            ?>

					        </div>

					    </div>

			</div>

			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Menú</h3>
					</div>
					<div class="panel-body">

						<?php echo "total tablas: ".count($html); ?>
						<br><br>
						
						<div class="form-horizontal">
							
							<div class="form-group">

								<div class="col-xs-12">
	
									<?php

										echo anchor(base_url().'index.php/generic/Db_info/generatedb', 'generar backup', 
											array('id'=>'generadb','class'=>'btn btn-primary'));
									?>

								</div>

							</div>

							<div class="form-group">

								<div class="col-xs-12">
	
									<?php

										echo anchor(base_url().'index.php/generic/Db_info/download_db', 'descargar backup', 
											array('id'=>'downloaddb','class'=>'btn btn-primary'));
									?>

								</div>

							</div>

							<div class="form-group">

								<div class="col-xs-12">
	
									<?php

										echo anchor(base_url().'index.php/generic/Db_info/get_schema', 'obtener squema', 
											array('id'=>'getsch','class'=>'btn btn-primary'));
									?>

								</div>

							</div>

						</div>


					</div>
				</div>

			</div>
		</div>

	</div>


</body>
</html>