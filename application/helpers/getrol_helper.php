<?php

function get_rol($actual_enti=null){

  $CI =& get_instance();
  $rol='';
  if($actual_enti==null) $actual_enti=$CI->session->userdata('act_enti');
  $ie=$CI->session->userdata('id_entidades');
  $re=$CI->session->userdata('rol_entidades');
  for ($i = 0; $i < count($ie); $i++){if($actual_enti==$ie[$i]) $rol=$re[$i];}
  return $rol;
}

function getname_enti($actual_enti=null){

  $CI =& get_instance();
  $CI->load->database();
  if($actual_enti==null) $actual_enti=$CI->session->userdata('act_enti');
  $sql ="select nom_entidad from entidad where id_entidad='".$actual_enti."'";
  $query = $CI->db->query($sql);
  $row = $query->row();
  return $row->nom_entidad;
}

function is_logged(){
  $CI =& get_instance();
  if ($CI->session->userdata('habit')==false || $CI->session->userdata('habit')=='')
  {
    $token= md5(uniqid(rand(),true));
    $CI->session->set_userdata('token',$token);
    $data['token']=$token;
    $CI->load->view('log_usr',$data);
    return false;
  }
  else return true;
}

function notLogged(){
  $CI =& get_instance();
  if ($CI->session->userdata('habit')==false || $CI->session->userdata('habit')=='') return false;
  else return true;
}

?>
