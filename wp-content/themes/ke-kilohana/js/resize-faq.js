// seminars page
$( document ).ready(function() {
	var h6 = document.getElementById("form-bg").offsetHeight;
	document.getElementById("container-faqs").style.height = h6 + "px";

	$(window).on('resize', function(){
	  // seminars page
	  var h6 = document.getElementById("form-bg").offsetHeight;
	  document.getElementById("container-faqs").style.height = h6 + "px";
	});
});
