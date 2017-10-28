$(document).ready(function(){

	findme();

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



});