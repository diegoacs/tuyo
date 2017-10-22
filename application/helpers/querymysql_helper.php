<?php

function iniTr(){
    $CI =& get_instance();
    $CI->db->trans_begin();
}

function rollTr(){
    $CI =& get_instance();
    $CI->db->trans_rollback();    
}

function endTr(){
    $CI =& get_instance();
    $CI->db->trans_commit();
}

function esclike($str){
    $CI =& get_instance();
    return $CI->db->escape_like_str($str);
}

function escstr($str){
    $CI =& get_instance();
    return $CI->db->escape_str($str);
}

function exeQuery($sql){
    $CI =& get_instance();
    if($CI->db->query($sql)) return true;
    else return false;
}

function getQuery($sql){
    $CI =& get_instance();
    $query=$CI->db->query($sql);
    if($query) return $query->result_array();
    else return false;
}

function nRows($sql){
    $CI =& get_instance();
    $query=$CI->db->query($sql);
    if($query) return $query->num_rows();
    else return false;
}

function oneRow($sql){
    $CI =& get_instance();
    $query=$CI->db->query($sql);
    if($query) return $query->row();
    else return false;
}

function nullStr($str){
    if(!trim($str)) $str='null';
    return "'".$str."'";
}

?>
