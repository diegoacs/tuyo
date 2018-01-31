<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','security','verphp','paginate','dates','querymysql','captcha','string'));
        $this->load->library(array('session','form_validation','css_js','sendmail','encryptpass'));
        $this->load->model('sign_model/Signup_model','signup_model');

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

        $info['info']['entrada']=urldecode($data->entrada);
        $info['info']['desde']=urldecode($data->desde);
        $info['info']['hasta']=urldecode($data->hasta);
        $info['info']['caract']=urldecode($data->caract);
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
		    array('field' => 'lat','label' => 'latitud','rules' => 'required|trim|decimal|xss_clean'),
		    array('field' => 'long','label' => 'longitud','rules' => 'required|trim|decimal|xss_clean'),
		    array('field' => 'entrada','label' => 'check-in','rules' => 'required|trim|min_length[5]|max_length[8]|xss_clean'),
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

				'caracteristicas' =>
			form_dropdown('caracteristicas', $caract['data'],$caract['default'],array('id'=>'caracteristicas','class'=>'form-control','multiple'=>'multiple','size'=>'15')),

				'tipo_establecimiento' =>
			form_dropdown('tipo_establecimiento', $establecimiento['data'],$establecimiento['default'],array('id'=>'tipo_establecimiento','class'=>'form-control'))

		 ];

		$this->load->view('signup/form_places',$data,false);
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

			die('2'.chr(9).'Error: validando codigo.');

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

}

/* End of file Signup.php */
/* Location: ./application/controllers/Signup.php */



?>