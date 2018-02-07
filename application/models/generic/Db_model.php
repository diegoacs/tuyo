<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db_model extends CI_Model {

	function __construct(){
        parent::__construct();
        $this->load->database();
    }


    function getdata()
    {
    	$tablas=array('tablas'=>'','db'=> $this->db->database);

    	$tables = $this->db->list_tables();

		foreach ($tables as $table)
		{

			$contenido=array(
				'nombre' => $table);
				
					$str="<div class=\"table-responsive\">".
					"<table class=\"table table-bordered table-hover\">".
						"<thead><tr>".
							"<th>Nombre</th>".
							"<th>Tipo</th>".
							"<th>Nulo</th>".
							"<th>LLave</th>".
							"<th>Default</th>".
							"<th>Extra</th>".
						"</tr></thead>".
						"<tbody>";

			
					    	$sql="show columns from $table";
					    	$fields = getQuery($sql);

							foreach ($fields as $row)
							{

								$str.="<tr>".
								"<td>".$row['Field']."</td>".
								"<td>".$row['Type']."</td>".
								"<td>".$row['Null']."</td>".
								"<td>".$row['Key']."</td>".
								"<td>".$row['Default']."</td>".
								"<td>".$row['Extra']."</td>".
								"</tr>";
							}

							$sql="show create table $table";
					    	$script = getQuery($sql);

					    	foreach ($script as $row) {

					    		$str.="<tr><td colspan='6'>".$row['Create Table']."</td></tr>";
					    		
					    	}
		        
						$str.="</tbody>".
					"</table>".
				"</div>";

			$contenido['content']=$str;

			$tablas['tablas'][]=$contenido;

		}
    
		return $tablas;

    }

}

/* End of file Db_model.php */
/* Location: ./application/models/generic/Db_model.php */