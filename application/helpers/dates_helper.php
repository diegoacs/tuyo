<?php

function compareDate($date1,$date2,$dif='<'){
    switch ($dif) {
        case '<': $rta=strtotime($date1) < strtotime($date2); break;
        case '=': $rta=strtotime($date1) == strtotime($date2); break;
        case '>': $rta=strtotime($date1) > strtotime($date2); break;
        case '<=': $rta=strtotime($date1) <= strtotime($date2); break;
        case '>=': $rta=strtotime($date1) >= strtotime($date2); break;
        default: $rta=strtotime($date1) < strtotime($date2); break;
    }
    return $rta;
}

function get_day($day){
    switch ($day) {
        case '0': $day="Domingo";break;
        case '1': $day="Lunes";break;
        case '2': $day="Martes";break;
        case '3': $day="Miércoles";break;
        case '4': $day="Jueves";break;
        case '5': $day="Viernes";break;
        case '6': $day="Sábado";break;
    }
    return $day;
}

function get_mes($mes){

    if($mes>12) $mes='1';
    switch ($mes) {
        case '1': $mes='Enero'; break;
        case '2': $mes='Febrero'; break;
        case '3': $mes='Marzo'; break;
        case '4': $mes='Abril'; break;
        case '5': $mes='Mayo'; break;
        case '6': $mes='Junio'; break;
        case '7': $mes='Julio'; break;
        case '8': $mes='Agosto'; break;
        case '9': $mes='Septiembre'; break;
        case '10': $mes='Octubre'; break;
        case '11': $mes='Noviembre'; break;
        case '12': $mes='Diciembre'; break;
    }
    return $mes;
}

function adding_month($date,$num=1,$type='P'){
    //date=fecha num=numero de mes type=P para suma, R para resta 
     if($type=='P') $v_return=date("Y-m-d", strtotime($date."+ ".$num." month"));
     else $v_return=date("Y-m-d", strtotime($date."- ".$num." month"));

     return $v_return;
}

function adding_day($date,$num=1,$type='P'){
    //date=fecha num=numero de mes type=P para suma, R para resta 
     if($type=='P') $v_return=date("Y-m-d", strtotime($date."+ ".$num." day"));
     else $v_return=date("Y-m-d", strtotime($date."- ".$num." day"));

     return $v_return;
}

function generate_date($id_info,$fechUse){

    $CI =& get_instance();
    $CI->load->database();
    $sql="select day(fch_inicial) as day from calendario_pagos where id_entidad='".$CI->session->userdata('act_enti')."' and id_informacion='".$id_info."' and num_cuota=0";
    $query = $CI->db->query($sql);
    $row = $query->row();
    $day_origin=$row->day;
    $day_calcule=date('d',strtotime($fechUse));
    $month_calcule=date('m',strtotime($fechUse));
    $year_calcule=date('Y',strtotime($fechUse));

    //si el dia de la fecha actual es mayor al dia de corte (solo dias no contar fechas)
    if($day_calcule >= $day_origin){
        $v_return=date("Y-m-d", strtotime($year_calcule."-".$month_calcule."-".$day_origin."+ 1 month"));
    } //si es menor retorna la fecha de corte de ese mismo mes
    else $v_return=date("Y-m-d", strtotime($year_calcule."-".$month_calcule."-".$day_origin));

    return $v_return;
}

function diferencia_dias($inicio,$final){

    $today = new DateTime($inicio);
    $appt  = new DateTime($final);
    $dias=(int)$appt->diff($today)->days;
    return $dias;
}

function diferencia_meses($inicio,$final){

    $today = new DateTime($inicio);
    $appt  = new DateTime($final);
    $diff = $today->diff($appt);
    return $diff->m;
}

function calcula_interes($inicio,$final,$tasa_interes,$saldo){

    $today = new DateTime($inicio);
    $appt  = new DateTime($final);
    $dias=(int)$appt->diff($today)->days;
    if($dias>=28) $valor=$saldo*$tasa_interes;
    else{
        $valor=($saldo*$tasa_interes)/30;
        $valor=$valor*$dias;
    }
    return $valor;
}

