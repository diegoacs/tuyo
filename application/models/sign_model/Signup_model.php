<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup_model extends CI_Model {

	
    function __construct(){
	    parent::__construct();
    	$this->load->database();
    }

    function pais()
    {
    	$sql="select id_pais,nom_pais from pais order by id_pais asc";
    	$gen = getQuery($sql);

    	$rta=array('default'=>'','data' =>'');

    	$n=0;
    	foreach ($gen as $row) {

    		if($n==0) $rta['default']=$row['id_pais'];

    		$rta['data'][$row['id_pais']]=$row['nom_pais'];

    		$n++;
    		
    	}

    	return $rta;

    }

    function departamento($pais)
    {

    	$sql="select id_dept,nom_dept from departamento ".
    	"where id_pais=$pais order by id_dept asc";
    	$gen = getQuery($sql);

    	$rta=array('default'=>'','data' =>'');

    	$n=0;
    	foreach ($gen as $row) {

    		if($n==0) $rta['default']=$row['id_dept'];

    		$rta['data'][$row['id_dept']]=$row['nom_dept'];

    		$n++;
    		
    	}

    	return $rta;

    }

    function ciudad($dep)
    {

    	$sql="select id_muni,nom_muni from municipio ".
    	"where id_dept=$dep order by id_muni asc";
    	$gen = getQuery($sql);

    	$rta=array('default'=>'','data' =>'');

    	$n=0;
    	foreach ($gen as $row) {

    		if($n==0) $rta['default']=$row['id_muni'];

    		$rta['data'][$row['id_muni']]=$row['nom_muni'];

    		$n++;
    		
    	}

    	return $rta;    	

    }


    function establecimientos()
    {

    	$sql="select id_establecimiento,nombre from tipos_establecimientos ".
    	"order by id_establecimiento asc";
    	$gen = getQuery($sql);

    	$rta=array('default'=>'','data' =>'');

    	$n=0;
    	foreach ($gen as $row) {

    		if($n==0) $rta['default']=$row['id_establecimiento'];

    		$rta['data'][$row['id_establecimiento']]=$row['nombre'];

    		$n++;
    		
    	}

    	return $rta;    	

    }

    function categoria()
    {

    	$sql="select id_categoria,nom_categoria from categorias ".
    	"order by id_categoria asc";
    	$gen = getQuery($sql);

    	$rta=array('default'=>'','data' =>'');

    	$n=0;
    	foreach ($gen as $row) {

    		if($n==0) $rta['default']=$row['id_categoria'];

    		$rta['data'][$row['id_categoria']]=$row['nom_categoria'];

    		$n++;
    		
    	}

    	return $rta;    	

    }


    function unidad($categoria)
    {

    	$sql="select id_unidad,nom_unidad from unidades ".
    	"where id_categoria=$categoria order by id_unidad asc";
    	$gen = getQuery($sql);

    	$rta=array('default'=>'','data' =>'');

    	$n=0;
    	foreach ($gen as $row) {

    		if($n==0) $rta['default']=$row['id_unidad'];

    		$rta['data'][$row['id_unidad']]=$row['nom_unidad'];

    		$n++;
    		
    	}

    	return $rta;    	

    }

    function caracteristicas()
    {

    	$sql="select id_caracter,descripcion from caracteristicas ".
    	"order by id_caracter asc";
    	$gen = getQuery($sql);

    	$rta=array('default'=>'','data' =>'');

    	$n=0;
    	foreach ($gen as $row) {

    		if($n==0) $rta['default']=$row['id_caracter'];

    		$rta['data'][$row['id_caracter']]=$row['descripcion'];

    		$n++;
    		
    	}

    	return $rta;    	

    }


    function verifycode($code)
    {

    	iniTr();
    	$sql="select usuario from codes_public where code_verifica='".escstr($code)."' ".
    	" and activo='N'";
    	if(nRows($sql)>0){

    		$gen = oneRow($sql);
    		$usr = $gen->usuario;

    		$sql="select id_user from users_public where email='".escstr($usr)."'";
    		$gn = oneRow($sql);
    		$ref = $gn->id_user;

    		$pass = random_code(8);

    		$encrypted = $this->encryptpass->generate_pass(array('password'=>$pass , 'key' => '$2y$10$'));

    		$sql="insert into public_auth_users (usuario,authcode,id_reference) values ".
    		"('".escstr($usr)."','".$encrypted."',".$ref.")";
    		if(!exeQuery($sql)){
    			
    			rollTr();
    			return '2';
    		}

    		$sql="update codes_public set activo='S' where usuario='".escstr($usr)."' and activo='N' and code_verifica='".escstr($code)."'";
    		if(!exeQuery($sql)){
    			
    			rollTr();
    			return '2';
    		}

    		// aca va lo del correo

    		//envio password a usuario
    		endTr();
    		return '1';

    	}
    	else{

    		endTr();
    		return '2';
    	}

    }


	function remove_old_captcha($expiration)
	{

		$sql="delete from captcha where captcha_time < ".$expiration;

		if(!exeQuery($sql)) die('2');


	}


	function check($ip,$expiration,$captcha)
	{
		//comprobamos si existe un registro con los datos
		//envíados desde el formulario

		$sql="select ip_address from captcha where word='".escstr($captcha)."' ".
		" and ip_address='".escstr($ip)."' and captcha_time > ".$expiration;

		return nRows($sql);

	}


    function save_captcha($data)
    {
    	 //insertamos el captcha en la bd
		 $af = array(
		 'captcha_time' => $data['time'],
		 'ip_address' => $this->input->ip_address(),
		 'word' => $data['word']
		 );
		 $query = $this->db->insert_string('captcha', $af);
		 $this->db->query($query);
    }

	function registerUsr($data)
	{

		iniTr();
		//registrando usuario en base 
		$sql="select email from users_public where email='".escstr($data['ema'])."'";

		if(nRows($sql)>0){

			rollTr();
			die('2'.chr(9).'Usuario con este correo ya se encuentra registrado.');

		}

		if(!trim($data['dir']))$data['dir']='null';
		else $data['dir']="'".$data['dir']."'";
		if(!trim($data['tel']))$data['tel']='null';
		else $data['tel']="'".$data['tel']."'";

		$sql="insert into users_public (nombres,apellidos,nacimiento,email,".
		"telefono,direccion) values ".
		"('".escstr($data['nom'])."','".escstr($data['ape'])."','".escstr($data['fch'])."','".escstr($data['ema'])."',".
		$data['tel'].",".$data['dir'].")";

		if(!exeQuery($sql)){

			rollTr();
			die('2'.chr(9).'Error: registrando usuario.');
		}

		//generar activacion
		$sql="insert into codes_public (usuario,code_verifica) values ".
		"('".escstr($data['ema'])."','".escstr(random_code(6))."')";

		if(!exeQuery($sql)){

			rollTr();
			die('2'.chr(9).'Error: registrando usuario.');
		}

		//destruir variable de session

		$this->session->unset_userdata('authcode');

		// enviando correo

		// $link_activa=base_url('index.php/sys_consultas/Sign_in/activeCta/'.base64_encode($data['usr'].'/'.$codigo));
        //       $msg = "<html><head><title>Activación de usuario</title></head><body><p>Bienvenido a Tuyo.com</p><br> Hola ".$row->nombres."<br><span>Queremos darte la bienvenida a tuyo.com, para activar tu cuenta da un click </span><a target='_blank' href='".$link_activa."'>Aqui</a></body></html>";

		// $datamail = ['mail' =>escstr($data['ema']),'subjet'=>'Activación de cuenta usuario','msg'=>$msg,'from'='<no-responder@tuyo.com>' ];
		// $this->sendmail->send($datamail);


		endTr();
		die('1'.chr(9).'Registro exitoso, active su cuenta.');
		
	}    
}

/* End of file Signup_model.php */
/* Location: ./application/models/sign_model/Signup_model.php */