<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','security','verphp','paginate','dates','querymysql','captcha'));
        $this->load->library(array('session','form_validation'));
        // $this->load->model('sign_model/Signup_model','signup_model');

	}

	public function users()
	{

		$this->load->view('head','',false);
		$this->load->view('signup/form_sign','',false);
		$this->load->view('footer_gris','',false);		

	}

	public function places()
	{

		$this->load->view('head','',false);
		$this->load->view('signup/form_places','',false);
		$this->load->view('footer_gris','',false);		

	}

}

/* End of file Signup.php */
/* Location: ./application/controllers/Signup.php */



?>