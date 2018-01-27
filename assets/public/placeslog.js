$(document).ready(function(){



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


    function addRow(vals){

        var row="<tr>";
        row+="<td class='cantidad chgn'>"+parseInt(vals[0],10)+"</td>";
        row+="<td class='nombre chgt'>"+vals[1]+"</td>";
        row+="<td class='tipo' data-id='"+vals[5]+"'>"+vals[4]+"</td>";        
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
        $('#unidad option:selected').val()

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

        if($('.table-concept-show tr').length < 1){

            alert("Debe al menos ingresar información de una habitación.")
        }




    });



    function validate_1(){

        if(!$.trim($('#nombreusr').val()) || !$.trim($('#mailusr').val())) return false;
        else return true;
    }

    function validate_2(){

        var rta;
        if(!$.trim($('#nombreentidad').val()) || !$.trim($('#direccionentidad').val())) rta false;
        else rta true;

        if(!$.trim($('#telefonoentidad').val()) || !$.trim($('#emailentidad').val())) rta false;
        else rta true;

        return rta;
    }

    function validate_3(){

        var rta;
        if(!$.trim($('#entrada').val())) rta false;
        else rta true;

        if(!$.trim($('#salidadesde').val()) || !$.trim($('#salidahasta').val())) rta false;
        else rta true;

        return rta;
    }


	// $('#saveentidad').click(function(){


 //        if(!$('#info').is(':checked')){

 //            alert('Debe aceptar las condiciones del servicio.');
 //            return false;

 //        }

        
 //        if($('#accept').is(':checked'))var form='cond=1';
 //        else var form='cond=0';
 //        if($('#info').is(':checked'))form+='&info=1&';
 //        else form+='&info=0&'

	// 	form += 'nombres='+encodeURI($('#nombres').val())+'&apellidos='+encodeURI($('#apellidos').val());
	//     form += '&fecha='+encodeURI($('#fechanac').val())+'&email='+encodeURI($('#email').val());
	// 	form += '&telefono='+encodeURI($('#telefono').val())+'&direccion='+encodeURI($('#direccion').val());
	// 	form += '&codigo='+encodeURI($('#captchacode').val());

 //        ajax_rqs(form,route+'Signup/registerUsr','POST','text',function(r){
 //            if(r!='ERRINC'){
 //                var rta=r.split(String.fromCharCode(9));
 //                if(rta[0]=='1'){
 //                    alert('Registro exitoso, valide los datos en su correo electrónico.');
 //                }
 //                else alert(rta[1]);
 //            }
 //            else alert('Error en proceso.');        
 //        });




	// });

});