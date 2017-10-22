<?php

function regenpago($data){

  $CI =& get_instance();
  $CI->load->database();
  $actual_enti=$CI->session->userdata('act_enti');

  // Datos enviados desde el modelo
  $id_info=$data['id'];
  $tipo=$data['tipo'];
  $abono=$data['vr_abo'];
  $total_cuo=$data['total_cuo'];
  $cuota=$data['cuo'];

  //generacion de financiacion
  $values_genera_cuotas=array(); //donde iran los

  $sql="update calendario_pagos set saldo_capital=saldo_capital-".$abono." where
   num_cuota='".$cuota."' and id_informacion='".$id_info."'";
  $CI->db->query($sql);
  $nw_cuota=$cuota+1;
  $sql="update calendario_pagos set capital_antes=capital_antes-".$abono." where
   num_cuota='".$nw_cuota."' and id_informacion='".$id_info."'";
  $CI->db->query($sql);

  $sql="select tasa,cuota_fija,vr_cuota_fija from informacion_financiacion where id_informacion='".$id_info."'";
  $query=$CI->db->query($sql);
  $row=$query->row();
  $intr=$row->tasa;
  $fija=$row->cuota_fija;
  $vr_fija=$row->vr_cuota_fija;

  $sql="select fch_cuota from calendario_pagos where num_cuota='".$cuota."' and id_informacion='".$id_info."'";
  $query=$CI->db->query($sql);
  $row=$query->row();
  $fch_ini=$row->fch_cuota;
  $n=0;
  $sql="select num_cuota,capital_antes,fch_cuota,valor_cuota from calendario_pagos where num_cuota>'".$cuota."' and id_informacion='".$id_info."'";
  $query=$CI->db->query($sql);
  foreach ($query->result_array() as $row)
  {
    $n++;
    if ($fija=='S')
    {
        $fch_nueva=date("Y-m-d", strtotime("$fch_ini +1 month"));//genera el nuevo mes
        //generar intereses
        if($n<1)$valor=(int)$row['capital_antes'];
        $intr=$intr/100;
        $intr=$intr*$valor;
        $intr=$intr/30;
        //diferencia de dias en fechas
        $today = new DateTime($fch_ini);
        $appt  = new DateTime($fch_nueva);
        $dias=(int)$appt->diff($today)->days;
        $intr=$intr*$dias;

        //generar abono a capital
        if($valor < $vr_fija)
        {
          $abono_capital=$valor;
          $vr_fija=$abono_capital+$intr;
        }
        else $abono_capital=$vr_fija-$intr;
        $saldo_capital=$valor-$abono_capital;

        $values_genera_cuotas[]="update calendario_pagos
        set capital_antes=".number_format($valor,2,'.','').",saldo_capital=".number_format($saldo_capital,2,'.','').",
        abono_capital=".number_format($abono_capital,2,'.','').",interes=".number_format($intr,2,'.','').",
        valor_cuota=".number_format($row['valor_cuota'],2,'.','')." where id_informacion='".$id_info."' and num_cuota='".$cuota."'";
        $n_cuo=$row['num_cuota']+1;
        $values_genera_cuotas[]="update calendario_pagos
        set capital_antes=".number_format($saldo_capital,2,'.','')." where id_informacion='".$id_info."' and num_cuota='".$n_cuo."'";

        $fch_ini=$fch_nueva;
        $valor=$saldo_capital;
        if($valor<0)$valor=0;
    }
    else
    {
      $fch_nueva=date("Y-m-d", strtotime("$fch_ini +1 month"));//genera el nuevo mes
      //generar intereses
      if($n<1)$valor=(int)$row['capital_antes'];
      $intr=$intr/100;
      $intr=$intr*$valor;
      $intr=$intr/30;
      //diferencia de dias en fechas
      $today = new DateTime($fch_ini);
      $appt  = new DateTime($fch_nueva);
      $dias=(int)$appt->diff($today)->days;
      $intr=$intr*$dias;

      $saldo_capital=$valor-$abono_capital;
      $row['valor_cuota']=$interes+$abono_capital;

      //generar nuevos valores para el proximo while

      $values_genera_cuotas[]="update calendario_pagos
      set capital_antes=".number_format($valor,2,'.','').",saldo_capital=".number_format($saldo_capital,2,'.','').",
      abono_capital=".number_format($abono_capital,2,'.','').",interes=".number_format($intr,2,'.','').",
      valor_cuota=".number_format($row['valor_cuota'],2,'.','')." where id_informacion='".$id_info."' and num_cuota='".$cuota."'";

      $n_cuo=$row['num_cuota']+1;
      $values_genera_cuotas[]="update calendario_pagos
      set capital_antes=".number_format($saldo_capital,2,'.','')." where id_informacion='".$id_info."' and num_cuota='".$n_cuo."'";

      $fch_ini=$fch_nueva;
      $valor=$saldo_capital;
      if($valor<0)$valor=0;
    }
  }
  foreach ($values_genera_cuotas as $value) $this->db->query($value);
}


 ?>
