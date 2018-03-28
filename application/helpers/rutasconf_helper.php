<?php  

function ruta_conf($tipo='verimg'){

 	$CI =& get_instance();

	if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $so = 'W';

	elseif (strtoupper(substr(PHP_OS, 0, 3)) === 'LIN') $so = 'L';

	else $so = 'M';

  
	$sql="select ruta from rutas_configuraciones ".

	"where nombre='".escstr($tipo)."' and so='".escstr($so)."'";

	$ruta = '';

	if(nRows($sql)>0){

		$gen = oneRow($sql);

		$ruta = $gen->ruta;

	}

	return $ruta;

}

?>