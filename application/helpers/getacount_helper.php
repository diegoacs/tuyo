<?php
// verificacion y creacion de cuentas para usuarios
function createAcount($usr,$cta){
    $CI =& get_instance();
    $CI->load->database();
    $enti=$CI->session->userdata('act_enti');  
    // obtiene documento de persona
    $sql="select id_usr from users where nom_usr='$usr'"; $query=$CI->db->query($sql);
    if($query->num_rows()>0 ) {$row=$query->row(); $doc=$row->id_usr;} else $doc='';
    $sql="select total_cuenta from saldos_de_cuentas where id_entidad='$enti' and cuenta='$cta' and doc_asocia='$doc'";  
    $query=$CI->db->query($sql);
    // si no existe esa cuenta, debe crearse cuenta en el PUC para esta persona, automaticamente.
    if($query->num_rows()<1){

        $name=$usr;
        $sql="select primer_nombre,segundo_nombre,primer_apellido,segundo_apellido from personas p left join users u on p.id_persona=u.id_usr where u.nom_usr='$usr'";
        $qy=$CI->db->query($sql);
        if($qy->num_rows()>0 ) {$row=$qy->row();$name=$row->primer_nombre.' '.$row->segundo_nombre.' '.$row->primer_apellido.' '.$row->segundo_apellido;}
      
        $sql="select max(total_cuenta)+0 as max from saldos_de_cuentas where id_entidad='$enti' and cuenta='$cta'";
        $query = $CI->db->query($sql); $row=$query->row(); $max=$row->max; 
        if(strlen($max)<5) $max=(int)$max.'000';
        $max++;
        // nuevo codigo asignar cuenta de caja a usuario
        $sql="insert into saldos_de_cuentas (id_entidad,clase,grupo,cuenta,subcuenta,total_cuenta,nombre,doc_asocia) ";
        $sql.=" value ('$enti',substring('".$max."',1,1),substring('".$max."',1,2),substring('".$max."',1,4), ";
        $sql.="'".$max."','".$max."','".strtoupper($name)."','$doc')";
        $CI->db->query($sql);
        $nuevaCta=$max;
    }
    else{$row=$query->row(); $nuevaCta=$row->total_cuenta;}

    return $nuevaCta;
}


function getacount($doc){
    $CI =& get_instance();
    $CI->load->database();
    $actual_enti=$CI->session->userdata('act_enti');
    $sql ="select cod_cuenta,cod_subcuenta,naturaleza from asientos where sigla_doc='".$doc."' and id_entidad='".$actual_enti."'";
    $query = $CI->db->query($sql);
    $cuenta=array();
    $subcuenta=array();
    $naturaleza=array();
    foreach ($query->result_array() as $row){

        $cuenta[]=$row['cod_cuenta'];
        $subcuenta[]=$row['cod_subcuenta'];
        $naturaleza[]=$row['naturaleza'];
    }
    return array($cuenta,$subcuenta,$naturaleza);
}

function getCaja(){
    $CI =& get_instance();
    $CI->load->database();
    $idUsr=$CI->session->userdata('id_usr');
    $enti=$CI->session->userdata('act_enti');
    $idM='null';$caja_usr='';$idS='';
    $sql="select id_mov from mov_cajas where activo='S' and id_entidad='$enti'";
    $query = $CI->db->query($sql); 
    if($query->num_rows()>0) { 
        $row=$query->row(); $idM=$row->id_mov; 
        $sql="select id_segui from segui_caja where id_mov=$idM";
        $q = $CI->db->query($sql); 
        if($q->num_rows()>0) { $r=$q->row(); $idS=$r->id_segui; }
    }
    $sql="select total_cuenta from saldos_de_cuentas where doc_asocia='$idUsr' and id_entidad='$enti' and cuenta='1105'";
    $query = $CI->db->query($sql); 
    if($query->num_rows()>0) { $row=$query->row(); $caja_usr=$row->total_cuenta; }
    return array($idM,$caja_usr,$idS);
}