function calcula_dias_interes($tasa_interes,$saldo,$dias){
    $valor=($saldo*$tasa_interes)/30;
    $valor=$valor*$dias;
    return $valor;
}

function siguDia($date){
    // identifica dia de fecha
    $times=1;
    while ($times>0) {

        $fch=explode('-',$date);
        $dia=mktime(0, 0, 0,(int)$fch[1],(int)$fch[2],(int)$fch[0]);
        $rta=getdate($dia);
        // si es festivo,sabado o domingo paselo al otro dia
        switch ($rta['wday']) {
            // domingo,lunes,martes,miercoles,jueves
            case '0':case '1':case '2':case '3':case '4':$date=date("Y-m-d", strtotime($date.' + 1 days'));break;
            // viernes
            case '5':$date=date("Y-m-d", strtotime($date.' + 3 days'));break;
            // sabado
            case '6':$date=date("Y-m-d", strtotime($date.' + 2 days'));break;
        }
        if(!verifiFestivo($date)) $times--;
    }
    return $date;
}

function antDia($date){
    // identifica dia de fecha
    $times=1;
    while ($times>0) {

        $fch=explode('-',$date);
        $dia=mktime(0, 0, 0,(int)$fch[1],(int)$fch[2],(int)$fch[0]);
        $rta=getdate($dia);
        // si es festivo,sabado o domingo paselo al otro dia
        switch ($rta['wday']) {
            // martes,miercoles,jueves,viernes,sabado
            case '2':case '3':case '4':case '5':case '6': $date=date("Y-m-d", strtotime($date.' - 1 days')); break;
            // lunes
            case '1':$date=date("Y-m-d", strtotime($date.' - 3 days'));break;
            // domingo
            case '0':$date=date("Y-m-d", strtotime($date.' - 2 days'));break;
        }
        if(!verifiFestivo($date)) $times--;
    }
    return $date;    
}

function existeDia($date){
    $fc=explode('-',$date);
    // si no existe el dia, retornar fin de mes, si no retorna dia normal
    if(!checkdate((int)$fc[1],(int)$fc[2],(int)$fc[0])){
        $exist=$fc[0].'-'.$fc[1].'-01';
        return date("Y-m-t", strtotime($exist));
    }
    else return $date;
}

function existeD($date){
    $fc=explode('-',$date);
    if(!checkdate((int)$fc[1],(int)$fc[2],(int)$fc[0])) return false;
    else return true;
}

function finMes($date){
    $fin=date("Y-m-t", strtotime($date));//obtener fn de mes
    // comparo con fecha actual
    if(strtotime($date) == strtotime($fin)) return true;
    else return false;
}

function verifiFestivo($date){
    $CI =& get_instance();
    $CI->load->database();
    // si el dia es festivo o fin de semana 
    $fch=explode('-',$date);
    $dia=mktime(0, 0, 0,(int)$fch[1],(int)$fch[2],(int)$fch[0]);
    $rta=getdate($dia);
    // si dia es sabado o domingo
    if($rta['wday']<1 || $rta['wday']>5) return true;
    else{
        // si no es fin de semana verificar si es festivo
        $sql="select fecha from festivos where fecha='$date'";
        $query = $CI->db->query($sql);
        if($query->num_rows()>0) return true;
        else return false;
    }
}

function calcula_dias($fini,$ffin){
    $times=1;
    while ($times>0) {
        // si es festivo,sabado o domingo paselo al otro dia
        if(verifiFestivo($ffin)) $ffin=siguDia($ffin);
        else $times--;
    }
    $today = new DateTime($fini);
    $appt  = new DateTime($ffin);
    $dias=(int)$appt->diff($today)->days;
    return $dias;
}

function addMes($date){
    $f=explode('-',$date);
    $f[1]+=1; //aumento mes
    if($f[1]>12) {
        $f[0]++; //si mes es mayor a 12 , aumento año
        $f[1]='01'; //poner mes a enero
    }
    return $f[0].'-'.str_pad($f[1],2,'0',STR_PAD_LEFT).'-'.str_pad($f[2],2,'0',STR_PAD_LEFT);
}

?>