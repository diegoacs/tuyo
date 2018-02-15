$(document).ready(function(){


    $('#sendusr').click(function(){


        var usr = $('#newusr').val();
        var pro = $('#newprofile').val();

        if(!$.trim(usr)){

            alert('Debe escribir un correo electronico.');
            return false;
        }

        var form = 'user='+usr+'&profile='+pro;

        ajax_rqs(form,route+'Places_admin/newusers','POST','text',function(r){

            if(r!='ERRINC'){

                $('.texto-msg1').html(''); 

                var rta=r.split(String.fromCharCode(9));

                if(rta[0]=='1'){

                    alert(rta[1]);

                    window.open(route+'Places_admin/adminusers?id='+encodeURI($('#usuarios-select').val()),'_self');

                }
                else {

                    $('.texto-msg1').html(rta[1]);

                }
            }
            else alert('Error en proceso.'); 

        });


    });




    $('#usuarios-select').change(function(){

        window.open(route+'Places_admin/adminusers?id='+encodeURI($(this).val()),'_self');

    });

    $('#change-admin').click(function(){

        var user = encodeURI($('#usuarios-select').val());

        var profile = encodeURI($('#user-perfil').val());

        // entidades

        if($('.entidades:checked').length < 1){

            alert('Debe elegir al menos una entidad.');
            return false;

        }

        var ids = '';

        $('.entidades').each(function(){

            if($(this).is(':checked')) ids += ','+$(this).val();

        });

        var form = 'user='+user+'&profile='+profile+'&ids='+encodeURI(ids);

        ajax_rqs(form,route+'Places_admin/updateAdmin','POST','text',function(r){

            if(r!='ERRINC'){

                $('.texto-msg1').html(''); 

                var rta=r.split(String.fromCharCode(9));

                if(rta[0]=='1'){

                    alert(rta[1]);

                    window.open(route+'Places_admin/adminusers?id='+encodeURI($('#usuarios-select').val()),'_self');

                }
                else {

                    $('.texto-msg1').html(rta[1]);

                }
            }
            else alert('Error en proceso.'); 

        });

    });


    $('#change-info').click(function(){

        var mail = encodeURI($('#email-usr').val());

        var nom = encodeURI($('#nombre-usr').val());

        var form = 'nom='+nom+'&mail='+mail;

        ajax_rqs(form,route+'Places_admin/updateInfo','POST','text',function(r){

            if(r!='ERRINC'){

                $('.texto-msg1').html(''); 

                var rta=r.split(String.fromCharCode(9));

                if(rta[0]=='1'){

                    location.reload();

                }
                else {

                    $('.texto-msg1').html(rta[1]);

                }
            }
            else alert('Error en proceso.'); 

        });

    });


    $('#change-pass').click(function(){

        var pn = encodeURI($('#nwp-usr').val());

        var pnr = encodeURI($('#nwpr-usr').val());

        var old = encodeURI($('#pant-usr').val());


        if(pn != pnr){

            alert('Contraseñas son diferentes.');
            return false;
        }


        var form = 'np='+pn+'&npr='+pnr+'&old='+old;

        ajax_rqs(form,route+'Places_admin/updatePass','POST','text',function(r){

            if(r!='ERRINC'){

                $('.texto-msg2').html(''); 

                var rta=r.split(String.fromCharCode(9));

                if(rta[0]=='1'){

                    alert(rta[1]);

                }
                else {

                    $('.texto-msg2').html(rta[1]);

                }
            }
            else alert('Error en proceso.'); 

        });

    });


});