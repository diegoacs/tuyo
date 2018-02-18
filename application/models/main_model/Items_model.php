<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Items_model extends CI_Model {
    function __construct(){
        parent::__construct();
        $this->load->database();
    }


    function saveInfo($data){

        iniTr();
        $info = array();
        // buscar datos de entidad
        $sql="select nom_entidad from entidad where id_entidad='".escstr(base64_decode($data['ent']))."'";
        $gen = oneRow($sql);
        $info['entidad'] = $gen->nom_entidad;
        // buscar datos de unidad
        $sql="select nom_unidad from unidades where id_unidad='".escstr(base64_decode($data['und']))."'";
        $gen = oneRow($sql);
        $info['unidad'] = $gen->nom_unidad;        

        if(!trim($data['coment'])) $data['coment']='null';
        else $data['coment']="'".escstr($data['coment'])."'";

        // guardar datos de consulta para futuras promociones
        $sql="insert into info_contacto (nombres,telefono,email,comentarios,id_entidad,id_unidad) ".
        "values ('".escstr($data['name'])."','".escstr($data['telefono'])."','".escstr($data['email']).
        "',".$data['coment'].",'".escstr(base64_decode($data['ent']))."','".escstr(base64_decode($data['und']))."')";
        if(!exeQuery($sql)){
            rollTr();
            $info['rta']='2';
            return $info;
        }
        $info['id']=$this->db->insert_id();
        $info['rta']='1';
        endTr();
        return $info;
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


    function check_search_filter($data){

        // buscar categoria
        // $sql="select id_categoria from categorias where nom_categoria='".escstr($data['categoria'])."'";
        // $gen=oneRow($sql);
        // $data['categoria']=$gen->id_categoria;
        // buscar ciudad 
        $sql="select id_muni from municipio where nom_muni like '%".$this->db->escape_like_str($data['ciudad'])."%' escape '!' ";
        $gen=getQuery($sql);
        $city=array();
        foreach ($gen as $row) {
            $city[]=$row['id_muni'];
        }

        if(!trim($data['fecha1'])) $data['fecha1']=date('Ymd');
        if(!trim($data['fecha2'])) $data['fecha2']=date('Ymd');

        $sql="select count(*)as num,max(u.nom_unidad) as nombre,max(du.id_unidad) as idund,".
        "max(deta_desc) as descr,max(uc.precio_normal) as precio,du.id_calendario,max(e.nom_entidad) as nom_entidad, ".
        "max(e.id_entidad) as id_entidad, max(e.id_muni) as id_muni ".
        "from desc_unidad du left join unidades u on du.id_unidad=u.id_unidad ".
        "left join calendario c on du.id_calendario=c.id_calendario ".
        "join unidad_calendario uc on du.id_unidad=uc.id_unidad and du.id_calendario=uc.id_calendario ".
        "left join entidad e on c.id_entidad=e.id_entidad ".
        "join carac_entidad ce on e.id_entidad=ce.id_entidad ".
        "where du.id_unidad in ( ".
        "select id_unidad from unidades where id_categoria=".escstr($data['categoria']).") ".
        "and id_desc not in ( ".
        "select id_desc from reservas where id_estado in ('01','02') and (fecha_inicio>='".escstr($data['fecha1']).
        "' and fecha_fin<='".escstr($data['fecha2'])."') ".
        "group by id_desc) and activo = 'S' and e.id_muni in ('".implode("','",$city)."') ".
        "and e.tipo='H' ";

        if(trim($data['caracteristica'])) $sql="and ce.id_caracter in (".$data['caracteristica'].") ";

        $sql.="group by du.id_unidad,du.id_calendario";

        $gen = getQuery($sql);
        $html='';

        if(nRows($sql)<1){
            $html.="<tr>".
            "<td colspan='6'><div class='alert alert-info'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                No encontramos resultados para su busqueda, intente de nuevo.
            </div> </td>".
            "</tr>";
        }
        else{
            foreach ($gen as $r) {
                $html.="<tr data-id='".base64_encode($r['idund'])."' data-enti='".base64_encode($r['id_entidad'])."'>".
                "<td style='text-align:center' title='Disponibles en este momento'>".escstr($r['num'])."</td>".
                "<td title='Tipo espacio'>".escstr($r['nombre'])."</td>".
                "<td title='Detalle'>".escstr($r['descr'])."</td>".
                "<td title='Precio normal'><b>$".number_format($r['precio'],2,'.',',')."</b></td>".
                "<td title='Lugar'><a href='".base_url('index.php/Panel_ini/productDetals/'.$r['id_entidad'].'/'.$r['id_muni'])."'>".$r['nom_entidad']."</a></td>".
                "<td><a class='generarRv btn btn-xs btn-success' data-toggle='modal' href='#formRv'>".
                "<span class='fa fa-calendar'></span>&nbsp;reservar ahora!".
                "</a></td>".
                "</tr>";
            }
        }
        return $html;

    }

    function check_search($data){

        // buscar categoria
        $sql="select id_categoria from categorias where nom_categoria='".escstr($data['categoria'])."'";
        $gen=oneRow($sql);
        $data['categoria']=$gen->id_categoria;
        // buscar ciudad 
        $sql="select id_muni from municipio where nom_muni like '%".$this->db->escape_like_str($data['ciudad'])."%' escape '!' ";
        $gen=getQuery($sql);
        $city=array();
        foreach ($gen as $row) {
            $city[]=$row['id_muni'];
        }

        if(!trim($data['fecha1'])) $data['fecha1']=date('Ymd');
        if(!trim($data['fecha2'])) $data['fecha2']=date('Ymd');

        $sql="select count(*)as num,max(u.nom_unidad) as nombre,".
        "max(deta_desc) as descr,max(uc.precio_normal) as precio,du.id_calendario,max(e.nom_entidad) as nom_entidad, ".
        "max(e.id_entidad) as id_entidad, max(e.id_muni) as id_muni, max(mn.nom_muni) as nom_muni,".
        "max(e.descripcion) as descrip, max(e.condiciones) as condic ".
        "from desc_unidad du left join unidades u on du.id_unidad=u.id_unidad ".
        "left join calendario c on du.id_calendario=c.id_calendario ".
        "join unidad_calendario uc on du.id_unidad=uc.id_unidad and du.id_calendario=uc.id_calendario ".
        "left join entidad e on c.id_entidad=e.id_entidad ".
        "join municipio mn on e.id_muni=mn.id_muni ".
        "where du.id_unidad in ( ".
        "select id_unidad from unidades where id_categoria=".escstr($data['categoria']).") ".
        "and id_desc not in ( ".
        "select id_desc from reservas where id_estado in ('01','02') and (fecha_inicio>='".escstr($data['fecha1']).
        "' and fecha_fin<='".escstr($data['fecha2'])."') ".
        "group by id_desc) and activo = 'S' and e.id_muni in ('".implode("','",$city)."') ".
        "and e.tipo='H' group by du.id_calendario";

        return getQuery($sql);

        //         if(nRows($sql)<1){
        //     $html.="<tr>".
        //     "<td colspan='6'><div class='alert alert-info'>
        //         <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        //         No encontramos resultados para su busqueda, intente de nuevo.
        //     </div> </td>".
        //     "</tr>";
        // }
        // else{
        //     foreach ($gen as $r) {
        //         $html.="<tr data-id='".base64_encode($r['idund'])."' data-enti='".base64_encode($r['id_entidad'])."'>".
        //         "<td style='text-align:center' title='Disponibles en este momento'>".escstr($r['num'])."</td>".
        //         "<td title='Tipo espacio'>".escstr($r['nombre'])."</td>".
        //         "<td title='Detalle'>".escstr($r['descr'])."</td>".
        //         "<td title='Precio normal'><b>$".number_format($r['precio'],2,'.',',')."</b></td>".
        //         "<td title='Lugar'><a href='".base_url('index.php/Panel_ini/productDetals/'.$r['id_entidad'].'/'.$r['id_muni'])."'>".$r['nom_entidad']."</a></td>".
        //         "<td><a class='generarRv btn btn-xs btn-success' data-toggle='modal' href='#formRv'>".
        //         "<span class='fa fa-calendar'></span>&nbsp;reservar ahora!".
        //         "</a></td>".
        //         "</tr>";
        //     }
        // }
        // return $html;
        

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

        if(nRows($sql)<1){
            $html.="<tr>".
            "<td colspan='5'><div class='alert alert-info'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                No encontramos resultados para su busqueda, intente de nuevo.
            </div> </td>".
            "</tr>";
        }
        else{
            foreach ($gen as $r) {
                $html.="<tr data-id='".base64_encode($tipo)."' data-enti='".base64_encode($entidad)."'>".
                "<td style='text-align:center' title='Disponibles en este momento' >".escstr($r['num'])."</td>".
                "<td title='Tipo espacio'>".escstr($r['nombre'])."</td>".
                "<td title='Detalle'>".escstr($r['descr'])."</td>".
                "<td title='Precio normal'><b>$".number_format($r['precio'],2,'.',',')."</b></td>".
                "<td><a data-toggle='modal' href='#formRv' class='generarRv btn btn-xs btn-success'>".
                "<span class='fa fa-calendar'></span>&nbsp;reservar ahora!".
                "</a></td>".
                "</tr>";
            }
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

    function getDataCityChar($data){

        // buscar ciudad 
        $sql="select id_muni from municipio where nom_muni like '%".$this->db->escape_like_str($data['ciudad'])."%' escape '!' ";
        $gen=getQuery($sql);
        $city=array();
        foreach ($gen as $row) {
            $city[]=$row['id_muni'];
        }

        if(!trim($data['fecha1'])) $data['fecha1']=date('Ymd');
        if(!trim($data['fecha2'])) $data['fecha2']=date('Ymd');

        $sql="select e.id_entidad,max(ie.nombre) as nombre,max(ie.tipo) as tipo,".
        "max(nom_entidad) as nom_entidad,max(dir_entidad) as dir_entidad,".
        "max(email_entidad) as email_entidad,max(tel_entidad) as tel_entidad,".
        "max(descripcion) as descripcion,max(id_muni) as idcity ".
        "from desc_unidad du left join unidades u on du.id_unidad=u.id_unidad ".
        "left join calendario c on du.id_calendario=c.id_calendario ".
        "join unidad_calendario uc on du.id_unidad=uc.id_unidad and du.id_calendario=uc.id_calendario ".
        "left join entidad e on c.id_entidad=e.id_entidad ".
        "join img_entidades ie ".
        "on e.id_entidad=ie.id_entidad ".
        "join carac_entidad ce ".
        "on e.id_entidad=ce.id_entidad ".
        "where du.id_unidad in ( ".
        "select id_unidad from unidades where id_categoria=".escstr($data['categoria']).") ".
        "and id_desc not in ( ".
        "select id_desc from reservas where id_estado in ('01','02') and (fecha_inicio>='".escstr($data['fecha1']).
        "' and fecha_fin<='".escstr($data['fecha2'])."') ".
        "group by id_desc) and activo = 'S' and e.id_muni in (".implode(',',$city).") ".
        "and e.tipo='H' ";

        if(trim($data['caracteristica'])) $sql="and ce.id_caracter in (".$data['caracteristica'].") ";

        $sql.="group by du.id_unidad,du.id_calendario";


        $gen = getQuery($sql);

        if(nRows($sql)<1){
            $html="<br> <div class='alert alert-info'>".
                "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".
                "No encontramos resultados para su busqueda, intente de nuevo.".
                "</div> ";
        }
        else $html='';

        foreach ($gen as $row) {
            $html.="
            <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 destaca'>
                <div class='media'>
                    <div class='media-left'>
                        <a href='#'>
                            <img class='media-object img-oferta' 
                            src='http://localhost/cdig/assets/public/img/img_enti/".$row['id_entidad']."/".
                            $row['nombre']."_thumb".$row['tipo']."' alt='".$row['nom_entidad']."'>
                        </a>
                    </div>
                    <div class='media-body'>
                        <h4 class='media-heading'><span class='fa fa-bookmark-o text-title'></span>&nbsp;".$row['nom_entidad']."</h4>
                        <span class='fa fa-star color-star'></span>
                        <span class='fa fa-star color-star'></span>
                        <span class='fa fa-star color-star'></span>
                        <span class='fa fa-star color-star'></span>
                        <span class='fa fa-star-o color-star'></span>
                        4.3
                        <p class='text-paragraph mright'>".$row['descripcion']."</p>
                        <br>

                        <a href=".base_url('index.php/Panel_ini/productDetals/'.$row['id_entidad'].'/'.$row['idcity']).">
                        <span class='fa fa-chevron-circle-right text-title'></span>&nbsp;ver más</a>
                        <div class='text-right mright'>
                            <a href='#'><span class='fa fa-comments-o'></span>&nbsp;comentarios</a>
                        </div>


                    </div>
                </div>
            </div>";
        }
        return $html;

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
