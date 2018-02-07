<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db_info extends CI_Controller {

	function __construct(){

        parent::__construct();
        $this->load->helper(array('url','form','security','verphp','getrol','getacount','regen_pago','paginate','dates','querymysql','financia'));//helpers primordiales
        $this->load->library(array('session','form_validation','FPDF'));
        $this->load->model('generic/Db_model','db_model');

    }

	public function index()
	{
		
		$html = $this->db_model->getdata();

		$this->load->view('generic/db_info',array('html' => $html['tablas'],'db' => $html['db']));

	}

}

/* End of file Db_info.php */
/* Location: ./application/controllers/generic/Db_info.php */