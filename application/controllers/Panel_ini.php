<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_ini extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper(array('url','form','security','verphp','paginate','dates','querymysql','captcha','rutasconf'));
        $this->load->library(array('session','form_validation'));
        $this->load->library('css_js',null,'css_js');

        $this->load->model('main_model/Items_model','items_model');
    }

    public function searchRta(){

        if(count($_POST)>0){

            $data = array('categoria' => $this->input->post('searchcategory'),

                        'fecha1' => $this->input->post('searchdate1'),

                        'fecha2' => $this->input->post('searchdate2'),

                        'ciudad' => $this->input->post('searchcity')
                    );

            $resultados = $this->items_model->check_search($data);      

            if(!trim($data['fecha1'])) $data['fecha1']=date('Y-m-d');

            if(!trim($data['fecha2'])) $data['fecha2']=date('Y-m-d');

            $rta = $this->load->view('panel_rta',array('resultados' => $resultados),true);
             
            $this->load->view('head', '', FALSE);

            $data1 = ['city' => $data['ciudad'] ,'categorias' => $this->items_model->getCat() ];

            $this->load->view('panel_search',$data1, FALSE);     

            $filtros = $this->items_model->getFilters();

            $data2 = [

                'rta' => $rta ,'filtros' => $filtros, 
                'condiciones' => '', 'gallery' => '',
                'cols' => '5','categorias' => $this->items_model->getCat(),
                'fecha1' => $data['fecha1'],
                'fecha2' => $data['fecha2'],
                'ciudad' => $data['ciudad']

            ];

            $this->load->view('lista_busqueda',$data2, FALSE);

            $this->load->view('modal_form','', FALSE);

            $js=$this->css_js->js(array('rute'=>'public/panel.js?n='.rand()));

            $this->load->view('footer_gris', array('js'=>$js), FALSE);

        }
        else{

            redirect('/Panel_ini','refresh');
        }

    }

    public function filterChar(){

        if(count($_POST)>0){

            $data = array(
                        'caracteristica' => $this->input->post('char'),
                        'categoria' => $this->input->post('tipo'),
                        'fecha1' => $this->input->post('ini'),
                        'fecha2' => $this->input->post('fin'),
                        'ciudad' => $this->input->post('city'));

            if($this->input->post('cy')=='N') echo $this->items_model->check_search_filter($data); 
            else echo $this->items_model->getDataCityChar($data);      


        }
        else{

            redirect('/Panel_ini','refresh');
        }

    }

	public function index(){

		$this->load->view('head', '', FALSE);

        $data=array();
        $data['categorias'] = $this->items_model->getCat();
        $data['points'] = '';
        $this->load->view('index',$data, FALSE);
        $js=$this->css_js->js(array('rute'=>'public/panel.js?n='.rand()));
        $this->load->view('footer', array('js'=>$js), FALSE); 
	}

    public function getMapData(){

        echo $this->items_model->getMapData();
    }

	public function cityDetails($city){

        $this->load->view('head', '', FALSE);
        $ciudad = $this->items_model->getCity($city);

        $data1 = ['city' => $ciudad->nom_muni ,'categorias' => $this->items_model->getCat() ];
        $this->load->view('panel_search',$data1, FALSE);

        $places = $this->items_model->getDataCity($city);
        $filtros = $this->items_model->getFilters();
		$data2 = ['city' => $ciudad->nom_muni ,'places' => $places ,'filtros' => $filtros, 'idcity' => $city, 'categorias' => $this->items_model->getCat() ];
		$this->load->view('city',$data2, FALSE);
        $js=$this->css_js->js(array('rute'=>'public/panel.js?n='.rand()));
        $this->load->view('footer_gris', array('js'=>$js), FALSE); 
        
	}


	public function productDetals($code,$city){

        $info = $this->items_model->infoEntidad($code);
        $img = $this->items_model->infoImg($code);
        $carac = $this->items_model->infoCarac($code);
        $tipos = $this->items_model->infoUnd($code);

        $data = array(
                'code' => $code
                ,'nombre' => $info->nom_entidad
                ,'ubicacion' => $info->dir_entidad
                ,'descripcion' => $info->descripcion
                ,'lat' => $info->latitud
                ,'lon' => $info->longitud
                ,'condiciones' => $info->condiciones
                ,'imagenes' => $img
                ,'caracteristicas' => $carac
                ,'tipos' => $tipos);

		$this->load->view('head', '', FALSE);
        $ciudad = $this->items_model->getCity($city);
        $data1 = ['city' => $ciudad->nom_muni ,'categorias' => $this->items_model->getCat() ];
		$this->load->view('panel_search',$data1, FALSE);
		$this->load->view('detals',$data, FALSE);

        $this->load->view('map_modal',$data, FALSE);
        $js=$this->css_js->js(array('rute'=>'public/panel.js?n='.rand()));
        $this->load->view('footer_gris', array('js'=>$js), FALSE); 
	}


    public function check_avaliable($entidad,$f1,$f2,$tipo){
        
        $rta=$this->items_model->check_avaliable($entidad,$f1,$f2,$tipo);      
        $info = $this->items_model->infoEntidad(base64_decode($entidad));
        // $similar = $this->items_model->similarEnti(base64_decode($entidad));
        $this->load->view('head', '', FALSE);
        $data1 = ['city' => '' ,'categorias' => $this->items_model->getCat() ];
        $this->load->view('panel_search',$data1, FALSE);        
        $filtros = $this->items_model->getFilters();
        $slide = $this->items_model->galleryEnti(base64_decode($entidad));

        // condiciones 
        $condicion="<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'><h3>Condiciones de servicio</h3></div>".
        "<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>".$info->condiciones."<br><br><br><br></div>";

        $data2 = ['rta' => $rta ,'filtros' => $filtros,
                 'condiciones' =>$condicion, 'gallery' => $slide , 
                 'cols' => '4','categorias' => $this->items_model->getCat(),
                'fecha1' => $f1,
                'fecha2' => $f2,
                'ciudad' => ''
                ];

        $this->load->view('lista_busqueda',$data2, FALSE);
        $this->load->view('modal_form','', FALSE);
        $js=$this->css_js->js(array('rute'=>'public/panel.js?n='.rand()));
        $this->load->view('footer_gris', array('js'=>$js), FALSE); 

    }

    public function contact(){
        
            $this->form_validation->set_rules('name', 'nombres', 'required|trim|min_length[2]|max_length[150]|xss_clean');
            $this->form_validation->set_rules('telefono', 'telefono', 'required|trim|min_length[5]|max_length[15]|xss_clean');
            $this->form_validation->set_rules('email', 'email', 'required|trim|min_length[5]|max_length[30]|xss_clean');
            $this->form_validation->set_rules('coment', 'coment', 'max_length[500]|xss_clean');

            //lanzamos mensajes de error si es que los hay
            if($this->form_validation->run() == FALSE) {
                die('Verifique los datos en su formulario, datos obligatorios: Nombres, E-mail y tel茅fono.');
            }
            else {

                $data = array('name' => $this->input->post('name'),
                    'telefono' => $this->input->post('telefono'),
                    'email' => $this->input->post('email'),
                    'coment' => $this->input->post('coment'),
                    'und' => $this->input->post('und'),
                    'ent' => $this->input->post('ent')
                );

                $rta = $this->items_model->saveInfo($data);

                if($rta['rta']=='2'){
                    die('Error enviando datos, intente mas tarde.');
                }

                $to ='juan.jenner@gmail.com';
                
                $subject = "Informaci贸n para alquiler No. ".$rta['id'];

                $message = "<html><head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=gb18030\"><title>Informaci贸n de alquiler</title></head>".
                "<body><p> Tuyo.com</p><br> Hola Administrador<br><span>".
                "Tienes una nueva solicitud de alquier para ".$rta['entidad'].
                " para unidad: ".$rta['unidad'].
                "<p>".
                "Nombre de contacto: ".$data['name']."<br>".
                "Telefono de contacto: ".$data['telefono']."<br>".
                "Email de contacto: ".$data['email']."<br>".
                "Comentarios: ".$data['coment']."<br>".
                "</p>".
                "</body></html>";

                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <no-responder@tuyo.com>' . "\r\n";
                //$headers .= 'Cc: castellanossantamaria@gmail.com' . "\r\n";

                mail($to,$subject,$message,$headers);

                die('gracias, pronto nos contactaremos con usted para ofrecerle los servicios.');
            }
    }

}

/* End of file Panel_ini.php */
/* Location: ./application/controllers/Panel_ini.php */

?>