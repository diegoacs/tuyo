<?php


//funcion para registrar valores en PUC 

function registra_pagos($iGral,$iMora,$capital){

    $CI =& get_instance();
    $CI->load->database();


}


//efectivo anual actual

function getEf_anual(){

    $CI =& get_instance();

    $sql="select valor from efectivo_anual where activo='S' ".
    "and id_entidad='".$CI->session->act_enti."'";
    $rta=oneRow($sql);

    return $rta->valor;

}


// funcion para obtener mora de interes genral, mora por dias
function genera_mora($vrcuota,$efectivo_anual,$dias){


    $rta=(pow((1+$efectivo_anual/100),(1/365))-1)*365;
    $rta=($rta)/365;
    $rta=1+pow($rta,1);
    $rta=$vrcuota*(($rta)-1);
    $rta=number_format($rta,2);

    $total=$rta*$dias;


    //valores a retornar: valores total mora, valor diario de la mora
    return array(ceil($total),$rta);

}



function genera_interes($capital,$interes,$tcobro,$ini,$fin,$modo_calculo='S'){



    //modo_calculo: si es 'S' quiere decir que esta generando proyeccion mas o financiacion
    //modo_calculo: si es 'N' quiere decir que esta generando intereses para mora

    //si es modo N , entonces pasamos cobrar dias
    if($modo_calculo=='N') $tcobro='D';

    // valor: valor para calcular el interes
    // interes: tasa de interes a generar
    // tcobro: tipo de cobro G general cobro de 30 dias , D dias cobro de dias de mes (Febrero 28-29 dias) , F festivos
    // cobro de dias tomando en cuenta los festivos, dias habiles
    // ini: fecha inicial
    // fin: fecha final

    $CI =& get_instance();
    $CI->load->database();

    // verificando dia si existe, si no existe entonces generar el ultimo dia del mes.

    $fch_nueva=existeDia($fin);

    if($tcobro=='G'){

        // cobro general 30 dias mensual siempre
        $valor_interes=$capital*$interes;
        $dias=30;

    }

    else if($tcobro=='D'){

        // cobro por dias de mes (ejemplo febrero 28-29 dias)
        $dias=diferencia_dias($ini,$fch_nueva);
        $valor_interes=calcula_dias_interes($interes,$capital,$dias);

    }

    else{

        // cobro teniendo en cuenta festivos y dias habiles

        if(finMes($fch_nueva)){

            // si es fin de mes, verifique si fecha es festivo o no

            if(verifiFestivo($fch_nueva)){

                $fch_nueva=antDia($fch_nueva);

            }

        }

        else{

            // si es fin de mes, verifique si fecha es festivo o no

            if(verifiFestivo($fch_nueva)){

                $fch_nueva=siguDia($fch_nueva);

            }
        }

        $dias=diferencia_dias($ini,$fch_nueva);

        $valor_interes=calcula_dias_interes($interes,$capital,$dias);

    }

    // devuelve la fecha nueva de corte y el valor del interes redondeado.

    return array($fch_nueva,ceil($valor_interes),$dias);

}


//retorna informacion de financiacion
function getDataInfo($id,$entidad){


    $CI =& get_instance();
    $CI->load->database();


    $sql="select plazo,cuota_fija,valor_financia,vr_cuota_fija,tasa,mora,tipo_int,tcobro from informacion_financiacion ".

    "where id_informacion='".$CI->db->escape_str($id)."' and id_entidad='".$CI->db->escape_str($entidad)."'";

    $query = $CI->db->query($sql);
    $row=$query->row();


    return array('interes' => $row->tasa,
                'plazo' => 0,
                'otro_plazo' => $row->plazo,
                'cuotafija' => $row->cuota_fija,
                'total_cuota' => $row->valor_financia,
                'estimado_cuota' => $row->vr_cuota_fija,
                'mora' => $row->mora,
                'tipo_int' => $row->tipo_int,
                'tcobro' => $row->tcobro
                );
    
}

?>
