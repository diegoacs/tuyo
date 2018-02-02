$(document).ready(function(){


    //get all values from form
    function obtainValues(){

        //crear array para guardar filas

        var fila = { datos: [] };

        fila['nombre'] = encodeURI($("#nombreusr").val());

        fila['mail'] = encodeURI($("#mailuser").val());

        fila['entidad'] = encodeURI($("#nombreentidad").val());

        fila['tipo'] = encodeURI($("#tipo_establecimiento").val());

        fila['telefono'] = encodeURI($("#telefonoentidad").val());

        fila['mailentidad'] = encodeURI($("#emailentidad").val());

        fila['pais'] = encodeURI($("#pais").val());

        fila['dept'] = encodeURI($("#departamento").val());

        fila['ciudad'] = encodeURI($("#ciudad").val());

        fila['direccion'] = encodeURI($("#direccionentidad").val());

        var geo = encodeURI($("#latlng").val()).split(',');

        fila['lat'] = geo[0];

        fila['long'] = geo[1];

        fila['entrada'] = encodeURI($("#entrada").val());

        fila['desde'] = encodeURI($("#salidadesde").val());

        fila['hasta'] = encodeURI($("#salidahasta").val());

        fila['caract'] = encodeURI($("#caracteristicas").val());

        // habitaciones creadas

        $(".table-concept .table-concept-show tr").each(function(){

            var obj = {};

            obj['cantidad'] = $(this).find('.cantidad').text();
            obj['categoria'] = $(this).find('.categoria').data('id');
            obj['unidad'] = $(this).find('.tipo').data('id');
            obj['personas'] = $(this).find('.personas').text();
            obj['precio'] = $(this).find('.precio').text();
            obj['nombre'] = $(this).find('.nombre').text();

            fila.datos.push(obj);

        });

        // adicionales

        var add = '';

        $('.adicional').each(function(){

            if($(this).is(':checked')) add += ','+$(this).val();

        });

        fila['add'] = add ;
        
        return fila;

    }

    $('#selall').click(function() {
        $('#caracteristicas option').prop('selected', true);
    });

    $('#desall').click(function() {
        $('#caracteristicas option').prop('selected', false);
    });

    $("#pais").change(function(){

        ajax_rqs('id='+encodeURI($(this).val()),route+'Signup/changepais','POST','text',function(r){
            if(r!='ERRINC'){
                var rta=r.split(String.fromCharCode(9));
                if(rta[0]=='1'){
                    $("#departamento").html(rta[1]);
                }
                else alert(rta[1]);
            }
            else alert('Error en proceso.');        
        });

    });

    $("#departamento").change(function(){

        ajax_rqs('id='+encodeURI($(this).val()),route+'Signup/changedept','POST','text',function(r){
            if(r!='ERRINC'){
                var rta=r.split(String.fromCharCode(9));
                if(rta[0]=='1'){
                    $("#ciudad").html(rta[1]);
                }
                else alert(rta[1]);
            }
            else alert('Error en proceso.');        
        });
    });

    $("#categoria").change(function(){

        ajax_rqs('id='+encodeURI($(this).val()),route+'Signup/changeund','POST','text',function(r){
            if(r!='ERRINC'){
                var rta=r.split(String.fromCharCode(9));
                if(rta[0]=='1'){
                    $("#unidad").html(rta[1]);
                }
                else alert(rta[1]);
            }
            else alert('Error en proceso.');        
        });
    });

    function addRow(vals){

        var row="<tr>";
        row+="<td class='cantidad chgn'>"+parseInt(vals[0],10)+"</td>";
        row+="<td class='nombre chgt'>"+vals[1]+"</td>";
        row+="<td class='categoria' data-id='"+vals[7]+"'>"+vals[6]+"</td>";        
        row+="<td class='tipo' data-id='"+vals[5]+"'>";
        row+="<select class='selhidden' style='display:none'>"+$('#unidad').html()+"<select>";
        row+="<span class='name_und'>"+vals[4]+"</span>";
        row+="</td>";        
        row+="<td class='personas chgn'>"+parseInt(vals[2],10)+"</td>";
        row+="<td class='precio chgn'>"+parseFloat(vals[3])+"</td>";
        row+="<td class='acciones'><button class='btn btn-xs btn-danger eliminar'>";
        row+="<span class='fa fa-close'></span></button></td>";
        row+="</tr>";

        return row;

    }


    //table manage
    $('#add-room').click(function() {

        if(!$.trim($('#cantidadhab').val()) || parseInt($('#cantidadhab').val(),10)=='0'){
            alert('Falta cantidad.');
            return false;
        }

        if(!$.trim($('#capacidad').val())) $('#capacidad').val('0');

        if(!$.trim($('#preciounidad').val())) $('#preciounidad').val('0');


        var valores =[$('#cantidadhab').val(),
        $('#nombrehab').val(),
        $('#capacidad').val(),
        $('#preciounidad').val(),
        $('#unidad option:selected').text(),
        $('#unidad option:selected').val(),
        $('#categoria option:selected').text(),
        $('#categoria option:selected').val()

        ];

        var n = $('.table-concept-show tr').length;

        if(n>0){
            
            $('.table-concept > tbody > tr:first').before(addRow(valores));

        }
        else{
            
            $('.table-concept-show').html(addRow(valores));

        }

    });

    // delete own row
    $(document).on('click','.table-concept-show .eliminar',function(){

        $(this).closest('tr').remove();
    });

    // modify the value
    $(document).on('click','.table-concept-show .chgn',function(){

        $(this).html("<input type='text' class='chgtext' value='"+$(this).text()+"'>");

        $(document).find('.chgtext').number(true,2);

        $(document).find('.chgtext').focus();

    });

    $(document).on('click','.table-concept-show .chgt',function(){

        $(this).html("<input type='text' class='chgtx' value='"+$(this).text()+"'>");

        $(document).find('.chgtx').focus();

    });

    $(document).on('click','.table-concept-show .tipo',function(){

        $(this).find('.name_und').text('');

        $(this).find('.selhidden').val($(this).data('id'));

        $(this).find('.selhidden').show();

        $(this).find('.selhidden').focus();

    });

    // finish modify
    $(document).on('keypress','.table-concept-show .chgtext',function(e){

        if(e.keyCode==13){

            if(!$.trim($(this).val())) return false;
            
            $(this).closest('td').html(parseInt($(this).val(),10));
        
        }

    });

    $(document).on('keypress','.table-concept-show .chgtx',function(e){

        if(e.keyCode==13){

            if(!$.trim($(this).val())) return false;
            
            $(this).closest('td').html($(this).val());
        
        }

    });

    $(document).on('keypress','.table-concept-show .selhidden',function(e){

        if(e.keyCode==13){


            $(this).closest('.tipo').find('.name_und').text($('option:selected',this ).text());

            $(this).closest('.tipo').attr('data-id',$('option:selected',this ).val());
        
            $(this).hide();
        }

    });



    //ok register

    $("#saveentidad").click(function(){


        if(!$("#info").is(':checked')){

            alert('Debe aceptar las condiciones del servicio.');
            return false;

        }

        // validaciones por paneles

        if(!validate_1()){

            alert("Existen campos vacios en panel información personal.")
            return false;

        }

        if(!validate_2()){

            alert("Existen campos vacios en panel información general.")
            return false;

        }

        if(!validate_3()){

            alert("Existen campos vacios en panel información de horarios.")
            return false;

        }

        if(!validate_4()){

            alert("Existen campos vacios en panel ubicación geografica.")
            return false;

        }

        if($('.table-concept-show tr').length < 1){

            alert("Debe al menos ingresar información de una habitación.");
            return false;
        }

        var form = obtainValues();

        ajax_rqs({ 'data': JSON.stringify(form) },route+'Signup/savenewplace','POST','text',function(r){

            if(r!='ERRINC'){

                $('.texto-msg').html(''); 

                var rta=r.split(String.fromCharCode(9));

                if(rta[0]=='1'){

                    alert(rta[1]);

                    reload.location
                }
                else {

                    $('.texto-msg').html(rta[1]); 

                }
            }
            else alert('Error en proceso.');  

        });

    });



    function validate_1(){

        if(!$.trim($('#nombreusr').val()) || !$.trim($('#mailuser').val())) return false;
        else return true;
    }

    function validate_2(){

        var rta;
        if(!$.trim($('#nombreentidad').val())) rta=false;
        else rta=true;

        if(!$.trim($('#telefonoentidad').val()) || !$.trim($('#emailentidad').val())) rta=false;
        else rta=true;

        return rta;
    }

    function validate_3(){

        var rta;
        if(!$.trim($('#entrada').val())) rta=false;
        else rta=true;

        if(!$.trim($('#salidadesde').val()) || !$.trim($('#salidahasta').val())) rta=false;
        else rta=true;

        return rta;
    }

    function validate_4(){

        var rta;
        if(!$.trim($('#direccionentidad').val())) rta=false;
        else rta=true;

        if(!$.trim($('#latlng').val())) rta=false;
        else rta=true;

        return rta;

    }


});