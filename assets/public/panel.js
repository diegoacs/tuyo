$(document).ready(function(){

	findme();

	$(".slide_city > div:gt(0)").hide();



	setInterval(function() {
	  $('.slide_city > div:first')
	    .toggle('slide')
	    .next()
	    .toggle('slide')
	    .end()
	    .appendTo('.slide_city');
	}, 3000);

	function findme(){

		if(navigator.geolocation){
			$("#map").html('si soporta');
		}

		function localizacion(posicion){
			var lat = posicion.coords.latitude;
			var lon = posicion.coords.longitude;

			var imgURL = "https://maps.googleapis.com/maps/api/staticmap?center="+lat+","+lon+"&size=400x400&key=AIzaSyDP5opBg3ZbeX96OI9l7Zh_Mc1iK7_NIBs";

			$("#map").html("<img scr='"+imgURL+"'>");
		}

		function error(){
			$("#map").html('error en localizacion');
		}

		navigator.geolocation.getCurrentPosition(localizacion,error);
		
	}



});