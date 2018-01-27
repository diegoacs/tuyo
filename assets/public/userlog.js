$(document).ready(function(){

	$('#register').click(function(){


        if(!$('#accept').is(':checked')){

            alert('Debe aceptar las condiciones del servicio.');
            return false;

        }

        
        if($('#accept').is(':checked'))var form='cond=1';
        else var form='cond=0';
        if($('#info').is(':checked'))form+='&info=1&';
        else form+='&info=0&'

		form += 'nombres='+encodeURI($('#nombres').val())+'&apellidos='+encodeURI($('#apellidos').val());
	    form += '&fecha='+encodeURI($('#fechanac').val())+'&email='+encodeURI($('#email').val());
		form += '&telefono='+encodeURI($('#telefono').val())+'&direccion='+encodeURI($('#direccion').val());
		form += '&codigo='+encodeURI($('#captchacode').val());

        ajax_rqs(form,route+'Signup/registerUsr','POST','text',function(r){
            if(r!='ERRINC'){
                var rta=r.split(String.fromCharCode(9));
                if(rta[0]=='1'){
                    alert('Registro exitoso, valide los datos en su correo electrónico.');
                }
                else alert(rta[1]);
            }
            else alert('Error en proceso.');        
        });




	});

});