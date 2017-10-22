$(document).ready(function(){

	$(".slide_city > div:gt(0)").hide();

	setInterval(function() {
	  $('.slide_city > div:first')
	    .toggle('slide')
	    .next()
	    .toggle('slide')
	    .end()
	    .appendTo('.slide_city');
	}, 3000);


});