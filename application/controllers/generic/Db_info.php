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



	public function get_schema()
	{

		// Load the DB utility class
		$this->load->dbutil();

		// Backup your entire database and assign it to a variable

		$filename = date('Ymd_His').'.sql';

		$prefs = array(
        'tables'        => array(),   // Array of tables to backup.
        // 'ignore'        => array('respaldo_adicionales_estudio','respaldo_estudio','respaldos'),  // List of tables to omit from the backup
        'filename'      => $filename,
        'format'      => 'sql',
        'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
        'add_insert'    => FALSE,                        // Whether to add INSERT data to backup file
        'newline'       => "\n",                         // Newline character used in backup file
        'foreign_key_checks' => FALSE);

		$backup = $this->dbutil->backup($prefs);

		// Load the download helper and send the file to your desktop
		$this->load->helper('download');
		force_download($filename, $backup);

		$this->index();

	}


	public function download_db()
	{

		// Load the DB utility class
		$this->load->dbutil();

		// Backup your entire database and assign it to a variable

		$filename = date('Ymd_His').'.sql';

		$prefs = array(
        'tables'        => array(),   // Array of tables to backup.
        'ignore'        => array('respaldo_adicionales_estudio','respaldo_estudio','respaldos'),  // List of tables to omit from the backup
        'filename'      => $filename,
        'format'      => 'sql',
        'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
        'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
        'newline'       => "\n",                         // Newline character used in backup file
        'foreign_key_checks' => FALSE);

		$backup = $this->dbutil->backup($prefs);

		// Load the download helper and send the file to your desktop
		$this->load->helper('download');
		force_download($filename, $backup);

		$this->index();

	}


	public function generatedb()
	{

		// Load the DB utility class
		$this->load->dbutil();

		// Backup your entire database and assign it to a variable

		$filename = date('Ymd_His').'.sql';

		$prefs = array(
        'tables'        => array(),   // Array of tables to backup.
        'ignore'        => array('respaldo_adicionales_estudio','respaldo_estudio','respaldos'),  // List of tables to omit from the backup
        'filename'      => $filename,
        'format'      => 'sql',
        'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
        'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
        'newline'       => "\n",                         // Newline character used in backup file
        'foreign_key_checks' => FALSE);

		$backup = $this->dbutil->backup($prefs);

		// Load the file helper and write the file to your server
		$this->load->helper('file');
		write_file('/users/diegocastellanos/documents/consultas_php/'.$filename, $backup);

		$this->index();

	}

}

/* End of file Db_info.php */
/* Location: ./application/controllers/generic/Db_info.php */