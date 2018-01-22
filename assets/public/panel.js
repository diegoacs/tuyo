$(document).ready(function(){
    var route = 'http://localhost/tuyo/index.php/';
	findme();


    $(".filter-char").click(function () {
       
        var chr = [];
        $('.caracteristica').each(function(){

            if(this.checked){

                chr.push($(this).data('id'));
            }
        })

        var selected = $('.filtrocat').find('option:selected');
        var extra = selected.data('id');


        var form='char='+encodeURI(chr)+'&city='+encodeURI($('#ciudad1').val());
            form+='&tipo='+encodeURI(extra);
            form+='&ini='+encodeURI($("#fechadesde1").val())+'&fin='+encodeURI($("#fechahasta1").val());

        $.ajax({
            url:route+'Panel_ini/filterChar',
            type:'POST',
            data:form,
            success: function (r){  
                $(".outside-rta").html(r);
            },

            error: function (r){
                alert('error: filtrando busqueda.');
            }
        });
        
        
    });


	function findme(){

		function localizacion(posicion){

            // solo imagen
			var imgURL = "https://maps.googleapis.com/maps/api/staticmap?center=7.014035,-73.111061&zoom=17&size=250x200&markers=color:blue%7C";
                imgURL+="7.014035,-73.111061&MapType=hybrid&key=AIzaSyDP5opBg3ZbeX96OI9l7Zh_Mc1iK7_NIBs";
            var showMap = "<img src="+imgURL+">"

            // incrustar mapa interactivo
            // var showMap = "<iframe src='https://www.google.com/maps/embed?pb=!1m0!4v1508793538745!6m8!1m7!1sfx56bsn-6xxktUe4K2UilQ!2m2!1d7";
            //     showMap+= ".013985667797674!2d-73.11082179661368!3f289.30775766719603!4f-6.12974976130441!5f0.7820865974627469' ";
            //     showMap+= "width='400' height='300' frameborder='0' style='border:0' allowfullscreen></iframe>";
            // var showMap='<iframe src="https://www.google.com/maps/embed?pb=!1m17!1m11!1m3!1d1674.947947350395!2d-73.11093524946837!3d7.013836912015506!2m2!';
            //     showMap+='1f0!2f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e683894d228b71f%3A0xa5a32ff95d7e6b0f!2zN8KwMDAnNTAuNSJOIDczwrAwNiczOS42Ilc!5e1!3m2!1ses-';
            //     showMap+='419!2sco!4v1508797919069" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>';
			$("#map").html(showMap);
		}

		function error(){
			$("#map").html('Atención! este navegador no soporta geolocalización.');
		}

		navigator.geolocation.getCurrentPosition(localizacion,error);
		
	}

    $(document).find('.generarRv').click(function(){
        $("#nund").val($(this).closest('tr').data('id'));
        $("#nent").val($(this).closest('tr').data('enti'));
    });

    $(".info-send").click(function(){

         var data = {
            name: encodeURI($('#names').val()),
            email: encodeURI($('#email_').val()),
            telefono: encodeURI($('#telefono').val()),
            coment: encodeURI($('#comments').val()),
            und: encodeURI($('#nund').val()),
            ent: encodeURI($('#nent').val())
        };

        $.ajax({
            type:'POST',
            url:route+'Panel_ini/contact',
            data:data,
            dataType:'text',
            success: function (r){
                alert(r);
            },
            error: function(){
                alert('Error enviando datos, por favor intente más tarde.')
            }       
        });

    });


    $('.gallery-places').slick({
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 1000,
          arrows: false
    });

    $(".ver-disponible").click(function(){

        var selected = $('.tipoUnd').find('option:selected').data('id');

        if(!$(".date1").val().trim()){
            alert('Debe ingresar una fecha de entrada.');
            return false;
        }
        if(!$(".date2").val().trim()){
            alert('Debe ingresar un fecha de salida.');
            return false;
        }

        var arg=encodeURI($(".codePlace").val())+'/'+encodeURI($(".date1").val())+'/'+encodeURI($(".date2").val())+'/'+encodeURI(selected);
        window.open('http://localhost/tuyo/index.php/Panel_ini/check_avaliable/'+arg,"_self");
    });



});