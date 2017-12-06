<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Items_model extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function galleryEnti($entidad){

        $sql="select ".
        "nombre,tipo ".
        "from img_entidades ".
        "where id_entidad='".escstr($entidad)."'";
        $gen=getQuery($sql);

        $html="<div class='gallery-places text-center'>";
        foreach ($gen as $r) {
            $html.="<div><img style='width: 200px; height: 200px;' src='".
            "http://localhost/cdig/assets/public/img/img_enti/".$entidad."/".$r['nombre'].$r['tipo'].
            "'></div>";
        }
        $html.="</div>";
        return $html;

    }

    function check_avaliable($entidad,$f1,$f2,$tipo){

        $entidad=base64_decode($entidad);
        $sql="select id_calendario from calendario where id_entidad='".escstr($entidad)."' limit 0,1";
        $calendario='';
        if(nRows($sql)>0){
            $gen=oneRow($sql);
            $calendario=$gen->id_calendario;
        }

        $sql="select count(*)as num,max(u.nom_unidad) as nombre,max(deta_desc) as descr,max(uc.precio_normal) as precio".
        " from desc_unidad du ".
        "join unidades u on du.id_unidad=u.id_unidad ".
        "join unidad_calendario uc on du.id_unidad=uc.id_unidad and du.id_calendario=uc.id_calendario ".
        "where du.id_calendario='".escstr($calendario)."' and du.id_unidad ='".escstr($tipo)."' ".
        "and id_desc not in ( select id_desc from reservas where id_estado in ('01','02') ".
        "and id_calendario='".escstr($calendario)."' and (fecha_inicio>='".escstr($f1)."' and fecha_fin<='".escstr($f2)."') ".
        "group by id_desc)";
        
        $gen = getQuery($sql);
        $html='';

        foreach ($gen as $r) {
            $html.="<tr>".
            "<td style='text-align:center' title='Disponibles en este momento' data-id='".escstr($tipo)."'>".escstr($r['num'])."</td>".
            "<td title='Tipo espacio'>".escstr($r['nombre'])."</td>".
            "<td title='Detalle'>".escstr($r['descr'])."</td>".
            "<td title='Precio normal'><b>$".number_format($r['precio'],2,'.',',')."</b></td>".
            "<td><button type='button' class='generarRv btn btn-xs btn-success'>".
            "<span class='fa fa-calendar'></span>&nbsp;reservar ahora!".
            "</button></td>".
            "</tr>";
        }
        return $html;
    }

    function getCat(){

        $sql="select id_categoria,nom_categoria from categorias order by nom_categoria";
        $gen = getQuery($sql);
        $html='';
        foreach ($gen as $row) {
            $html.="<option data-tokens='".escstr($row['nom_categoria'])."' data-id='".escstr($row['id_categoria'])."'>".escstr($row['nom_categoria'])."</option>";
        }
        return $html;

    }

    function parseToXML($htmlStr){
        $xmlStr=str_replace('<','&lt;',$htmlStr);
        $xmlStr=str_replace('>','&gt;',$xmlStr);
        $xmlStr=str_replace('"','&quot;',$xmlStr);
        $xmlStr=str_replace("'",'&#39;',$xmlStr);
        $xmlStr=str_replace("&",'&amp;',$xmlStr);
        return $xmlStr;
    }

    function getDataCity($city){

        $sql="select e.id_entidad,max(ie.nombre) as nombre,max(ie.tipo) as tipo,".
        "max(nom_entidad) as nom_entidad,max(dir_entidad) as dir_entidad,".
        "max(email_entidad) as email_entidad,max(tel_entidad) as tel_entidad,max(descripcion) as descripcion ".
        "from entidad e left join img_entidades ie ".
        "on e.id_entidad=ie.id_entidad where id_muni='".escstr($city)."' and e.tipo='H' group by e.id_entidad";
        return getQuery($sql);

    }

    function getCity($city){
        $sql="select nom_muni from municipio where id_muni=".escstr($city);
        return oneRow($sql);
    }


    function getFilters(){
        $sql="select id_caracter,descripcion,icono from caracteristicas";
        return getQuery($sql);
    }

    function infoEntidad($entidad){

        $sql="select ".
        "nom_entidad,dir_entidad,descripcion,condiciones,longitud,latitud,id_muni ".
        "from entidad ".
        "where id_entidad='".escstr($entidad)."'";
        return oneRow($sql);
        
    }

    function infoCarac($entidad){

        $sql="select descripcion,icono from carac_entidad e ".
        "join caracteristicas c on e.id_caracter=c.id_caracter ".
        "where id_entidad='".escstr($entidad)."'";
        $gen=getQuery($sql);
        $html='<p>';
        foreach ($gen as $r) {
            $html.="<span title='".$r['descripcion']."' class='".$r['icono']."'></span>&nbsp;";
        }
        $html.="</p>";
        return $html;
        
    }

    function infoUnd($entidad){

        $sql="select id_calendario from calendario where id_entidad='".escstr($entidad)."' limit 0,1";
        $calendario='';
        if(nRows($sql)>0){
            $gen=oneRow($sql);
            $calendario=$gen->id_calendario;
        }
        $sql="select u.id_unidad,nom_unidad from unidad_calendario uc ".
        "left join unidades u on uc.id_unidad=u.id_unidad where id_calendario='".escstr($calendario)."'";
        $gen=getQuery($sql);

        $html='';
        foreach ($gen as $r) {
            $html.="<option data-id='".$r['id_unidad']."' data-tokens='".$r['nom_unidad']."'>".$r['nom_unidad']."</option>";
        }
        return $html;
    }

    function infoImg($entidad){

        $sql="select ".
        "nombre,tipo ".
        "from img_entidades ".
        "where id_entidad='".escstr($entidad)."'";
        $gen=getQuery($sql);
        // inicio 

        $html="<div id='carousel-id' class='carousel slide' data-ride='carousel'>".
            "<ol class='carousel-indicators'>";

            $n=0;
            foreach ($gen as $r) {
                $html.="<li data-target='#carousel-id' data-slide-to='".$n."' ";
                if($n==0) $html.="class='active'";
                $html.="></li>";
                $n++;
            }

            $html.="</ol><div class='carousel-inner'>";
            
            $n=0;
            foreach ($gen as $r) {

                $html.="<div class='item ";
                if($n==0)$html.="active";
                $html.="'>".
                "<img data-src='holder.js/900x500/auto/#777:#7a7a7a/text:fside' alt='fside' src='".
                "http://localhost/cdig/assets/public/img/img_enti/".$entidad."/".$r['nombre'].$r['tipo'].
                "'>".
                "<div class='container'><div class='carousel-caption'></div></div></div>";
                $n++;
            }
            
           $html.="</div><a class='left carousel-control' href='#carousel-id' data-slide='prev'><span class='glyphicon glyphicon-chevron-left'></span></a>".
            "<a class='right carousel-control' href='#carousel-id' data-slide='next'><span class='glyphicon glyphicon-chevron-right'></span></a>".
        "</div>";

        return $html;
    }

    function getMapData(){

        // Select all the rows in the markers table
        $sql = "select nom_entidad,dir_entidad,longitud,latitud,'hotel' as tipo from entidad where tipo='H'";
        $gen = getQuery($sql);

        header("Content-type: text/xml");

        // Start XML file, echo parent node
        echo '<markers>';

            // Iterate through the rows, printing XML nodes for each
            foreach ($gen as $row) {
                 # code..
              // Add to XML document node
              echo '<marker ';
              echo 'name="' . $this->parseToXML($row['nom_entidad']) . '" ';
              echo 'address="' . $this->parseToXML($row['dir_entidad']) . '" ';
              echo 'lat="' . $row['latitud'] . '" ';
              echo 'lng="' . $row['longitud'] . '" ';
              echo 'type="' . $this->parseToXML($row['tipo']) . '" ';
              echo '/>';
            }

            // End XML file
            echo '</markers>';


    }


}

?>
