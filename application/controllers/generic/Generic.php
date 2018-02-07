<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generic extends CI_Controller {

    function __construct(){

        parent::__construct();
        $this->load->helper(array('url','form','security','verphp','getrol','getacount','regen_pago','paginate','dates','querymysql','financia'));//helpers primordiales
        $this->load->library(array('session','form_validation','FPDF'));
        $this->load->model('sys_caja/Estudio_model','estudio_model');
        $this->load->model('sys_models/Enti_model','enti_model');
        $this->load->model('sys_caja/Docs_model','docs_model');
        $this->load->model('sys_caja/Ejecutivo_model','ejecutivo_model');

    }

    public function index(){

        if ($this->session->userdata('habit')==false || $this->session->userdata('habit')==''){
            $data['token'] = $this->get_token();
            $this->load->view('log_usr',$data);
        }
        else {
            $data=array();
            $data['enlace']="<li>".anchor(base_url('index.php/'), 'MODULO GENERICO',"")."</li>";
            $data['enlace_activo']="<li class='active'>FORM GENERICO</li>";
            $data['titulo']="<span class='fa fa-folder'></span>&nbsp;TITULO&nbsp;<small>general</smal>";
            $data['titulo_panel']="<span class='fa fa-folder'></span>&nbsp;Titulo de panel";
            $data['contenido_panel']=array();
            $data['modales']=array();
            $data['enlace_js']=base_url("assets/public/js/general_func.js?n=".rand());
            $this->load->view('main/head');
            // $data['up_doc'] = $this->load->view('sys_caja/upload/sys_upload','',TRUE);        
            $this->load->view('generic/generic',$data);
        }

    }

    public function log_out(){

        $this->session->sess_destroy();
        $this->index();

    }

    public function get_token(){

        $token= md5(uniqid(rand(),true));
        $this->session->set_userdata('token',$token);
        return $token;

    }

}

?>
