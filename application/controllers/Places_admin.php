<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Places_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','security','verphp','paginate','dates','querymysql','captcha','string','html'));
        $this->load->library(array('session','form_validation','css_js','sendmail','encryptpass'));
        $this->load->model('sign_model/Signup_model','signup_model');
        $this->load->model('places_model/Places_model','places_model');

	}


	public function newusers()
	{



			$info=array();
	        
	        // datos unicos

	        $info['nom']=urldecode($this->input->post('user'));
	        $info['pro']=urldecode($this->input->post('profile'));



	        // enviar datos a validacion
	        $this->form_validation->set_data($info);

			$config = array(

			    array('field' => 'pro','label' => 'perfil de usuario','rules' => 'required|trim|min_length[1]|max_length[1]|xss_clean'),
			    array('field' => 'nom','label' => 'correo de usuario','rules' => 'required|trim|min_length[2]|max_length[60]|valid_email|xss_clean')

			);

			$this->form_validation->set_rules($config);

	        if($this->form_validation->run() == FALSE) {

	            die('2'.chr(9).validation_errors("<p class='text-danger'><span class='fa fa-exclamation-triangle'></span>&nbsp;",'</p>'));

	        }


	        $rta = $this->places_model->newusers($info);

	        $rta = explode(chr(9),$rta);

	        if($rta[0] == '2'){

	            die('2'.chr(9)."<p class='text-danger'><span class='fa fa-exclamation-triangle'></span>&nbsp;".$rta[1]."</p>");

	        }

	        die('1'.chr(9).'exito');

	}

	public function updateAdmin()
	{

		$ids = trim($this->input->post('ids'),',');

		if(!trim($ids)){

			die('2'.chr(9)."<p class='text-danger'><span class='fa fa-exclamation-triangle'></span>&nbsp;Debe seleccionar al menos una entidad</p>");
		}


		$info=array();
        
        // datos unicos

        $info['user']=urldecode($this->input->post('user'));
        $info['profile']=urldecode($this->input->post('profile'));
        $info['ids']=urldecode($this->input->post('ids'));



        // enviar datos a validacion
        $this->form_validation->set_data($info);

		$config = array(

		    array('field' => 'user','label' => 'Usuario','rules' => 'required|trim|xss_clean'),
		    array('field' => 'profile','label' => 'Perfil','rules' => 'required|trim|xss_clean'),
		    array('field' => 'ids','label' => 'Entidades','rules' => 'required|trim|xss_clean')

		);

		$this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE) {

            die('2'.chr(9).validation_errors("<p class='text-danger'><span class='fa fa-exclamation-triangle'></span>&nbsp;",'</p>'));

        }

        $rta = $this->places_model->updateAdmin($info);

        $rta = explode(chr(9),$rta);

        if($rta[0] == '2'){

        	die('2'.chr(9)."<p class='text-danger'><span class='fa fa-exclamation-triangle'></span>&nbsp;".$rta[1]."</p>");

        }


		die('1'.chr(9).'Actualizado.');
	}

	public function updatePass()
	{



			$info=array();
	        
	        // datos unicos

	        $info['np']=urldecode($this->input->post('np'));
	        $info['npr']=urldecode($this->input->post('npr'));
	        $info['old']=urldecode($this->input->post('old'));



	        // enviar datos a validacion
	        $this->form_validation->set_data($info);

			$config = array(

			    array('field' => 'old','label' => 'Contraseña anterior','rules' => 'required|trim|xss_clean'),
			    array('field' => 'np','label' => 'Nueva contraseña','rules' => 'required|trim|min_length[6]|max_length[60]|xss_clean'),
			    array('field' => 'npr','label' => 'Repetir nueva contraseña','rules' => 'required|trim|min_length[6]|max_length[60]|xss_clean|matches[np]')

			);

			$this->form_validation->set_rules($config);

	        if($this->form_validation->run() == FALSE) {

	            die('2'.chr(9).validation_errors("<p class='text-danger'><span class='fa fa-exclamation-triangle'></span>&nbsp;",'</p>'));

	        }


	        $rta = $this->places_model->updatePass($info);

	        $rta = explode(chr(9),$rta);

	        if($rta[0] == '2'){

	            die('2'.chr(9)."<p class='text-danger'><span class='fa fa-exclamation-triangle'></span>&nbsp;".$rta[1]."</p>");

	        }

	        die('1'.chr(9).'exito');

	}


	public function updateInfo()
	{



			$info=array();
	        
	        // datos unicos

	        $info['nom']=urldecode($this->input->post('nom'));
	        $info['mail']=urldecode($this->input->post('mail'));



	        // enviar datos a validacion
	        $this->form_validation->set_data($info);

			$config = array(

			    array('field' => 'nom','label' => 'nombre de usuario','rules' => 'required|trim|min_length[2]|max_length[60]|xss_clean'),
			    array('field' => 'mail','label' => 'correo de usuario','rules' => 'required|trim|min_length[2]|max_length[60]|valid_email|xss_clean')

			);

			$this->form_validation->set_rules($config);

	        if($this->form_validation->run() == FALSE) {

	            die('2'.chr(9).validation_errors("<p class='text-danger'><span class='fa fa-exclamation-triangle'></span>&nbsp;",'</p>'));

	        }


	        $rta = $this->places_model->updateInfo($info);

	        $rta = explode(chr(9),$rta);

	        if($rta[0] == '2'){

	            die('2'.chr(9)."<p class='text-danger'><span class='fa fa-exclamation-triangle'></span>&nbsp;".$rta[1]."</p>");

	        }

	        die('1'.chr(9).'exito');

	}


	public function adminusers()
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

				if($this->session->perfil == 'A'){

			    	$this->load->view('head','',false);

			    	if($this->input->get('id')){

			    		$habiuser = $this->places_model->usershab($this->input->get('id'));

			    	}

			    	else $habiuser = $this->places_model->usershab();

			    	$caract = $this->places_model->entidades_asigna($habiuser['default']);

			    	$perfil = $this->places_model->perfil_asigna($habiuser['default']);

			    	$n=1;

					$text=''; $close='N';
					foreach ($caract['data'] as $key => $value) {

						if(in_array($key,$caract['checked'])) $chk = true;
						else $chk = false;

						if($n<2){

							$text.="<div class='row'><div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>".
							form_checkbox(array('class'=>'entidades',
								'value'=>$key,
								'checked'=>$chk)).'&nbsp;'.
								$value.		
							"</div>";
							$close='N';
							$n++;

						}
						else{

							$text.="<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>".
							form_checkbox(array('class'=>'entidades',
								'value'=>$key,
								'checked'=>$chk)).'&nbsp;'.
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



			    	$data = ['usuarios' =>

			    		form_dropdown('users-select', $habiuser['data'], $habiuser['default'],array('id' => 'usuarios-select','class' => 'form-control')),

			    		'perfiles' => form_dropdown('user-perfil', $perfil['data'],$perfil['default'],array('id' =>'user-perfil','class' => 'form-control')),

			    		'entidades' => $text,

			    		'newperfil' => $perfil['data']

			    	 ];




			    	$personal=$this->load->view('general/profile/users',$data,true);
			    	$password='';

					$this->load->view('general/profile',array('personal_data'=> $personal, 'pass_data' => $password));
			        $js=$this->css_js->js(array('rute'=>'public/config.js?n='.rand()));
			        $this->load->view('footer_gris', array('js'=>$js), FALSE); 

				}
				else {

					redirect(base_url().'index.php/Signup','refresh');

				}

			}

		}
		else {

			redirect(base_url().'index.php/Signup','refresh');
		}




	}


	public function myprofile()
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

		    	$personal=$this->load->view('general/profile/personal','',true);
		    	$password=$this->load->view('general/profile/password','',true);

				$this->load->view('general/profile',array('personal_data'=> $personal, 'pass_data' => $password));
		        $js=$this->css_js->js(array('rute'=>'public/config.js?n='.rand()));
		        $this->load->view('footer_gris', array('js'=>$js), FALSE); 

			}

		}
		else {

			redirect(base_url().'index.php/Signup','refresh');
		}




	}


	public function log_out()
	{
		$this->session->sess_destroy();
		redirect(base_url().'index.php/Signup','refresh');	

	}


    public function uploadFile(){

        if(!empty($_FILES['archivo']['name'])){

            $config['upload_path'] = '/home/solutio3/public_html/sui/assets/public/img/img_enti/'.$this->session->actual;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
            $config['max_size'] = 2048;
            $config['file_name'] = escstr($this->input->post('nomimg'));
            //Load upload library and initialize configuration

            // si no existe directorio crear directorio
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            $this->load->library('upload',$config);
            $this->upload->initialize($config);

            if($this->upload->do_upload('archivo')){

                $uploadData = $this->upload->data();
                $picture = $uploadData['file_name'];
                $ext = $uploadData['file_ext'];
            }
            else{

                echo "Error de archivo: revise especificaciones o tamaño.";
                die();

            }

        }
        else{

            echo "Error: no se ha encontrado archivo al momento de subir.";
            die();

        }

            // crear imagen temporal 
            $infoconf['image_library'] = 'gd2';
            $infoconf['source_image'] = $config['upload_path'].'/'.escstr($this->input->post('nomimg')).$ext;
            $infoconf['create_thumb'] = TRUE;
            $infoconf['maintain_ratio'] = TRUE;
            $infoconf['width'] = 50;
            $infoconf['height'] = 50;
            $this->load->library('image_lib', $infoconf);
            $this->image_lib->initialize($infoconf);

            if(!$this->image_lib->resize()){
                echo "Error creando thumb.";
                die();
            }



        //Prepare array of user data
        $dataUpload = array(
        'nomimg' => escstr($this->input->post('nomimg')),
        'tipo' => $ext );
        return $this->places_model->uploadFile($dataUpload);
        die();

    }


	public function deleteimg()
	{

		echo $this->places_model->deleteimg($this->input->post('id'));

	}

	public function obtainImg()
	{

		echo $this->places_model->obtainImg();

	}

	public function text_add()
	{

		echo $this->places_model->text_add();

	}

	public function addHabs(){


		//decodifica json

        $data = json_decode($this->input->post('data'));

        $info=array('habitaciones' => array());

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

      	$rta = $this->places_model->addHabs($info);
        
        echo $rta;


	}


	public function delete_cama()
	{
		echo $this->places_model->delete_cama($this->input->post('id'));
	}

	public function delete_und()
	{
		echo $this->places_model->delete_und($this->input->post('id'));
	}

	public function changehorarios()
	{

		if(strtotime($this->input->post('cin1'))>strtotime($this->input->post('cin2'))){

        	die('2'.chr(9)."Revise las horas de check-in");
        }

		if(strtotime($this->input->post('cot1'))>strtotime($this->input->post('cot2'))){

        	die('2'.chr(9)."Revise las horas de check-out");
        }

		echo $this->places_model->changehorarios(array($this->input->post('cin1'),
													$this->input->post('cin2'),
													$this->input->post('cot1'),
													$this->input->post('cot2')));
	}
	public function changepeople()
	{
		echo $this->places_model->changepeople(array($this->input->post('cantidad'),
													$this->input->post('id')));
	}

	public function changeprice()
	{
		echo $this->places_model->changeprice(array($this->input->post('price'),
													$this->input->post('id')));
	}

	public function changename()
	{
		echo $this->places_model->changename(array($this->input->post('name'),
													$this->input->post('id')));
	}

	public function changedeta()
	{
		echo $this->places_model->changedeta(array($this->input->post('deta'),
													$this->input->post('id')));
	}

	public function add_cama()
	{
		echo $this->places_model->add_cama(array(	$this->input->post('cama'),
													$this->input->post('id'),
													$this->input->post('cantidad')
		));
	}

	public function index()
	{
	    
	    if($this->session->has_userdata('actual')){

			redirect(base_url().'index.php/Signup/enter_panel/'.$this->session->actual,'refresh');

		}
		else redirect(base_url().'index.php/Signup','refresh');	
		
	}

	public function updatetipo1()
	{

		if($this->session->has_userdata('actual')){

			//decodifica json
	        $data = json_decode($this->input->post('data'));

	        $info=array('info'=>array());
	        
	        // datos unicos

	        $info['info']['entidad']=urldecode($data->entidad);
	        $info['info']['tipo']=urldecode($data->tipo);
	        $info['info']['telefono']=urldecode($data->telefono);
	        $info['info']['mailentidad']=urldecode($data->mailentidad);
	        $info['info']['direccion']=urldecode($data->direccion);        
	        $info['info']['ciudad']=urldecode($data->ciudad);
	        $info['info']['lat']=floatval($data->lat);
	        $info['info']['long']=floatval($data->long);
	        $info['info']['postal']=urldecode($data->postal);
	        $info['info']['estb']=urldecode(trim($data->estb,','));


	        // enviar datos a validacion
	        $this->form_validation->set_data($info['info']);

			$config = array(

			    array('field' => 'entidad','label' => 'nombre de entidad','rules' => 'required|trim|min_length[2]|max_length[60]|xss_clean'),
			    array('field' => 'tipo','label' => 'tipo de entidad','rules' => 'required|trim|xss_clean'),
			    array('field' => 'telefono','label' => 'telefono de entidad','rules' => 'required|trim|min_length[2]|max_length[15]|xss_clean'),
			    array('field' => 'mailentidad','label' => 'correo de entidad','rules' => 'required|trim|min_length[2]|max_length[60]|valid_email|xss_clean'),
			    array('field' => 'ciudad','label' => 'ciudad','rules' => 'required|trim|xss_clean'),
			    array('field' => 'postal','label' => 'codigo postal','rules' => 'max_length[10]|xss_clean'),
			    array('field' => 'lat','label' => 'latitud','rules' => 'required|trim|decimal|xss_clean'),
			    array('field' => 'long','label' => 'longitud','rules' => 'required|trim|decimal|xss_clean'),
			    array('field' => 'direccion','label' => 'direccion de entidad','rules' => 'required|trim|min_length[1]|max_length[60]|xss_clean')

			);

			$this->form_validation->set_rules($config);

	        if($this->form_validation->run() == FALSE) {

	            die('2'.chr(9).validation_errors("<p class='text-danger'><span class='fa fa-exclamation-triangle'></span>&nbsp;",'</p>'));

	        }

	        $rta = $this->places_model->updatetipo1($info);
        
        	echo $rta;

		}
		else{

			die('2'.chr(9)."<p class='text-danger'><span class='fa fa-exclamation-triangle'></span>&nbsp;Verifique entidad seleccionada.</p>");

		}


	}	

	public function updatetipo3()
	{

		if($this->session->has_userdata('actual')){

			//decodifica json
	        $data = json_decode($this->input->post('data'));

	        $info=array('info'=>array());
	        
	        // datos unicos

	        $info['info']['add']=urldecode($data->add);
	        $info['info']['caract']=urldecode($data->caract);
	        $info['info']['desc']=urldecode($data->desc);
	        $info['info']['condi']=urldecode($data->condi);


	        $rta = $this->places_model->updatetipo3($info);
        
        	echo $rta;

		}
		else{

			die('2'.chr(9)."<p class='text-danger'><span class='fa fa-exclamation-triangle'></span>&nbsp;Verifique entidad seleccionada.</p>");

		}


	}


	public function roommenu($sel_entidad=null)
	{

		if($this->session->has_userdata('user')){

			if($this->session->active == 'N') redirect(base_url().'index.php/Signup','refresh');
			else {

		    	$this->load->view('head','',false);

				//seccion geografica

		    	$entidades = $this->places_model->entidades($this->session->user);

				if(trim($sel_entidad)){

					$getnombre=$this->places_model->nombre_entidad(array($sel_entidad));

					if($getnombre){

						$entidades['nombre'] = $getnombre->nom_entidad;
						$entidades['entidad'] = $sel_entidad;
					}


				}

		    	$info = $this->places_model->generaldata($entidades['entidad']);

				//seccion hotel

				$calendario = $this->places_model->calendario($entidades['entidad']);

				$this->session->set_userdata('calendario_actual',$calendario);

				if(!$calendario) redirect(base_url().'index.php/Signup','refresh');
				
				$horarios = $this->places_model->horarios($entidades['entidad']);

				$categoria = $this->signup_model->categoria();
				$unidad = $this->signup_model->unidad($categoria['default']);

				$habitaciones_actuales = $this->places_model->hab_actuales($calendario);

				$undcal = $this->places_model->unidadescalendario($calendario);

				$camas = $this->places_model->camas();

				$unds = [

					'hab_act' => $habitaciones_actuales,
					'undcal' => $undcal,
					'camas' => form_dropdown('camas', $camas['data'],$camas['default'],array('id'=>'tcama','class'=>'form-control'))
				];

				$data = [

					'default' => array($entidades['entidad'],$entidades['nombre']),

					'entidades' => $entidades['data'],

						'categoria' =>
					form_dropdown('categoria', $categoria['data'],$categoria['default'],array('id'=>'categoria','class'=>'form-control')),

						'unidad' =>
					form_dropdown('unidad', $unidad['data'],$unidad['default'],array('id'=>'unidad','class'=>'form-control')),

						'rta' => $horarios

				 ];

		    	$datos_form = $this->load->view('signup/data_unidades',$data,true).
		    	$this->load->view('general/habitaciones',$unds,true);

				$this->load->view('general/panel_admin',array('datos_form' => $datos_form , 'tipo' => '2'));

		        $js=$this->css_js->js(array('rute'=>'public/place.js?n='.rand()));
		        $this->load->view('footer_gris', array('js'=>$js), FALSE); 

			}

		}
		else redirect(base_url().'index.php/Signup','refresh');

	}

	public function settingsmenu($sel_entidad=null)
	{

		if($this->session->has_userdata('user')){

			if($this->session->active == 'N') redirect(base_url().'index.php/Signup','refresh');
			else {

		    	$this->load->view('head','',false);

				//seccion geografica

		    	$entidades = $this->places_model->entidades($this->session->user);

				if(trim($sel_entidad)){

					$getnombre=$this->places_model->nombre_entidad(array($sel_entidad));

					if($getnombre){

						$entidades['nombre'] = $getnombre->nom_entidad;
						$entidades['entidad'] = $sel_entidad;
					}


				}

		    	$info = $this->places_model->generaldata($entidades['entidad']);

				//seccion hotel

				$calendario = $this->places_model->calendario($entidades['entidad']);

				if(!$calendario) redirect(base_url().'index.php/Signup','refresh');



				$caract=$this->places_model->caracteristicasentidad($entidades['entidad']);
				$adicion=$this->places_model->adicionalesentidad($entidades['entidad']);

				$n=1;

				$text=''; $close='N';
				foreach ($caract['data'] as $key => $value) {

					if(in_array($key,$caract['checked'])) $chk = true;
					else $chk = false;

					if($n<2){

						$text.="<div class='row'><div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>".
						form_checkbox(array('class'=>'caracter',
							'value'=>$key,
							'checked'=>$chk)).'&nbsp;'.
							$value.		
						"</div>";
						$close='N';
						$n++;

					}
					else{

						$text.="<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>".
						form_checkbox(array('class'=>'caracter',
							'value'=>$key,
							'checked'=>$chk)).'&nbsp;'.
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

					if(in_array($key,$adicion['checked'])) $chk = true;
					else $chk = false;

					if($n<2){

						$add.="<div class='row'><div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>".
						form_checkbox(array('class'=>'adicional',
							'value'=>$key,
							'checked'=>$chk)).'&nbsp;'.
							$value.		
						"</div>";
						$close='N';
						$n++;

					}
					else{

						$add.="<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>".
						form_checkbox(array('class'=>'adicional',
							'value'=>$key,
							'checked'=>$chk)).'&nbsp;'.
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

				$desc = $this->places_model->descripcion($entidades['entidad']);

				$data = [

					'default' => array($entidades['entidad'],$entidades['nombre']),

					'entidades' => $entidades['data'],

					'caracteristicas' => $text,

					'adicionales' => $add

				 ];

				$gallery = $this->places_model->obtainImg(); 

				$adicionales = $this->places_model->text_add();

		    	$datos_form = $this->load->view('general/place_gallery',array('desc' => $desc, 'gallery' => $gallery),true).
		    	$this->load->view('signup/data_caracteristicas',$data,true);

				$this->load->view('general/panel_admin',array('datos_form' => $datos_form , 'tipo' => '3'));

		        $js=$this->css_js->js(array('rute'=>'public/place.js?n='.rand()));
		        $this->load->view('footer_gris', array('js'=>$js), FALSE); 

			}

		}
		else redirect(base_url().'index.php/Signup','refresh');

	}

}

/* End of file Places_admin.php */
/* Location: ./application/controllers/Places_admin.php */

?>