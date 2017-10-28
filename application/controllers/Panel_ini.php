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

		$data = ['city' => $city , 'detalle' => ''];
		$this->load->view('head', '', FALSE);
		$this->load->view('panel_search','', FALSE);
		$this->load->view('city',$data, FALSE);
		$this->load->view('footer_gris', '', FALSE);
	}


	public function productDetals($code)
	{

        if($code=='001'){
            $data = array('nombre' => 'Villa María Paula'
                        ,'ubicacion' => 'Ruitoque Alto, Piedecuesta, Santander'
                        ,'descripcion' => 'Villa María paula es un espacio campestre perfecto para toda clase de 
                        reuniones y eventos sociales, su cercania con la ciudad de Bucaramanga y Floridablanca permiten 
                        disfrutar de la naturaleza sin salir de la ciudad.'
                        ,'lat' => '7.014035', 'lon' => '-73.111061');
            $img = array('mp1.jpg','mp2.jpg','mp3.jpg','mp4.jpg','mp5.jpg' );
        }
        if($code=='002'){
            $data = array('nombre' => 'Hotel Cascade Real'
                        ,'ubicacion' => 'Lebrija, Santander'
                        ,'descripcion' => 'Confortable hotel familiar en Lebrija, Santander. Habitaciones Sencillas, Dobles,
                        Familiares y multiples. TV por cable, Wifi, servicio de cafeteria y parqueadero 24 horas.'
                        ,'lat' => '7.111359', 'lon' => '-73.216317');
            $img = array('img_no.jpg','img_no.jpg','img_no.jpg');
        }
        if($code=='003'){
            $data = array('nombre' => 'Hospedaje Palonegro'
                        ,'ubicacion' => 'Lebrija, Santander'
                        ,'descripcion' => 'Confortable hospedaje para descanso, habitaciones con baño privado, TV, Wifi y servicios de cafeteria.
                        Parqueadero vigilado.'
                        ,'lat' => '7.111914', 'lon' => '-73.215042');
            $img = array('img_no.jpg','img_no.jpg','img_no.jpg');
        }
        $data['condiciones']='<ul>
            <li>Debe abonar para confirmar reserva.</li>
            <li>Pagos en efectivo o por consignación.</li>
            <li>Hora de entrada 13:00 hrs.</li>
            <li>No se admiten mascotas.</li>
            <li>Niños mayores de 6 años pagan entrada.</li>
        </ul>';
		$this->load->view('head', '', FALSE);
		$this->load->view('panel_search','', FALSE);
		$this->load->view('detals',$data, FALSE);
        $this->load->view('map_modal',$data, FALSE);
		$this->load->view('footer_gris', '', FALSE);
	}

}

/* End of file Panel_ini.php */
/* Location: ./application/controllers/Panel_ini.php */

?>