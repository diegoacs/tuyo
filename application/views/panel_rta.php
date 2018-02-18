
<?php
	foreach ($resultados as $row) {
		
?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">

				<a href='<?php echo base_url('index.php/Panel_ini/productDetals/'.$row['id_entidad'].'/'.$row['id_muni']); ?>'>
					<span class="fa fa-home text-title"></span>&nbsp;
					<?php echo $row['nom_entidad'];?>
				</a>

			</h3>
		</div>
		<div class="panel-body">
			<p>
				<span class="fa fa-map-marker text-danger"></span>&nbsp;
				<?php echo ucfirst(strtolower($row['nom_muni'])); ?>
					
			</p>
			<p>
				<span class="fa fa-bed text-primary"></span>&nbsp;
				<?php echo $row['num'].' disponibles'; ?>
					
			</p>

			<p>
				<span class="fa fa-dollar text-success"></span>&nbsp;
				<?php echo 'desde '.number_format($row['precio'],2,'.',','); ?>
					
			</p>

			<p>
				<?php echo $row['descrip']; ?>
					
			</p>
			<h4>
				Condiciones del servicio
			</h4>
			<p>
				<?php echo $row['condic']; ?>
					
			</p>

		</div>
	</div>


<?php
	}
?>
