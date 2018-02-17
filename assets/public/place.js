$(document).ready(function(){



    $('#sel_unds').change(function(){

        ajax_rqs('id='+encodeURI($(this).val()),route+'Places_admin/chnunds','POST','text',function(r){
            if(r!='ERRINC'){
                if(r){
                    
                    $('.table-hab-show').html(r);
                }
            }
            else alert('Error en proceso.');        
        });

    });


    $(document).on('click','.table-unidades-show .deta-edit',function(){

        $(this).html("<textarea row='10' class='editdeta'>"+$(this).text()+"</textarea>");

        $(document).find('.editdeta').focus();

    });


    $(document).on('keypress','.table-unidades-show .editdeta',function(e){

        if(e.keyCode==13){

            if(!$.trim($(this).val())) return false;

            var id = $(this).closest('tr').data('id');
          
            ajax_rqs('id='+encodeURI(id)+'&deta='+encodeURI($(this).val()),route+'Places_admin/editdeta','POST','text',function(r){

                if(r!='ERRINC'){

                    $('.texto-msg').html(''); 

                    var rta=r.split(String.fromCharCode(9));

                    if(rta[0]=='1'){

                        alert(rta[1]);

                        location.reload();

                    }
                    else alert(rta[1]);
                }
                else alert('Error en proceso.');  

            });
        
        }

    });


    $('.img-gallery').slick({

        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 800,
        arrows: false,

    });


    $('.img-linked').click(function(){

        var src = $(this).find('.img-mini').attr('src');
        var id = $(this).find('.img-mini').data('id');
        $('.id-img-see').val(id);
        $('.watch-img').attr('src',src);
    });


    $(".delete-img").click(function(){

        ajax_rqs('id='+encodeURI($('.id-img-see').val()),route+'Places_admin/deleteimg','POST','text',function(r){
            if(r!='ERRINC'){
                var rta=r.split(String.fromCharCode(9));
                if(rta[0]=='1'){
                    location.reload();
                }
            }
            else alert('Error en proceso.');        
        });

    });


    $(".saveImg").click(function(){
        uploadAjax();
    });

    function uploadAjax(){

        if($("#nomimg").val()==''){
            alertMsg('Ingrese un nombre al archivo.');
            return false;
        }

        if($("#getimg").val()==''){
            alertMsg('Falta seleccionar archivo.');
            return false;
        }

        var inputFileImage = document.getElementById("getimg");
        var file = inputFileImage.files[0];
        var data = new FormData();
        data.append('nomimg',$("#nomimg").val());
        data.append('archivo',file);

        $.ajax({

            url:route+'Places_admin/uploadFile',
            type:'POST',
            contentType:false,
            enctype: 'multipart/form-data',
            data:data,
            processData:false,
            cache:false,
            success: function (data){
                location.reload();
            },
            error: function(r){
                alert(r);
            }

        });

    }




    $("#pais").change(function(){

        ajax_rqs('id='+encodeURI($(this).val()),route+'Signup/changepais','POST','text',function(r){
            if(r!='ERRINC'){
                var rta=r.split(String.fromCharCode(9));
                if(rta[0]=='1'){
                    $("#departamento").html(rta[1]);
                }
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


    //get all values from form
    function obtainValues(){

        //crear array para guardar filas

        var fila = { datos: [] };

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
        
        return fila;

    }

    //ok register

    $("#savenewhbs").click(function(){

        if($('.table-concept-show tr').length < 1){

            alert("Debe al menos ingresar información de una habitación.");
            return false;
        }

        var form = obtainValues();

        ajax_rqs({ 'data': JSON.stringify(form) },route+'Places_admin/addHabs','POST','text',function(r){

            if(r!='ERRINC'){

                $('.texto-msg').html(''); 

                var rta=r.split(String.fromCharCode(9));

                if(rta[0]=='1'){

                    alert(rta[1]);

                    location.reload();
                }
                else {

                    $('.texto-msg').html(rta[1]); 

                }
            }
            else alert('Error en proceso.');  

        });

    });


    function tipo1_vals(){

        //crear array para guardar filas

        var fila = { datos: [] };

        fila['entidad'] = encodeURI($("#nombreentidad").val());

        fila['tipo'] = encodeURI($("#tipo_establecimiento").val());

        fila['telefono'] = encodeURI($("#telefonoentidad").val());

        fila['mailentidad'] = encodeURI($("#emailentidad").val());

        fila['pais'] = encodeURI($("#pais").val());

        fila['dept'] = encodeURI($("#departamento").val());

        fila['ciudad'] = encodeURI($("#ciudad").val());

        fila['direccion'] = encodeURI($("#direccionentidad").val());

        fila['postal'] = encodeURI($("#postal").val());

        var geo = encodeURI($("#latlng").val()).split(',');

        fila['lat'] = geo[0];

        fila['long'] = geo[1];

        var cart = '';

        $('.establecimiento').each(function(){

            if($(this).is(':checked')) cart += ','+$(this).val();

        });

        fila['estb'] = cart;
        
        return fila;

    }


    function tipo3_vals(){

        //crear array para guardar filas

        var fila = { datos: [] };

        var cart = '';

        $('.caracter').each(function(){

            if($(this).is(':checked')) cart += ','+$(this).val();

        });

        fila['caract'] = cart;

        // adicionales

        var add = '';

        $('.adicional').each(function(){

            if($(this).is(':checked')) add += ','+$(this).val();

        });

        fila['add'] = add ;

        fila['desc'] = $('#desc').val();

        fila['condi'] = $('#condi').val();
        
        return fila;

    }

    $('#saveInfo').click(function(){


        if($('.establecimiento:checked').length < 1){

            alert('Debe elegir al menos un tipo de establecimiento.');
            return false;

        }

        if(!validate_2()){

            alert("Existen campos vacios en panel información de entidad.")
            return false;

        }

        if(!validate_4()){

            alert("Existen campos vacios en panel ubicación geografica.")
            return false;

        }


        var form = tipo1_vals();

        ajax_rqs({ 'data': JSON.stringify(form) },route+'Places_admin/updatetipo1','POST','text',function(r){

            if(r!='ERRINC'){

                $('.texto-msg').html(''); 

                var rta=r.split(String.fromCharCode(9));

                if(rta[0]=='1'){

                    alert(rta[1]);

                }
                else {

                    $('.texto-msg').html(rta[1]); 

                }
            }
            else alert('Error en proceso.');  

        });




    });

    $('#saveAdd').click(function(){


        var form = tipo3_vals();

        ajax_rqs({ 'data': JSON.stringify(form) },route+'Places_admin/updatetipo3','POST','text',function(r){

            if(r!='ERRINC'){

                $('.texto-msg').html(''); 

                var rta=r.split(String.fromCharCode(9));

                if(rta[0]=='1'){

                    alert(rta[1]);

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

        if($('#latlng').val().indexOf(',') == '-1') rta=false;
        else rta=true;

        if(!$.trim($('#latlng').val())) rta=false;
        else rta=true;

        return rta;

    }


    $('.table-hab').on('click','.elicama',function(){




        var id = $(this).data('id');

        var div = $(this).closest('.camas');

        ajax_rqs('id='+encodeURI(id),route+'Places_admin/delete_cama','POST','text',function(r){

            if(r!='ERRINC'){

                $('.texto-msg').html(''); 

                var rta=r.split(String.fromCharCode(9));

                if(rta[0]=='1'){

                    div.remove();

                    alert(rta[1]);

                }
                else alert(rta[1]);
            }
            else alert('Error en proceso.');  

        });

        

    });

    $('.table-hab').on('click','.eliund',function(){


        var id = $(this).closest('tr').data('id');

        ajax_rqs('id='+encodeURI(id),route+'Places_admin/delete_und','POST','text',function(r){

            if(r!='ERRINC'){

                $('.texto-msg').html(''); 

                var rta=r.split(String.fromCharCode(9));

                if(rta[0]=='1'){

                    alert(rta[1]);

                    location.reload();

                }
                else alert(rta[1]);
            }
            else alert('Error en proceso.');  

        });

        

    });

    $('.table-hab').on('click','.ncama',function(){

        var id = $(this).closest('tr').data('id');
        $('#idhb').val(id);

    });

    $('.nueva-cama').click(function(){


        
        var form = 'id='+encodeURI($('#idhb').val())+'&cama='+encodeURI($('#tcama').val())+'&cantidad='+encodeURI($('#ccama').val());
        

        ajax_rqs(form,route+'Places_admin/add_cama','POST','text',function(r){

            if(r!='ERRINC'){

                $('.texto-msg').html(''); 

                var rta=r.split(String.fromCharCode(9));

                if(rta[0]=='1'){

                    alert(rta[1]);

                    location.reload();

                }
                else alert(rta[1]);
            }
            else alert('Error en proceso.');  

        });

        

    });


    // modify the value
    $(document).on('click','.table-unidades-show .chhb',function(){

        $(this).html("<input type='text' class='chthb' value='"+$(this).text()+"'>");

        $(document).find('.chthb').number(true,2);

        $(document).find('.chthb').focus();

    });

    $(document).on('keypress','.table-unidades-show .chthb',function(e){

        if(e.keyCode==13){

            if(!$.trim($(this).val())) return false;

            var id = $(this).closest('tr').data('id');
          
            ajax_rqs('id='+encodeURI(id)+'&price='+encodeURI($(this).val()),route+'Places_admin/changeprice','POST','text',function(r){

                if(r!='ERRINC'){

                    $('.texto-msg').html(''); 

                    var rta=r.split(String.fromCharCode(9));

                    if(rta[0]=='1'){

                        alert(rta[1]);

                        location.reload();

                    }
                    else alert(rta[1]);
                }
                else alert('Error en proceso.');  

            });
        
        }

    });


    $(document).on('click','.table-hab-show .canthb',function(){

        $(this).html("<input type='text' class='ncante' value='"+$(this).text()+"'>");

        $(document).find('.ncante').number(true,0);

        $(document).find('.ncante').focus();

    });

    $(document).on('click','.table-hab-show .nombrehb',function(){

        $(this).html("<input type='text' class='nnombre' value='"+$(this).text()+"'>");

        $(document).find('.nnombre').focus();

    });

    $(document).on('click','.table-hab-show .detahb',function(){

        $(this).html("<textarea row='10' class='ndeta'>"+$(this).text()+"</textarea>");

        $(document).find('.ndeta').focus();

    });

    $(document).on('keypress','.table-hab-show .ncante',function(e){

        if(e.keyCode==13){

            if(!$.trim($(this).val())) return false;

            var id = $(this).closest('tr').data('id');
          
            ajax_rqs('id='+encodeURI(id)+'&cantidad='+encodeURI($(this).val()),route+'Places_admin/changepeople','POST','text',function(r){

                if(r!='ERRINC'){

                    $('.texto-msg').html(''); 

                    var rta=r.split(String.fromCharCode(9));

                    if(rta[0]=='1'){

                        alert(rta[1]);

                        location.reload();

                    }
                    else alert(rta[1]);
                }
                else alert('Error en proceso.');  

            });
        
        }

    });

    $(document).on('keypress','.table-hab-show .nnombre',function(e){

        if(e.keyCode==13){

            if(!$.trim($(this).val())) return false;

            var id = $(this).closest('tr').data('id');
          
            ajax_rqs('id='+encodeURI(id)+'&name='+encodeURI($(this).val()),route+'Places_admin/changename','POST','text',function(r){

                if(r!='ERRINC'){

                    $('.texto-msg').html(''); 

                    var rta=r.split(String.fromCharCode(9));

                    if(rta[0]=='1'){

                        alert(rta[1]);

                        location.reload();

                    }
                    else alert(rta[1]);
                }
                else alert('Error en proceso.');  

            });
        
        }

    });

    $(document).on('keypress','.table-hab-show .ndeta',function(e){

        if(e.keyCode==13){

            if(!$.trim($(this).val())) return false;

            var id = $(this).closest('tr').data('id');
          
            ajax_rqs('id='+encodeURI(id)+'&deta='+encodeURI($(this).val()),route+'Places_admin/changedeta','POST','text',function(r){

                if(r!='ERRINC'){

                    $('.texto-msg').html(''); 

                    var rta=r.split(String.fromCharCode(9));

                    if(rta[0]=='1'){

                        alert(rta[1]);

                        location.reload();

                    }
                    else alert(rta[1]);
                }
                else alert('Error en proceso.');  

            });
        
        }

    });


    $('#saveUnds').click(function(){


        var ent1 = encodeURI($("#entrada").val());

        var ent2 = encodeURI($("#salida").val());

        var ent3 = encodeURI($("#salidadesde").val());

        var ent4 = encodeURI($("#salidahasta").val());

        var form = 'cin1='+ent1+'&cin2='+ent2+'&cot1='+ent3+'&cot2='+ent4;


        ajax_rqs(form,route+'Places_admin/changehorarios','POST','text',function(r){

            if(r!='ERRINC'){

                $('.texto-msg').html(''); 

                var rta=r.split(String.fromCharCode(9));

                if(rta[0]=='1'){

                    alert(rta[1]);

                    location.reload();

                }
                else alert(rta[1]);
            }
            else alert('Error en proceso.');  

        });

    });





});