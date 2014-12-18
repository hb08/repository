$(document).ready(function(){
	var thisVid = '';
		// Click toggles show/hide
	$('.toggles').click(function(e){
		e.preventDefault();
		var div = "div#" + e.target.id;
		$("#vidscreen").toggle();
		$(div).toggle();
		thisVid = e.target.id;
	});
	
	$(".close").click(function(e){
		e.preventDefault();
		// Reset all vids to hidden
		$("#vidscreen > .vid").css('display', '');
		$("video#" + thisVid).get(0).pause();
		$("#vidscreen").toggle();
	});
});