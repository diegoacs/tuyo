<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Places_model extends CI_Model {

	function __construct(){
	    parent::__construct();
    	$this->load->database();
    }


    function entidades($usr)
    {

    	$sql="select e.id_entidad,nom_entidad from entidades_usuario eu ".
		"join entidad e on eu.id_entidad=e.id_entidad ".
		"where usuario='".escstr($usr)."'";

		$gen = getQuery($sql);

		$rta = array('entidad' => '','nombre' => '');

		$id=array();

		$nom=array();

		$n=0;
		foreach ($gen as $row) {

			if($n==0) {

				$rta['entidad'] = $row['id_entidad'];
				$rta['nombre'] = $row['nom_entidad'];

			}

			$id[]=$row['id_entidad'];
			$nom[]=$row['nom_entidad'];

			$n++;
			
		}

		$rta['data'] = array('id' =>$id, 'nom' => $nom);

		return $rta;

    }

    function generaldata($entidad)
    {
    	
    	$sql="select  ".
		"nom_entidad,tel_entidad,dir_entidad,email_entidad,id_muni, ".
		"CONCAT_WS(',',latitud,longitud) as geo ".
		"from entidad where id_entidad='".escstr($entidad)."'";

		return oneRow($sql);

    }

    function getlugar($municipio)
    {

    	$sql="select p.id_pais,d.id_dept,m.id_muni from municipio m ".
		"join departamento d on m.id_dept=d.id_dept  ".
		"join pais p on d.id_pais=p.id_pais where id_muni='".escstr($municipio)."'";

		return oneRow($sql);

    }


}

/* End of file places_model.php */
/* Location: ./application/models/places_model/places_model.php */