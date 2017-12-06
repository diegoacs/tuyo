<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_ini extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper(array('url','form','security','verphp','paginate','dates','querymysql'));
        $this->load->library(array('session','form_validation'));
        $this->load->model('main_model/Items_model','items_model');
    }


	public function index()
	{
		$this->load->view('head', '', FALSE);

        $data=array();
        $data['categorias'] = $this->items_model->getCat();
        $data['points'] = '';
        $this->load->view('index',$data, FALSE);

		$this->load->view('footer','', FALSE);
	}

    public function getMapData(){

        echo $this->items_model->getMapData();
    }

	public function cityDetails($city)
	{

        $this->load->view('head', '', FALSE);
        $ciudad = $this->items_model->getCity($city);
        $data1 = ['city' => $ciudad->nom_muni ,'categorias' => $this->items_model->getCat() ];
        $this->load->view('panel_search',$data1, FALSE);
        $places = $this->items_model->getDataCity($city);
        $filtros = $this->items_model->getFilters();
		$data2 = ['city' => $ciudad->nom_muni ,'places' => $places ,'filtros' => $filtros, 'idcity' => $city ];
		$this->load->view('city',$data2, FALSE);
		$this->load->view('footer_gris', '', FALSE);
        
	}


	public function productDetals($code,$city)
	{

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
		$this->load->view('footer_gris', '', FALSE);
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
        $data2 = ['rta' => $rta ,'filtros' => $filtros, 'condiciones' => $info->condiciones, 'gallery' => $slide];
        $this->load->view('lista_busqueda',$data2, FALSE);
        $this->load->view('footer_gris', '', FALSE); 

    }

}

/* End of file Panel_ini.php */
/* Location: ./application/controllers/Panel_ini.php */

?>