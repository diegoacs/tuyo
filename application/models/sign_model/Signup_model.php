<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup_model extends CI_Model {

	
    function __construct(){
	    parent::__construct();
    	$this->load->database();
    }

    function enter_site($data)
    {

        $user = $data[0];
        $pass = $data[1];

        $sql="select authcode from entidad_auth_users where usuario='".escstr($user)."'";
        if(nRows($sql)<1){
            redirect(base_url().'index.php/Signup/','refresh');
        }
        $gen = oneRow($sql);
        $pss = $gen->authcode;

        if (crypt(escstr($pass), $pss) == $pss){

            $sql="select nombres,email,activo,perfil from users_entidad_public where email='".escstr($user)."'";

            if(nRows($sql)<1){

                return false;
                die();
            }

            return oneRow($sql);
            die();

        }
        else {

            return false;
            die();
        }

    }

    function pais()
    {
    	$sql="select id_pais,nom_pais from pais order by id_pais asc";
    	$gen = getQuery($sql);

    	$rta=array('default'=>'','data' =>array());

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

    	$rta=array('default'=>'','data' =>array());

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

    	$rta=array('default'=>'','data' =>array());

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

    	$rta=array('default'=>'','data' =>array());

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

    	$rta=array('default'=>'','data' =>array());

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

    	$rta=array('default'=>'','data' =>array());

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

    	$rta=array('default'=>'','data' =>array());

    	$n=0;
    	foreach ($gen as $row) {

    		if($n==0) $rta['default']=$row['id_caracter'];

    		$rta['data'][$row['id_caracter']]=$row['descripcion'];

    		$n++;
    		
    	}

    	return $rta;    	

    }


    function adicionales()
    {

        $sql="select id_adicional,nombre from adicionales ".
        "order by id_adicional asc";
        $gen = getQuery($sql);

        $rta=array('default'=>'','data' =>array());

        $n=0;
        foreach ($gen as $row) {

            if($n==0) $rta['default']=$row['id_adicional'];

            $rta['data'][$row['id_adicional']]=$row['nombre'];

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

            // enviando correo

            $msg = "<!DOCTYPE html><html><head><title></title></head>".
            "<body style='font-family: arial;'><h2 style='color: #8a3ab9;'>Bienvenido a tuyo.com</h2>".
            "<p>Hola ".$usr."</p><p>Queremos darte la bienvenida a nuestro sitio</p>".
            "<p>Usa tu usuario: <b>".$usr."</b></p><p>Usa tu contraseña: <b>".$pass."</b></p>".
            "<p>Asi podras ingresar a tu cuenta</p></body></html>";

            $datamail = ['mail' =>escstr($usr),'subject'=>'Envio de contraseña para acceso','msg'=>$msg,'from'=>'<no-responder@tuyo.com>' ];
            $this->sendmail->send($datamail);

    		//envio password a usuario
    		endTr();
    		return '1';

    	}
    	else{

    		endTr();
    		return '2';
    	}

    }

    function verifycodeplaces($code)
    {

        iniTr();
        $sql="select usuario from codes_entidad_public where code_verifica='".escstr($code)."' ".
        " and activo='N'";
        if(nRows($sql)>0){

            $gen = oneRow($sql);
            $usr = $gen->usuario;

            $sql="select id_user from users_entidad_public where email='".escstr($usr)."'";
            $gn = oneRow($sql);
            $ref = $gn->id_user;

            $pass = random_code(8);

            $encrypted = $this->encryptpass->generate_pass(array('password'=>$pass , 'key' => '$2y$10$'));

            $sql="insert into entidad_auth_users (usuario,authcode,id_reference) values ".
            "('".escstr($usr)."','".$encrypted."',".$ref.")";
            if(!exeQuery($sql)){
                
                rollTr();
                return '2';
            }

            $sql="update codes_entidad_public set activo='S' where usuario='".escstr($usr)."' and activo='N' and code_verifica='".escstr($code)."'";
            if(!exeQuery($sql)){
                
                rollTr();
                return '2';
            }

            $sql="update users_entidad_public set activo='S' where email='".escstr($usr)."'";
            if(!exeQuery($sql)){
                
                rollTr();
                return '2';
            }

            // aca va lo del correo

            // enviando correo

            ver_php($pass);

            // $msg = "<!DOCTYPE html><html><head><title></title></head>".
            // "<body style='font-family: arial;'><h2 style='color: #8a3ab9;'>Bienvenido a tuyo.com</h2>".
            // "<p>Hola ".$usr."</p><p>Queremos darte la bienvenida a nuestro sitio</p>".
            // "<p>Usa tu usuario: <b>".$usr."</b></p><p>Usa tu contraseña: <b>".$pass."</b></p>".
            // "<p>Asi podras ingresar a tu cuenta</p></body></html>";

            //  $datamail = ['mail' =>escstr($usr),'subject'=>'Activación de cuenta usuario','msg'=>$msg,'from'=>'<no-responder@tuyo.com>' ];
            // $this->sendmail->send($datamail);

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
		
		$codigo =random_code(6);
		$sql="insert into codes_public (usuario,code_verifica) values ".
		"('".escstr($data['ema'])."','".escstr($codigo)."')";

		if(!exeQuery($sql)){

			rollTr();
			die('2'.chr(9).'Error: registrando usuario.');
		}

		//destruir variable de session

		$this->session->unset_userdata('authcode');

		// enviando correo

		$link_activa=base_url('index.php/Signup/verifyactivation/'.$codigo);

        $msg = "<!DOCTYPE html><html><head><title></title></head>".
        "<body style='font-family: arial;'><h2 style='color: #8a3ab9;'>Bienvenido a tuyo.com</h2>".
        "<p>Hola ".escstr($data['nom'])." ".escstr($data['ape'])."</p><p>Queremos darte la bienvenida a nuestro sitio</p>".
        "<p>Queremos darte la bienvenida a nuestro sitio, para activar tu cuenta haz click <a target='_blank' href='".$link_activa."'>aqui</a></p>".
        "<p>Asi podras ingresar a tu cuenta</p></body></html>";

        // $msg = "<html><head><title>Activación de usuario</title></head><body><p>Bienvenido a Tuyo.com</p><br> Hola ".escstr($data['nom'])." ".escstr($data['ape'])."<br><span>Queremos darte la bienvenida a tuyo.com, para activar tu cuenta da un click </span><a target='_blank' href='".$link_activa."'>Aqui</a></body></html>";

		$datamail = ['mail' =>escstr($data['ema']),'subject'=>'Activación de cuenta usuario','msg'=>$msg,'from'=>'<no-responder@tuyo.com>' ];
		$this->sendmail->send($datamail);


		endTr();
		die('1'.chr(9).'Registro exitoso, active su cuenta.');
		
	}    

    function savenewplace($data)
    {

        iniTr();
        //registrando usuario en base 
        $sql="select email from users_entidad_public where email='".escstr($data['info']['mail'])."'";

        if(nRows($sql)>0){

            rollTr();
            die('2'.chr(9).'Usuario con este correo ya se encuentra registrado.');

        }

        $sql="insert into users_entidad_public (nombres,email) values ".
        "('".escstr($data['info']['nombre'])."','".escstr($data['info']['mail'])."')";

        if(!exeQuery($sql)){

            rollTr();
            die('2'.chr(9).'Error: registrando usuario.');
        }

        //generar activacion
        
        $codigo = random_code(6);
        
        $sql="insert into codes_entidad_public (usuario,code_verifica) values ".
        "('".escstr($data['info']['mail'])."','".escstr($codigo)."')";

        if(!exeQuery($sql)){

            rollTr();
            die('2'.chr(9).'Error: registrando usuario.');
        }


        //crear entidad 

        $sql="select max(id_entidad+0) as id from entidad ";
        $gen=oneRow($sql);
        $identi=$gen->id+1;

        $sql="insert into entidad (id_entidad,nom_entidad,tel_entidad,dir_entidad,".
        "email_entidad,id_muni,longitud,latitud,tipo,postal) values ".

        "('".escstr(str_pad($identi,3,'0',STR_PAD_LEFT))."','".escstr($data['info']['entidad']).
        "','".escstr($data['info']['telefono'])."','".escstr($data['info']['direccion']).
        "','".escstr($data['info']['mailentidad'])."',".escstr($data['info']['ciudad']).
        ",".escstr($data['info']['long']).",".escstr($data['info']['lat']).
        ",'H','".escstr($data['info']['postal'])."')";

        if(!exeQuery($sql)){

            rollTr();
            die('2'.chr(9).'Error: registrando entidad.');
        }


        $id=lastid();

        $sql = "select id_entidad from entidad where codigo=".$id;
        $gen = oneRow($sql);
        $identi = str_pad($gen->id_entidad,3,'0',STR_PAD_LEFT);  

        //crear calendario

        $sql="select max(id_calendario+0) as id from calendario ";
        $gen=oneRow($sql);
        $calendario=$gen->id+1;

        $sql="insert into calendario (id_calendario,nom_calendario,".
        "id_entidad,usr_cal,fch_cal,hrs_cal) ".
        "values ('".escstr(str_pad($calendario,3,'0',STR_PAD_LEFT))."','".escstr($data['info']['entidad'])."'".
        ",'".escstr($identi)."','VIAWEB','".date('Ymd')."','".date('H:i:s')."')";

        if(!exeQuery($sql)){

            rollTr();
            die('2'.chr(9).'Error: registrando calendario.');
        }

        // configurar habitaciones

        for($u=0; $u<count($data['habitaciones']['unidad']); $u++){

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



        //configurar adicionales

        $caract=explode(',',$data['info']['caract']);

        $vals=array();

        foreach ($caract as $val) {

            $vals[] = "(".escstr($val).",'".escstr($identi)."')";
 
        }

        $sql="insert into carac_entidad (id_caracter,id_entidad) values ".implode(',', $vals);

        if(!exeQuery($sql)){

            rollTr();
            die('2'.chr(9).'Error: registrando caracteristicas.');
        }
        
        // configurar caracteristicas

        $caract=explode(',',$data['info']['adicionales']);

        $vals=array();

        foreach ($caract as $val) {

            $vals[] = "(".escstr($val).",'".escstr($identi)."')";
 
        }

        $sql="insert into adicionales_entidad (id_adicional,id_entidad) values ".implode(',', $vals);

        if(!exeQuery($sql)){

            rollTr();
            die('2'.chr(9).'Error: registrando adicionales.');
        }


        // configurar estb

        $caract=explode(',',$data['info']['estb']);

        $vals=array();

        foreach ($caract as $val) {

            $vals[] = "(".escstr($val).",'".escstr($identi)."')";
 
        }

        $sql="insert into establecimientos_entidad (id_establecimiento,id_entidad) values ".implode(',', $vals);

        if(!exeQuery($sql)){

            rollTr();
            die('2'.chr(9).'Error: registrando tipos establecimientos.');
        }

        
        // configurar cobro

        $categoria = array_unique($data['habitaciones']['categoria']);

        $vals=array();

        foreach ($categoria as $val) {
            
            $vals[] = "('".escstr(str_pad($calendario,3,'0',STR_PAD_LEFT))."',".escstr($val).",'C',".
            "'".escstr($data['info']['desde'])."','".escstr($data['info']['hasta'])."','1','".escstr($data['info']['entrada'])."','".escstr($data['info']['salida'])."')";

        }

        $sql = "insert into tipo_cobro (id_calendario,id_categoria,".
        "tipo_cobro,hora,hrs_despues,hrs_min,checkin_inicio,checkin_fin) values ".implode(',',$vals);

        if(!exeQuery($sql)){

            rollTr();
            die('2'.chr(9).'Error: registrando cobro.');
        }       



        // asociar entidad a usuario

        $sql="insert into entidades_usuario (usuario,id_entidad) values ".
        "('".escstr($data['info']['mail'])."','".escstr($identi)."')";

        if(!exeQuery($sql)){

            rollTr();
            die('2'.chr(9).'Error: asociando entidades.');
        } 

        

        //destruir variable de session

        // $this->session->unset_userdata('authcode');

        // enviando correo

        ver_php($codigo);


       //  $link_activa=base_url('index.php/Signup/placesactivation/'.$codigo);
       // $msg = "<html><head><title>Activación de entidad y usuario</title></head><body><p>Bienvenido a Tuyo.com</p><br> Hola ".$data['info']['nombre']."<br><span>Queremos darte la bienvenida a tuyo.com, para activar tu cuenta da un click </span><a target='_blank' href='".$link_activa."'>Aqui</a></body></html>";

        $msg = "<!DOCTYPE html><html><head><title></title></head>".
        "<body style='font-family: arial;'><h2 style='color: #8a3ab9;'>Bienvenido a tuyo.com</h2>".
        "<p>Hola ".$data['info']['nombre']."</p><p>Queremos darte la bienvenida a nuestro sitio</p>".
        "<p>Queremos darte la bienvenida a nuestro sitio, para activar tu cuenta haz click <a target='_blank' href='".$link_activa."'>aqui</a></p>".
        "<p>Asi podras ingresar a tu cuenta</p></body></html>";

       //  $datamail = ['mail' =>escstr($data['info']['mail']),'subject'=>'Activación de cuenta usuario','msg'=>$msg,'from'=>'<no-responder@tuyo.com>' ];
       //  $this->sendmail->send($datamail);


        //

        endTr();
        die('1'.chr(9).'Registro exitoso, active su cuenta.');
        
    } 


    function addnewplace($data)
    {

        iniTr();


        if(!$this->session->has_userdata('user')){

            endTr();
            die('2'.chr(9).'No existe usuario en session.');

        }


        //crear entidad 

        $sql="select max(id_entidad+0) as id from entidad ";
        $gen=oneRow($sql);
        $identi=$gen->id+1;

        $sql="insert into entidad (id_entidad,nom_entidad,tel_entidad,dir_entidad,".
        "email_entidad,id_muni,longitud,latitud,tipo,postal) values ".

        "('".escstr(str_pad($identi,3,'0',STR_PAD_LEFT))."','".escstr($data['info']['entidad']).
        "','".escstr($data['info']['telefono'])."','".escstr($data['info']['direccion']).
        "','".escstr($data['info']['mailentidad'])."',".escstr($data['info']['ciudad']).
        ",".escstr($data['info']['long']).",".escstr($data['info']['lat']).
        ",'H','".escstr($data['info']['postal'])."')";

        if(!exeQuery($sql)){

            rollTr();
            die('2'.chr(9).'Error: registrando entidad.');
        }


        $id=lastid();

        $sql = "select id_entidad from entidad where codigo=".$id;
        $gen = oneRow($sql);
        $identi = str_pad($gen->id_entidad,3,'0',STR_PAD_LEFT);  

        //crear calendario

        $sql="select max(id_calendario+0) as id from calendario ";
        $gen=oneRow($sql);
        $calendario=$gen->id+1;

        $sql="insert into calendario (id_calendario,nom_calendario,".
        "id_entidad,usr_cal,fch_cal,hrs_cal) ".
        "values ('".escstr(str_pad($calendario,3,'0',STR_PAD_LEFT))."','".escstr($data['info']['entidad'])."'".
        ",'".escstr($identi)."','VIAWEB','".date('Ymd')."','".date('H:i:s')."')";

        if(!exeQuery($sql)){

            rollTr();
            die('2'.chr(9).'Error: registrando calendario.');
        }

        // configurar habitaciones

        for($u=0; $u<count($data['habitaciones']['unidad']); $u++){

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



        //configurar adicionales

        $caract=explode(',',$data['info']['caract']);

        $vals=array();

        foreach ($caract as $val) {

            $vals[] = "(".escstr($val).",'".escstr($identi)."')";
 
        }

        $sql="insert into carac_entidad (id_caracter,id_entidad) values ".implode(',', $vals);

        if(!exeQuery($sql)){

            rollTr();
            die('2'.chr(9).'Error: registrando caracteristicas.');
        }
        
        // configurar caracteristicas

        $caract=explode(',',$data['info']['adicionales']);

        $vals=array();

        foreach ($caract as $val) {

            $vals[] = "(".escstr($val).",'".escstr($identi)."')";
 
        }

        $sql="insert into adicionales_entidad (id_adicional,id_entidad) values ".implode(',', $vals);

        if(!exeQuery($sql)){

            rollTr();
            die('2'.chr(9).'Error: registrando adicionales.');
        }


        // configurar estb

        $caract=explode(',',$data['info']['estb']);

        $vals=array();

        foreach ($caract as $val) {

            $vals[] = "(".escstr($val).",'".escstr($identi)."')";
 
        }

        $sql="insert into establecimientos_entidad (id_establecimiento,id_entidad) values ".implode(',', $vals);

        if(!exeQuery($sql)){

            rollTr();
            die('2'.chr(9).'Error: registrando tipos establecimientos.');
        }

        
        // configurar cobro

        $categoria = array_unique($data['habitaciones']['categoria']);

        $vals=array();

        foreach ($categoria as $val) {
            
            $vals[] = "('".escstr(str_pad($calendario,3,'0',STR_PAD_LEFT))."',".escstr($val).",'C',".
            "'".escstr($data['info']['desde'])."','".escstr($data['info']['hasta'])."','1','".escstr($data['info']['entrada'])."','".escstr($data['info']['salida'])."')";

        }

        $sql = "insert into tipo_cobro (id_calendario,id_categoria,".
        "tipo_cobro,hora,hrs_despues,hrs_min,checkin_inicio,checkin_fin) values ".implode(',',$vals);

        if(!exeQuery($sql)){

            rollTr();
            die('2'.chr(9).'Error: registrando cobro.');
        }       



        // asociar entidad a usuario

        $sql="insert into entidades_usuario (usuario,id_entidad) values ".
        "('".escstr($this->session->user)."','".escstr($identi)."')";

        if(!exeQuery($sql)){

            rollTr();
            die('2'.chr(9).'Error: asociando entidades.');
        } 

        

        //destruir variable de session

        // $this->session->unset_userdata('authcode');

        // enviando correo

        // ver_php($codigo);

       //  $link_activa=base_url('index.php/Signup/placesactivation/'.$codigo);
       // $msg = "<html><head><title>Activación de entidad y usuario</title></head><body><p>Bienvenido a Tuyo.com</p><br> Hola ".$data['info']['nombre']."<br><span>Queremos darte la bienvenida a tuyo.com, para activar tu cuenta da un click </span><a target='_blank' href='".$link_activa."'>Aqui</a></body></html>";

        $msg = "<!DOCTYPE html><html><head><title></title></head>".
        "<body style='font-family: arial;'><h2 style='color: #8a3ab9;'>Bienvenido a tuyo.com</h2>".
        "<p>Hola ".$data['info']['nombre']."</p><p>Queremos darte la bienvenida a nuestro sitio</p>".
        "<p>Queremos darte la bienvenida a nuestro sitio, para activar tu cuenta haz click <a target='_blank' href='".$link_activa."'>aqui</a></p>".
        "<p>Asi podras ingresar a tu cuenta</p></body></html>";


       //  $datamail = ['mail' =>escstr($data['info']['mail']),'subject'=>'Activación de cuenta usuario','msg'=>$msg,'from'=>'<no-responder@tuyo.com>' ];
       //  $this->sendmail->send($datamail);


        //

        endTr();
        die('1'.chr(9).'Registro exitoso, establecimiento creado.');
        
    } 


}

/* End of file Signup_model.php */
/* Location: ./application/models/sign_model/Signup_model.php */