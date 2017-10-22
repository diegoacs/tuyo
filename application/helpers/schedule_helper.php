<?php

    // verificar disponibilidad de habitaciones en calendario para esa fecha
    function verifica_disponible($id,$fecha){

        $CI =& get_instance();
        $sql="select id_reserva from reservas ".
        "where id_calendario='".$CI->session->cal_act."' and id_desc=".$id.
        " and id_estado='02' and (fecha_fin <='".$fecha."' or fecha_inicio>='".$fecha."')";
        $rta=nRows($sql);
        return $rta;
    }


    function get_price($id){

        $CI =& get_instance();

        $sql="SELECT ".
        "du.id_desc,du.precio_alt,tc.tipo_cobro,tc.hora,tc.fraccion,tc.hrs_despues,tc.hrs_min,tc.vr_min, ".
        "precio_normal, ".
        "TIMESTAMP(r.fecha_inicio,r.hrs_inicio) AS inicio, ".
        "TIMESTAMP(r.fecha_inicio,hora) AS checkin, ".
        "CURRENT_TIMESTAMP() AS fin, ".
        "TIMESTAMP(CURRENT_DATE(),hora) AS checkout, ".
        "TIMESTAMP(CURRENT_DATE(),hrs_despues) AS limite, ".
        "DATEDIFF(TIMESTAMP(CURRENT_DATE(),hora),TIMESTAMP(r.fecha_inicio,hora)) as dias, ".
        "TIMESTAMPDIFF(SECOND,TIMESTAMP(r.fecha_inicio,r.hrs_inicio),CURRENT_TIMESTAMP())/3600 as horas, ".
        "TIMESTAMPDIFF(second,TIMESTAMP(CURRENT_DATE(),hrs_despues),CURRENT_TIMESTAMP())/3600 as dif_horas ".
        "FROM desc_unidad du ".
        "JOIN unidad_calendario uc ON du.id_unidad=uc.id_unidad AND du.id_calendario=uc.id_calendario ".
        "JOIN unidades un ON uc.id_unidad=un.id_unidad ".
        "JOIN tipo_cobro tc ON un.id_categoria=tc.id_categoria AND du.id_calendario=tc.id_calendario ".
        "JOIN calendario c ON du.id_calendario=c.id_calendario ".
        "JOIN reservas r ON du.id_desc=r.id_desc AND du.id_calendario=r.id_calendario ".
        "WHERE r.id_reserva='".$id."' ".
        "ORDER BY r.id_reserva ";

        $row=oneRow($sql);

        $dias=(int)$row->dias;
        $valor=$row->precio_normal;

        //buscar si hay precio alternativo
        if($row->precio_alt > 0 )$valor=$row->precio_alt;

        $minimo=$row->vr_min;
        $inicio=$row->inicio;
        $chkin=$row->checkin;
        $fin=$row->fin;
        $chkout=$row->checkout;
        $horas=$row->horas;
        $hrs_min=$row->hrs_min;
        $cobro=$row->tipo_cobro;
        $fraccion=$row->fraccion;
        $diferencia=$row->dif_horas;
        $adicionales=0;
        // verificar tiempo si es para un ratico ;)
        // entonces se le cobra solo el ratico ;)
        if((int)$horas <= $hrs_min) {

            // solo aplica el cobro de ratico ;) si es por checkout
            if($cobro=='C'){
                $vr_total=$minimo; 
                return array($vr_total,$adicionales);
            }
        }

        // si el inicio esta antes de la hora de checkin
        // le sumamos un dia
        // ejemplo (entrada: 24-09-2017 06:15:00 - checkin 24-09-2017 14:00:00)
        // de 06:15 a 14:00 es un dia.
        if(strtotime($inicio)<strtotime($chkin)) $dias+=1;

        // Si cobro es por checkout
        if($cobro=='C'){
            //valor de los dias
            $vr_total=$dias*$valor;
            // si hay horas de diferencia - le sumo multa de fraccion por hora
            if($diferencia > 0){
                //paso a entero, para que queden horas completas
                $diferencia=ceil($diferencia);
                // multiplicar horas por valor de fraccion
                $adicionales=$diferencia*$fraccion;
                // agragarla a valor total
                return array($vr_total,$adicionales);
            }
            else return array($vr_total,$adicionales);
        }
        // si tipo de cobro es por horas 'H'
        else {
            // multiplico horas por valor
            $vr_total=ceil($horas)*$valor;
            return array($vr_total,$adicionales);
        }

    }


?>
