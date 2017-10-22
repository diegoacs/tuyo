<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_ini extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->helper(array('url','form','security','verphp','paginate','dates','querymysql'));
        $this->load->library(array('session','form_validation'));
    }


	public function index()
	{
		$this->load->view('head', '', FALSE);
		$this->load->view('index','', FALSE);
		$this->load->view('footer', '', FALSE);
	}


	public function cityDetails($city)
	{

		$detalle ="Floridablanca es un municipio colombiano del departamento de Santander al noreste de Colombia. Tiene una extensión aproximada de 97 km²; y se encuentra conurbado con la ciudad de Bucaramanga y pertenece a su área metropolitana. Floridablanca es conocida por sus obleas, su turismo, sus parques, sus centros comerciales, sus clínicas, su educación de calidad y ha sido polo del progreso de la región durante los últimos años.

Como muestra del crecimiento en sus últimos años ha contribuido con un gran aporte al desarrollo de la región, su crecimiento urbanístico va acorde con las necesidades del Área Metropolitana de Bucaramanga";



		$data = ['city' =>$city, 'detalle' => $detalle];
		$this->load->view('head', '', FALSE);
		$this->load->view('city',$data, FALSE);
		$this->load->view('footer', '', FALSE);
	}


	public function productDetals()
	{
		$this->load->view('head', '', FALSE);
		$this->load->view('detals','', FALSE);
		$this->load->view('footer', '', FALSE);
	}

}

/* End of file Panel_ini.php */
/* Location: ./application/controllers/Panel_ini.php */

?>