// tipo de documento, array con valores, total de valor asiento, concepto(no obligatorio), reserva(no obligatorio), documentocliete(no obligatorio)
function genAsiento($sigla,$vals,$total_val,$conceptos=null,$reserva=null,$docCli=null){

    $CI =& get_instance();
    $CI->load->database();

    $idUsr=$CI->session->userdata('id_usr');
    $enti=$CI->session->userdata('act_enti');
    // codigo nuevo, movimiento de caja actual y cuenta de caja de empleado que esta usando el sistema
    $sql="select id_mov from mov_cajas where activo='S' and id_entidad='$enti'";
    $query = $CI->db->query($sql); $row=$query->row(); $idM=$row->id_mov;
    $sql="select total_cuenta from saldos_de_cuentas where doc_asocia='$idUsr' and id_entidad='$enti' and cuenta='1105'";
    $query = $CI->db->query($sql); 
    if($query->num_rows()<1){
         $caja_usr=createAcount($CI->session->nom_usr,'1105');
    }
    else {
        $row=$query->row(); $caja_usr=$row->total_cuenta;
    }
    
    //incluir documento
    $sql="select max(num_doc+0) as id from documento where sigla_doc='$sigla' and id_entidad='$enti'";
    $query = $CI->db->query($sql); foreach ($query->result_array() as $row) $docmax=$row['id']+1;
    $sql="insert into documento (sigla_doc,num_doc,id_entidad,vrdebe,vrhaber,usr_doc,hrs_doc,fecha_doc,id_mov) values ";
    $sql.=" ('$sigla','".str_pad($docmax,20,'0',STR_PAD_LEFT)."','$enti',$total_val,$total_val,'".$CI->session->nom_usr."',
    '".date('H:i:s')."','".date('Ymd')."',$idM)";
    $CI->db->query($sql);

    $i=0;
    $sql="select total_cuenta,naturaleza from asientos_documento where id_entidad='$enti' and sigla_doc='$sigla'";
    $query = $CI->db->query($sql);
    if($query->num_rows()>0){
        foreach ($query->result_array() as $row)
        {
            // incluyendo el detalle del documento
            $sql="insert into detalle_documento (sigla_doc,num_doc,id_entidad,vrdebe,vrhaber,conceptos,identi_doc,";
            $sql.="id_reserva,usr_detadoc,hrs_detadoc,fecha_detadoc,total_cuenta) values ('$sigla','".str_pad($docmax,20,'0',STR_PAD_LEFT)."','$enti',";
            if($row['naturaleza']=='D'){ $sql.="$vals[$i],0"; } else { $sql.="0,$vals[$i]"; }
            $sql.=",$conceptos,$docCli,$reserva,'".$CI->session->nom_usr."','".date('H:i:s')."','".date('Ymd')."','".$row['total_cuenta']."')";
            $CI->db->query($sql);

            //configuracion de valores segun naturaleza de asiento
            if($row['naturaleza']=='D'){ $debe=$vals[$i]; $haber=0; } else { $haber=$vals[$i]; $debe=0; }
            //buscamos la cuenta madre 4 digitos en el PUC de entidad y si no esta la creamos automaticamente
            $cuenta=substr($row['total_cuenta'],0,4); $sql="select total_cuenta from saldos_de_cuentas where id_entidad='$enti' and total_cuenta='$cuenta'"; $q2=$CI->db->query($sql);     
            if($q2->num_rows()<1){
                $sql="insert into saldos_de_cuentas (id_entidad,clase,grupo,cuenta,subcuenta,auxiliares,total_cuenta,nombre) ";
                $sql.="select '$enti',clase,grupo,cuenta,subcuenta,auxiliares,total_cuenta,nombre from puc where total_cuenta='$cuenta'";
                $CI->db->query($sql);
            }   

            //verificar si es cuenta o subcuenta
            if(strlen($row['total_cuenta'])>4){
                // agregar movimiento a cuenta
                $sql="update saldos_de_cuentas set debe=debe+$debe,haber=haber+$haber where total_cuenta='$cuenta' and id_entidad='$enti'";
                $CI->db->query($sql);         
                // agregar movimiento a subcuenta 
                $sql="update saldos_de_cuentas set debe=debe+$debe,haber=haber+$haber where total_cuenta='".$row['total_cuenta']."' and id_entidad='$enti'";
                $CI->db->query($sql);
            }
            else{
                $sql="update saldos_de_cuentas set debe=debe+$debe,haber=haber+$haber where total_cuenta='$cuenta' and id_entidad='$enti'";
                $CI->db->query($sql);
                if($cuenta=='1105'){
                    // si la cuenta principal es caja - el movimiento se efectua de la caja menor del usuario, tanto caja principal como caja menor
                    $s="select total_cuenta from saldos_de_cuentas where doc_asocia='$idUsr' and id_entidad='$enti' and cuenta='1105'"; $qy = $CI->db->query($s); 
                    if($qy->num_rows()>0) { $row=$qy->row(); $caja_usr=$row->total_cuenta; }
                    else{
                        $caja_usr=createAcount($CI->session->nom_usr,'1105');
                    }
                    $sql="update saldos_de_cuentas set debe=debe+$debe , haber=haber+$haber where total_cuenta='$caja_usr' and id_entidad='$enti'";
                    $CI->db->query($sql);
                }                
            }
            $i++;
        }
        return '1';
    } else {
        $CI->db->trans_rollback();
        return 'Imposible abonar , no existen cuentas asociadas a este movimiento contable.';
    }
}

function getName($n){
    $CI =& get_instance();
    $CI->load->database();
    $sql="select primer_nombre,segundo_nombre,primer_apellido,segundo_apellido from personas p left join users u on p.id_persona=u.id_usr where u.nom_usr='$n'";
    $query=$CI->db->query($sql);
    if($query->num_rows()>0 ) {
        $row=$query->row();
        return $row->primer_nombre.' '.$row->segundo_nombre.' '.$row->primer_apellido.' '.$row->segundo_apellido;
    }
    else return '';
}

function getId($n){
    $CI =& get_instance();
    $CI->load->database();
    $sql="select id_usr from users where nom_usr='$n'";
    $query=$CI->db->query($sql);
    if($query->num_rows()>0 ) {
        $row=$query->row();
        return $row->id_usr;
    }
    else return '';
}


 ?>
