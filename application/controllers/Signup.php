<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','security','verphp','paginate','dates','querymysql','captcha','string'));
        $this->load->library(array('session','form_validation','css_js','sendmail','encryptpass'));
        $this->load->model('sign_model/Signup_model','signup_model');
        $this->load->model('places_model/Places_model','places_model');

	}


	public function log_out()
	{
		$this->session->sess_destroy();
		redirect(base_url().'index.php/Signup','refresh');	

	}

	public function getPositions()
	{

		echo $this->places_model->getPositions(array(

			$this->input->get('country'),
			$this->input->get('state'),
			$this->input->get('city'),
			$this->input->get('stat')

		));

	}



	public function enterapp()
	{

		$this->form_validation->set_rules('enter_form', 'usuario', 'trim|required|xss_clean|min_length[2]|valid_email|max_length[60]');
		$this->form_validation->set_rules('pass_form', 'password', 'trim|required|xss_clean|min_length[5]|max_length[60]');

        if($this->form_validation->run() == FALSE) {


	        $this->load->view('head','',false);
			$this->load->view('signup/mainregister','',false);
	        $js=$this->css_js->js(array('rute'=>'public/userlog.js?n='.rand()));
	        $this->load->view('footer_gris', array('js'=>$js), FALSE); 

        }

        else{
        	
	        $rta = $this->signup_model->enter_site(array(
	        								$this->input->post('enter_form'),
	        								$this->input->post('pass_form')));

	        if(!$rta){

	        	$this->session->set_flashdata('error_usr','Error en acceso, verifique si su contraseña es correcta o si su usuario esta habilitado.');
	        	$this->load->view('head','',false);
				$this->load->view('signup/mainregister','',false);
		        $js=$this->css_js->js(array('rute'=>'public/userlog.js?n='.rand()));
		        $this->load->view('footer_gris', array('js'=>$js), FALSE); 

	        }
	        else{


	        	$this->session->set_userdata(array(

	        		'nombres' => $rta->nombres,
	        		'user' => $rta->email,
	        		'active' => $rta->activo
	        	));

	        	redirect(base_url().'index.php/Signup/enter_panel','refresh');
	        }

        }

	}


	public function enter_panel($sel_entidad=null)
	{

		if($this->session->has_userdata('user')){

			if($this->session->active == 'N') {
			
				$this->session->unset_userdata(array(
									'nombres','user','active'
										));
				$this->session->set_flashdata('error_usr','Error en acceso, su usuario no esta habilitado.');
				$this->index();
			}
			else {

		    	$this->load->view('head','',false);
		    	$this->load->view('signup/maps');

				//seccion geografica

		    	$entidades = $this->places_model->entidades($this->session->user);

				if(trim($sel_entidad)){

					$getnombre=$this->places_model->nombre_entidad(array($sel_entidad));

					if($getnombre){

						$entidades['nombre'] = $getnombre->nom_entidad;
						$entidades['entidad'] = $sel_entidad;
					}


				}

				$this->session->set_userdata('actual',$entidades['entidad']);

		    	$info = $this->places_model->generaldata($entidades['entidad']);

		    	$lugar = $this->places_model->getlugar($info->id_muni);


				$pais=$this->signup_model->pais();
				$departamento=$this->signup_model->departamento($lugar->id_pais);
				$ciudad=$this->signup_model->ciudad($lugar->id_dept);
				$establecimiento=$this->signup_model->establecimientos();


				$data = [

					'default' => array($entidades['entidad'],$entidades['nombre']),

					'entidades' => $entidades['data'],

					'pais' =>

					form_dropdown('pais', $pais['data'],$lugar->id_pais,array('id'=>'pais','class'=>'form-control')),

						'departamento' =>
					form_dropdown('departamento', $departamento['data'],$lugar->id_dept,array('id'=>'departamento','class'=>'form-control')),

						'ciudad' =>
					form_dropdown('ciudad', $ciudad['data'],$lugar->id_muni,array('id'=>'ciudad','class'=>'form-control')),

						'tipo_establecimiento' =>
					form_dropdown('tipo_establecimiento', $establecimiento['data'],$establecimiento['default'],array('id'=>'tipo_establecimiento','class'=>'form-control')),

						'rta' => 
					array($info->nom_entidad,$info->tel_entidad,$info->email_entidad,$info->dir_entidad,$info->geo,$info->postal)

				 ];

		    	$datos_form = $this->load->view('signup/data_place',$data,true);
				$this->load->view('general/panel_admin',array('datos_form' => $datos_form, 'tipo' => '1'));
		        $js=$this->css_js->js(array('rute'=>'public/place.js?n='.rand()));
		        $this->load->view('footer_gris', array('js'=>$js), FALSE); 

			}

		}
		else $this->index();

	}


	public function savenewplace(){


		//decodifica json

        $data = json_decode($this->input->post('data'));

        $info=array('info'=>array(),
        			'habitaciones' => array()
        		);
        
        // datos unicos

        $info['info']['nombre']=urldecode($data->nombre);
        $info['info']['mail']=urldecode($data->mail);

        $info['info']['entidad']=urldecode($data->entidad);
        $info['info']['tipo']=urldecode($data->tipo);
        $info['info']['telefono']=urldecode($data->telefono);
        $info['info']['mailentidad']=urldecode($data->mailentidad);
        $info['info']['direccion']=urldecode($data->direccion);        
        $info['info']['ciudad']=urldecode($data->ciudad);
        $info['info']['lat']=floatval($data->lat);
        $info['info']['long']=floatval($data->long);
        $info['info']['postal']=urldecode($data->postal);

        $info['info']['entrada']=urldecode($data->entrada);
        $info['info']['salida']=urldecode($data->salida);
        $info['info']['desde']=urldecode($data->desde);
        $info['info']['hasta']=urldecode($data->hasta);
        
        $info['info']['caract']=urldecode(trim($data->caract,','));
        $info['info']['adicionales']=urldecode(trim($data->add,','));


        if(strtotime($info['info']['desde'])>strtotime($info['info']['hasta'])){

        	die('2'.chr(9)."<p class='text-danger'><span class='fa fa-exclamation-triangle'></span>&nbsp;Revise las horas de check-out.</p>");
        }

        // enviar datos a validacion
        $this->form_validation->set_data($info['info']);

		$config = array(

		    array('field' => 'nombre','label' => 'nombre de usuario','rules' => 'required|trim|min_length[2]|max_length[60]|xss_clean'),
		    array('field' => 'mail','label' => 'correo de usuario','rules' => 'required|trim|min_length[2]|max_length[60]|valid_email|xss_clean'),
		    array('field' => 'entidad','label' => 'nombre de entidad','rules' => 'required|trim|min_length[2]|max_length[60]|xss_clean'),
		    array('field' => 'tipo','label' => 'tipo de entidad','rules' => 'required|trim|xss_clean'),
		    array('field' => 'telefono','label' => 'telefono de entidad','rules' => 'required|trim|min_length[2]|max_length[15]|xss_clean'),
		    array('field' => 'mailentidad','label' => 'correo de entidad','rules' => 'required|trim|min_length[2]|max_length[60]|valid_email|xss_clean'),
		    array('field' => 'ciudad','label' => 'ciudad','rules' => 'required|trim|xss_clean'),
		    array('field' => 'postal','label' => 'codigo postal','rules' => 'max_length[10]|xss_clean'),
		    array('field' => 'lat','label' => 'latitud','rules' => 'required|trim|decimal|xss_clean'),
		    array('field' => 'long','label' => 'longitud','rules' => 'required|trim|decimal|xss_clean'),
		    array('field' => 'entrada','label' => 'check-in desde','rules' => 'required|trim|min_length[5]|max_length[8]|xss_clean'),
		    array('field' => 'salida','label' => 'check-in hasta','rules' => 'required|trim|min_length[5]|max_length[8]|xss_clean'),
		    array('field' => 'desde','label' => 'check-out desde','rules' => 'required|trim|min_length[5]|max_length[8]|xss_clean'),
		    array('field' => 'hasta','label' => 'check-out hasta','rules' => 'required|trim|min_length[5]|max_length[8]|xss_clean'),
		    array('field' => 'caract','label' => 'caracteristicas','rules' => 'required|trim|min_length[1]|max_length[60]|xss_clean'),
		    array('field' => 'adicionales','label' => 'servicios adicionales','rules' => 'required|trim|min_length[1]|max_length[200]|xss_clean'),
		    array('field' => 'direccion','label' => 'direccion de entidad','rules' => 'required|trim|min_length[1]|max_length[60]|xss_clean')

		);

		$this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE) {

            die('2'.chr(9).validation_errors("<p class='text-danger'><span class='fa fa-exclamation-triangle'></span>&nbsp;",'</p>'));

        }

        $habitaciones=$data->datos;
        
        $cantidad=array();
        $categoria=array();
        $unidad=array();
        $personas=array();
        $precio=array();
		$nombre=array();

        foreach ($habitaciones as $value) {

            $cantidad[]=$value->cantidad;
            $categoria[]=$value->categoria;
            $unidad[]=$value->unidad;
            $personas[]=$value->personas;
            $precio[]=$value->precio;
            $nombre[]=urldecode($value->nombre);

        }

        if(empty($cantidad)){

        	die('2'.chr(9)."<p class='text-danger'><span class='fa fa-exclamation-triangle'></span>&nbsp;Debe ingresar al menos una habitación.</p>");
        }

        $info['habitaciones']['cantidad']=$cantidad;
        $info['habitaciones']['categoria']=$categoria;
        $info['habitaciones']['unidad']=$unidad;
        $info['habitaciones']['personas']=$personas;
        $info['habitaciones']['precio']=$precio;
        $info['habitaciones']['nombre']=$nombre;

      	$rta = $this->signup_model->savenewplace($info);
        
        echo $rta;


	}

	public function index()
	{

		$this->load->view('head','',false);
		$this->load->view('signup/mainregister','',false);
        $js=$this->css_js->js(array('rute'=>'public/userlog.js?n='.rand()));
        $this->load->view('footer_gris', array('js'=>$js), FALSE); 

	}

	public function mainregister()
	{

		$this->load->view('head','',false);
		$this->load->view('signup/mainregister','',false);
        $js=$this->css_js->js(array('rute'=>'public/userlog.js?n='.rand()));
        $this->load->view('footer_gris', array('js'=>$js), FALSE); 

	}

	public function users()
	{

		$this->load->view('head','',false);


		//seccion geografica
		$pais=$this->signup_model->pais();
		$departamento=$this->signup_model->departamento($pais['default']);
		$ciudad=$this->signup_model->ciudad($departamento['default']);

		$data = ['pais' =>

			form_dropdown('pais', $pais['data'],$pais['default'],array('id'=>'pais','class'=>'form-control')),

				'departamento' =>
			form_dropdown('departamento', $departamento['data'],$departamento['default'],array('id'=>'departamento','class'=>'form-control')),

				'ciudad' =>
			form_dropdown('ciudad', $ciudad['data'],$ciudad['default'],array('id'=>'ciudad','class'=>'form-control')),
			
				'captcha' => $this->newcaptcha()

		 ];

		//pasamos a la vista el título y el captcha que hemos creado
		$this->load->view('signup/form_sign',$data,false);
        $js=$this->css_js->js(array('rute'=>'public/userlog.js?n='.rand()));
        $this->load->view('footer_gris', array('js'=>$js), FALSE); 

	}


	function changepais(){

		$rta=$this->signup_model->departamento($this->input->post('id'));

		$html='';
		foreach ($rta['data'] as $key => $value) {

			$html.="<option value='".$key."'>".$value."</option>";
			
		}

		echo '1'.chr(9).$html;

	}


	function changedept(){

		$rta=$this->signup_model->ciudad($this->input->post('id'));

		$html='';
		foreach ($rta['data'] as $key => $value) {

			$html.="<option value='".$key."'>".$value."</option>";
			
		}

		echo '1'.chr(9).$html;

	}

	function changeund(){

		$rta=$this->signup_model->unidad($this->input->post('id'));

		$html='';
		foreach ($rta['data'] as $key => $value) {

			$html.="<option value='".$key."'>".$value."</option>";
			
		}

		echo '1'.chr(9).$html;

	}

	public function places()
	{

		$this->load->view('head','',false);
		$this->load->view('signup/maps');

		//seccion geografica
		$pais=$this->signup_model->pais();
		$departamento=$this->signup_model->departamento($pais['default']);
		$ciudad=$this->signup_model->ciudad($departamento['default']);

		//seccion hotel
		$categoria=$this->signup_model->categoria();
		$unidad=$this->signup_model->unidad($categoria['default']);
		$caract=$this->signup_model->caracteristicas();
		$adicion=$this->signup_model->adicionales();

		$n=1;

		$text=''; $close='N';
		foreach ($caract['data'] as $key => $value) {

			if($n<2){

				$text.="<div class='row'><div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>".
				form_checkbox(array('class'=>'caracter',
					'value'=>$key,
					'checked'=>false)).'&nbsp;'.
					$value.		
				"</div>";
				$close='N';
				$n++;

			}
			else{

				$text.="<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>".
				form_checkbox(array('class'=>'caracter',
					'value'=>$key,
					'checked'=>false)).'&nbsp;'.
					$value.		
				"</div>";

				if($n==4){

					$n=1;
					$text.="</div>";
					$close='S';
				}
				else $n++;

			}
			
		}

		if($close=='N') $text.="</div>";


		$n=1;

		$add=''; $close='N';
		foreach ($adicion['data'] as $key => $value) {

			if($n<2){

				$add.="<div class='row'><div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>".
				form_checkbox(array('class'=>'adicional',
					'value'=>$key,
					'checked'=>false)).'&nbsp;'.
					$value.		
				"</div>";
				$close='N';
				$n++;

			}
			else{

				$add.="<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>".
				form_checkbox(array('class'=>'adicional',
					'value'=>$key,
					'checked'=>false)).'&nbsp;'.
					$value.		
				"</div>";

				if($n==4){

					$n=1;
					$add.="</div>";
					$close='S';
				}
				else $n++;

			}
			
		}

		if($close=='N') $add.="</div>";



		$establecimiento=$this->signup_model->establecimientos();

		$data = ['pais' =>

			form_dropdown('pais', $pais['data'],$pais['default'],array('id'=>'pais','class'=>'form-control')),

				'departamento' =>
			form_dropdown('departamento', $departamento['data'],$departamento['default'],array('id'=>'departamento','class'=>'form-control')),

				'ciudad' =>
			form_dropdown('ciudad', $ciudad['data'],$ciudad['default'],array('id'=>'ciudad','class'=>'form-control')),

				'categoria' =>
			form_dropdown('categoria', $categoria['data'],$categoria['default'],array('id'=>'categoria','class'=>'form-control')),

				'unidad' =>
			form_dropdown('unidad', $unidad['data'],$unidad['default'],array('id'=>'unidad','class'=>'form-control')),

				'caracteristicas' => $text,

				'adicionales' => $add,

				'tipo_establecimiento' =>
			form_dropdown('tipo_establecimiento', $establecimiento['data'],$establecimiento['default'],array('id'=>'tipo_establecimiento','class'=>'form-control')),

				'rta' => array('','','','','','','','','','')

		 ];


		$data_form = $this->load->view('signup/data_place',$data,true);
		$unidades_form = $this->load->view('signup/data_unidades',$data,true);
		$caract_form = $this->load->view('signup/data_caracteristicas',$data,true);

		$this->load->view('signup/form_places',array('data_form' => $data_form,'unidades_form' => $unidades_form,'caract_form' => $caract_form));
        $js=$this->css_js->js(array('rute'=>'public/placeslog.js?n='.rand()));
        $this->load->view('footer_gris', array('js'=>$js), FALSE); 

	}

	public function newcaptcha()
	{

		$vals = array(
			'word' => random_string('alnum',5),
	        'img_path'      => './captcha/',
	        'img_url'       => base_url().'captcha/',
	        'img_width' => '180',
	        'img_height' => '50',
	        'font_size' => 18,

	        'colors'        => array(
	            'background' => array(255, 255, 255),
	            'border' => array(255, 255, 255),
	            'text' => array(0, 0, 0),
	            'grid' => array(255, 40, 40)
			)
        );

		
		//guardamos la info del captcha en $cap
		$cap = create_captcha($vals);

		//pasamos la info del captcha al modelo para 
		//insertarlo en la base de datos
		$this->signup_model->save_captcha($cap);

		$this->session->set_userdata('authcode',$cap['word']);

		//devolvemos el captcha para utilizarlo en la vista
		return $cap;
	}

	public function registerUsr()
	{

	    $this->form_validation->set_rules('nombres', 'nombres', 'required|trim|min_length[2]|max_length[60]|xss_clean');
	    $this->form_validation->set_rules('apellidos', 'apellidos', 'required|trim|min_length[2]|max_length[60]|xss_clean');
	    $this->form_validation->set_rules('direccion', 'direccion', 'max_length[35]|xss_clean');
	    $this->form_validation->set_rules('telefono', 'telefono', 'max_length[15]|xss_clean');
	    $this->form_validation->set_rules('codigo', 'codigo', 'required|trim|min_length[2]|max_length[5]|xss_clean');
	    $this->form_validation->set_rules('fecha', 'fecha', 'required|trim|max_length[10]|xss_clean');
	    $this->form_validation->set_rules('email', 'email', 'required|trim|min_length[2]|max_length[60]|xss_clean');

        //lanzamos mensajes de error si es que los hay
        if($this->form_validation->run() == FALSE) {

            die('2'.chr(9).'Verifique los datos en su formulario, datos obligatorios: Nombres, E-mail y teléfono.');

        }

        //validar captcha
       	if($this->session->authcode != $this->input->post('codigo')){

			die('2'.chr(9).'Error: validando codigo de chaptcha.');

		}


		$expiration = time()-600; // Límite de 10 minutos 
		$ip = $this->input->ip_address();//ip del usuario
		$captcha = $this->input->post('codigo');//captcha introducido por el usuario

		//eliminamos los captcha con más de 2 minutos de vida
		$elimi = $this->signup_model->remove_old_captcha($expiration);
		if($elimi=='2'){

			die('2'.chr(9).'Error: verificando codigos.');
		}

		//comprobamos si es correcta la imagen introducida
		$check = $this->signup_model->check($ip,$expiration,$captcha);
		if($check < 1){

			die('2'.chr(9).'Error: verificando codigos en sistema.');
		}


		$data=array(

			'nom' => $this->input->post('nombres'),
			'ape' => $this->input->post('apellidos'),
			'dir' => $this->input->post('direccion'),
			'tel' => $this->input->post('telefono'),
			'cod' => $this->input->post('codigo'),
			'fch' => $this->input->post('fecha'),
			'ema' => $this->input->post('email')
		);

		return $this->signup_model->registerUsr($data);

	}

	public function verifyactivation($code){


		$rta = $this->signup_model->verifycode($code);

		if($rta=='1') {
			$msg="Usuario activado, enviamos sus datos de acceso al correo electronico.";
			$type='success';
		}
		else {
			$msg="Hubo problemas con la activación de usuario, verifique si su codigo ha sido usado antes.";	
			$type='danger';
		}

		$this->load->view('head','',false);
		$this->load->view('signup/msg_theme',array('msg'=>$msg,'type'=>$type),false);
        $js=$this->css_js->js(array('rute'=>'public/userlog.js?n='.rand()));
        $this->load->view('footer_gris', array('js'=>$js), FALSE); 



	}


	public function placesactivation($code){


		$rta = $this->signup_model->verifycodeplaces($code);

		if($rta=='1') {
			$msg="Usuario activado, enviamos sus datos de acceso al correo electronico.";
			$type='success';
		}
		else {
			$msg="Hubo problemas con la activación de usuario, verifique si su codigo ha sido usado antes.";	
			$type='danger';
		}

		$this->load->view('head','',false);
		$this->load->view('signup/msg_theme',array('msg'=>$msg,'type'=>$type),false);
        $js=$this->css_js->js(array('rute'=>'public/userlog.js?n='.rand()));
        $this->load->view('footer_gris', array('js'=>$js), FALSE); 



	}

}

/* End of file Signup.php */
/* Location: ./application/controllers/Signup.php */



?>