<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Places_model extends CI_Model {

	function __construct(){
	    parent::__construct();
    	$this->load->database();
    }

    function changehorarios($data)
    {
    	iniTr();

    	$sql="update tipo_cobro set checkin_inicio='".escstr($data[0])."',".
    	"checkin_fin='".escstr($data[1])."',hora='".escstr($data[2])."',hrs_despues='".escstr($data[3])."' ".
    	"where id_calendario='".escstr($this->session->calendario_actual)."'";

    	if(!exeQuery($sql)){

    		rollTr();
    		die('2'.chr(9).'Problemas actualizando horarios.');

    	}

    	endTr();
    	die('1'.chr(9).'Horarios actualizados.');


    }


    function addHabs($data)
    {

        iniTr();

        // configurar habitaciones

        $calendario=$this->session->calendario_actual;

        for($u=0; $u<count($data['habitaciones']['unidad']); $u++){

        	//verificar si ya existe unidad

        	$sql="select uc.id_unidad from unidad_calendario uc ".
			"join unidades u on uc.id_unidad=u.id_unidad ".
			"where uc.id_calendario='".escstr($calendario)."' and uc.id_unidad='".escstr($data['habitaciones']['unidad'][$u])."'";

			if(nRows($sql)<1){

	            $sql="insert into unidad_calendario ".
	            "(id_unidad,id_calendario,deta_unidad,".
	            "precio_normal,capacidad) values ".
	            "('".escstr($data['habitaciones']['unidad'][$u])."','".escstr(str_pad($calendario,3,'0',STR_PAD_LEFT))."',".
	            "'".escstr($data['habitaciones']['nombre'][$u])."',".
	            escstr($data['habitaciones']['precio'][$u]).",".escstr($data['habitaciones']['personas'][$u]).")";

	            if(!exeQuery($sql)){

	                rollTr();
	                die('2'.chr(9).'Error: registrando unidades en calendario.');
	            }
				
			}


            for($j=0; $j<$data['habitaciones']['cantidad'][$u]; $j++){

                $sql="insert into desc_unidad".
                "(nom_desc,deta_desc,id_unidad,".
                "id_calendario,activo,capacidad) values ".
                "('".escstr($data['habitaciones']['nombre'][$u])."',".
                "'".escstr($data['habitaciones']['nombre'][$u])."',".
                "'".escstr($data['habitaciones']['unidad'][$u])."',".
                "'".escstr(str_pad($calendario,3,'0',STR_PAD_LEFT))."',".
                "'S',".escstr($data['habitaciones']['personas'][$u]).")";

                if(!exeQuery($sql)){

                    rollTr();
                    die('2'.chr(9).'Error: registrando descripcion de unidades.');
                }

            }



        }

        
        // configurar cobro

        $categoria = array_unique($data['habitaciones']['categoria']);

        $vals=array();

        foreach ($categoria as $val) {


        	//verifica si existe categoria

        	$sql="select id_categoria from tipo_cobro ".
			"where id_categoria=".escstr($val)." and id_calendario='".escstr($calendario)."'";

			if(nRows($sql)<1){

	            $vals[] = "('".escstr(str_pad($calendario,3,'0',STR_PAD_LEFT))."',".escstr($val).",'C',".
	            "'".escstr($data['info']['desde'])."','".escstr($data['info']['hasta'])."','1','".escstr($data['info']['entrada'])."','".escstr($data['info']['salida'])."')";
				
			}
            

        }

        if(!empty($vals)){

	        $sql = "insert into tipo_cobro (id_calendario,id_categoria,".
	        "tipo_cobro,hora,hrs_despues,hrs_min,checkin_inicio,checkin_fin) values ".implode(',',$vals);

	        if(!exeQuery($sql)){

	            rollTr();
	            die('2'.chr(9).'Error: registrando cobro.');
	        }

        }
       

        //destruir variable de session

        // $this->session->unset_userdata('authcode');

        // enviando correo

        // $link_activa=base_url('index.php/sys_consultas/Sign_in/activeCta/'.base64_encode($data['usr'].'/'.$codigo));
        //       $msg = "<html><head><title>Activación de entidad y usuario</title></head><body><p>Bienvenido a Tuyo.com</p><br> Hola ".$row->nombres."<br><span>Queremos darte la bienvenida a tuyo.com, para activar tu cuenta da un click </span><a target='_blank' href='".$link_activa."'>Aqui</a></body></html>";

        // $datamail = ['mail' =>escstr($data['ema']),'subjet'=>'Activación de cuenta usuario','msg'=>$msg,'from'='<no-responder@tuyo.com>' ];
        // $this->sendmail->send($datamail);


        //

        endTr();
        die('1'.chr(9).'Registro exitoso.');
        
    } 



    function changepeople($id)
    {
    	iniTr();

    	if(!is_numeric($id[0])) $id[0]=1;

	    $sql="update desc_unidad set capacidad=".escstr($id[0])." where id_desc=".escstr($id[1]);
	    if(!exeQuery($sql)){

	    	rollTr();
	    	die('2'.chr(9).'Problemas al actualizar.');
	    }



    	endTr();
    	die('1'.chr(9).'Actualizado.');


    }

    function changename($id)
    {
    	iniTr();

    	if(trim($id[0])){

	    	$sql="update desc_unidad set nom_desc='".escstr($id[0])."' where id_desc=".escstr($id[1]);
	    	if(!exeQuery($sql)){

	    		rollTr();
	    		die('2'.chr(9).'Problemas al actualizar.');
	    	}
    	}


    	endTr();
    	die('1'.chr(9).'Actualizado.');


    }

    function changedeta($id)
    {
    	iniTr();

    	if(trim($id[0])){

	    	$sql="update desc_unidad set deta_desc='".escstr($id[0])."' where id_desc=".escstr($id[1]);
	    	if(!exeQuery($sql)){

	    		rollTr();
	    		die('2'.chr(9).'Problemas al actualizar.');
	    	}
    	}


    	endTr();
    	die('1'.chr(9).'Actualizado.');


    }


    function changeprice($id)
    {
    	iniTr();

    	if(!is_numeric($id[0])) $id[0]=0;

    	$sql="update unidad_calendario set precio_normal=".escstr($id[0])." where id_unidad='".escstr($id[1])."' ".

    	" and id_calendario='".escstr($this->session->calendario_actual)."'";

    	if(!exeQuery($sql)){

    		rollTr();
    		die('2'.chr(9).'Problemas al actualizar.');
    	}

    	endTr();
    	die('1'.chr(9).'Actualizado.');


    }

    function delete_cama($id)
    {
    	iniTr();

    	$sql="delete from camas_desc where id_dcama=".escstr($id);
    	if(!exeQuery($sql)){

    		rollTr();
    		die('2'.chr(9).'Problemas al eliminar.');
    	}

    	endTr();
    	die('1'.chr(9).'Eliminado.');


    }

   	function delete_und($id)
    {
    	iniTr();

    	$sql="delete from desc_unidad where id_desc=".escstr($id);
    	if(!exeQuery($sql)){

    		rollTr();
    		die('2'.chr(9).'Problemas al eliminar.');
    	}

    	endTr();
    	die('1'.chr(9).'Eliminado.');


    }

    function add_cama($id)
    {
    	iniTr();

    	if($id[2]<1) $id[2]=1;

    	$sql="insert into camas_desc (id_tipo,id_desc,cantidad) values ".
    	"(".escstr($id[0]).",".escstr($id[1]).",".escstr($id[2]).")";

    	if(!exeQuery($sql)){

    		rollTr();
    		die('2'.chr(9).'Problemas al agregar.');
    	}

    	endTr();
    	die('1'.chr(9).'agregado.');


    }


    function updatetipo1($data)
    {

        iniTr();

        $entidad=$this->session->actual;

        $sql="update entidad set ".
		"nom_entidad='".escstr($data['info']['entidad'])."',tel_entidad='".escstr($data['info']['telefono'])."', ".
		"email_entidad='".escstr($data['info']['mailentidad'])."',id_muni=".escstr($data['info']['ciudad']).", ".
		"dir_entidad='".escstr($data['info']['direccion'])."',postal='".escstr($data['info']['postal'])."', ".
		"latitud=".escstr($data['info']['lat']).",longitud=".escstr($data['info']['long'])." ".
		"where id_entidad='".escstr($entidad)."'";

        if(!exeQuery($sql)){

            rollTr();
            die('2'.chr(9).'Error: Actualizando entidad.');
        }

        endTr();

        die('1'.chr(9).'Entidad actualizada.');
        
    } 

    function updatetipo3($data)
    {

        iniTr();

        $entidad=$this->session->actual;

        $sql="delete from carac_entidad where id_entidad='".escstr($entidad)."'";

        if(!exeQuery($sql)){

            rollTr();
            die('2'.chr(9).'Error: Actualizando entidad.');
        }

        if(trim($data['info']['caract'])){
        	
	        $ca = explode(',',trim($data['info']['caract'],','));

	        foreach ($ca as $value) {

	        	$sql="insert into carac_entidad (id_caracter,id_entidad) values (".escstr($value).",'".escstr($entidad)."')";
		        
		        if(!exeQuery($sql)){

		            rollTr();
		            die('2'.chr(9).'Error: Actualizando entidad.');
		        }

	        }

        }



        $sql="delete from adicionales_entidad where id_entidad='".escstr($entidad)."'";

        if(!exeQuery($sql)){

            rollTr();
            die('2'.chr(9).'Error: Actualizando entidad.');
        }


        if(trim($data['info']['add'])){

	        $ca = explode(',',trim($data['info']['add'],','));

	        foreach ($ca as $value) {

	        	$sql="insert into adicionales_entidad (id_adicional,id_entidad) values (".escstr($value).",'".escstr($entidad)."')";
		        
		        if(!exeQuery($sql)){

		            rollTr();
		            die('2'.chr(9).'Error: Actualizando entidad.');
		        }

	        }
        	
        }


        endTr();

        die('1'.chr(9).'Caracteristicas actualizadas.');
        
    } 


    function caracteristicasentidad($entidad)
    {

    	$sql="select id_caracter,descripcion from caracteristicas ".
    	"order by id_caracter asc";
    	$gen = getQuery($sql);

    	$rta=array('default'=>'','data' =>'','checked' => array());

    	$n=0;
    	foreach ($gen as $row) {

    		$sql="select id_caracter from carac_entidad ".
    		"where id_entidad='".escstr($entidad)."' and id_caracter=".escstr($row['id_caracter']);
    		if(nRows($sql)>0) $rta['checked'][]=$row['id_caracter'];


    		if($n==0) $rta['default']=$row['id_caracter'];

    		$rta['data'][$row['id_caracter']]=$row['descripcion'];

    		$n++;
    		
    	}

    	return $rta;    	

    }


    function adicionalesentidad($entidad)
    {

        $sql="select id_adicional,nombre from adicionales ".
        "order by id_adicional asc";
        $gen = getQuery($sql);

        $rta=array('default'=>'','data' =>'','checked' => array());

        $n=0;
        foreach ($gen as $row) {

        	$sql="select id_adicional from adicionales_entidad ".
    		"where id_entidad='".escstr($entidad)."' and id_adicional=".escstr($row['id_adicional']);
    		if(nRows($sql)>0) $rta['checked'][]=$row['id_adicional'];

            if($n==0) $rta['default']=$row['id_adicional'];

            $rta['data'][$row['id_adicional']]=$row['nombre'];

            $n++;
            
        }

        return $rta;        

    }




    function unidadescalendario($calendario)
    {

    	$sql="select uc.id_unidad,nom_unidad,deta_unidad,precio_normal ".
		"from unidad_calendario uc ".
		"join unidades u on uc.id_unidad=u.id_unidad ".
		"where id_calendario='".escstr($calendario)."'";

		$gen = getQuery($sql);

		$html='';

		foreach ($gen as $row) {
			
			$html.="<tr data-id='".$row['id_unidad']."'>".
			"<td>".$row['nom_unidad']."</td>".
			"<td>".$row['deta_unidad']."</td>".
			"<td class='price chhb'>".number_format($row['precio_normal'],2,'.',',')."</td>".
			"<td>".
			form_button(array(
				'class' => 'btn btn-danger btn-xs borraUnd',
				'content' => 'eliminar'
			))
			."</td>".
			"</tr>";

		}

		return $html;


    }


    function camas()
    {

    	$sql="select id_tipo,nombre from tipos_camas";

    	$gen = getQuery($sql);

    	$ca = array('default' => '','data' => array());

    	$n=0;
    	foreach ($gen as $row) {
    		
    		if($n==0) $ca['default']=$row['id_tipo'];

    		$ca['data'][$row['id_tipo']]=$row['nombre'];

    		$n++;

    	}

    	return $ca;

    }


    function hab_actuales($calendario)
    {

    	$sql="select id_desc,c.nom_categoria,u.nom_unidad,".
		"nom_desc,deta_desc,capacidad from desc_unidad du ".
		"join unidades u on du.id_unidad=u.id_unidad ".
		"join categorias c on u.id_categoria=c.id_categoria ".
		"where du.id_calendario='".escstr($calendario)."'";

		$gen = getQuery($sql);

		$html = '';
		foreach ($gen as $row) {


			$sql="select id_dcama,nombre,cantidad from camas_desc d ".
			"join tipos_camas t on d.id_tipo=t.id_tipo ".
			"where id_desc=".$row['id_desc'];

			$camas=getQuery($sql);

			$n=1;
			$filas='';
			foreach ($camas as $v) {

				$filas.="<div class='camas'>".
				form_button(
					array('class' => 'elicama btn btn-danger btn-xs',
						'content' => '<span class=\'fa fa-close\'></span>',
						'data-id' => $v['id_dcama']
						   )
				).
				$v['cantidad'].'&nbsp;'.$v['nombre'].
				"</div>";

			}


			$html.="<tr data-id='".$row['id_desc']."'>".

			"<td>".$row['nom_categoria']."</td>".
			"<td>".$row['nom_unidad']."</td>".
			"<td class='nombrehb'>".$row['nom_desc']."</td>".
			"<td class='detahb'>".$row['deta_desc']."</td>".
			"<td class='camashb' style='width:20%'>".$filas."</td>".		
			"<td class='canthb'>".$row['capacidad']."</td>".
			"<td>".
			form_button(array(

				'class' => 'btn btn-danger btn-xs eliund',
				'content' => "eliminar"

			)).'&nbsp;'.
			anchor('#new-cama', '<span class=\'fa fa-plus\'></span>&nbsp;cama',array(
				'class' => 'btn btn-primary btn-xs ncama',
				'data-toggle' => "modal"
			)).
			"</td>".
			"</tr>";

			
		}

		return $html;
    }


    function calendario($entidad)
    {
    	$sql="select id_calendario from calendario where id_entidad='".escstr($entidad)."'";
    	if(nRows($sql)>0){

    		$gen = oneRow($sql);
    		return $gen->id_calendario;
    	}
    	else return false;
    }

    function horarios($entidad)
    {

    	$sql="select hora,hrs_despues,checkin_inicio,checkin_fin from entidad e ".
		"join calendario c on e.id_entidad=c.id_entidad ".
		"join tipo_cobro t on c.id_calendario=t.id_calendario ".
		"where e.id_entidad='".escstr($entidad)."'";

		$gen = oneRow($sql);

		$vals = array();

		$vals[6]=$gen->hora;
		$vals[7]=$gen->hrs_despues;
		$vals[8]=$gen->checkin_inicio;
		$vals[9]=$gen->checkin_fin;

		return $vals; 
    }


    function nombre_entidad($data)
    {
    	$sql="select id_entidad from entidades_usuario where id_entidad='".escstr($data[0])."'".
    	" and usuario='".escstr($this->session->user)."' ";
    	
    	if(nRows($sql)>0){

	    	$sql="select nom_entidad from entidad where id_entidad='".escstr($data[0])."'";
	    	return oneRow($sql);
    	}
    	else return false;

    }


    function getPositions($data)
    {
    	$rta = '';

		if($data[3]=='1'){

    		$sql="select p.id_pais,d.id_dept,m.id_muni from pais p  ".
			"join departamento d on p.id_pais=d.id_pais ".
			"join municipio m on d.id_dept=m.id_dept ".
			"where iso_code='".escstr($data[0])."' and  ".
			"nom_dept ='".escstr($data[1])."' and nom_muni='".escstr($data[2])."'";

    		if(nRows($sql)>0){
	    	
	    		$gen = oneRow($sql);
	    		$rta = $gen->id_pais.chr(9).$gen->id_dept.chr(9).$gen->id_muni;

	    	}
		}
		else{

			$sql="select p.id_pais,d.id_dept from pais p  ".
			"join departamento d on p.id_pais=d.id_pais ".
			$sql.="where iso_code='".escstr($data[0])."' and  ".
			"nom_dept ='".escstr($data[1])."'";

	    	if(nRows($sql)>0){
	    	
	    		$gen = oneRow($sql);
	    		$rta = $gen->id_pais.chr(9).$gen->id_dept.chr(9).'';

	    	}
		}
    	echo $rta;


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
		"CONCAT_WS(',',latitud,longitud) as geo,postal ".
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