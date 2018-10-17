// register now page
$( document ).ready(function() {
	var h5 = document.getElementById("form-bg").offsetHeight;
	document.getElementById("container-contact-us").style.height = h5 + "px";

	$(window).on('resize', function(){
	  // register now page
	  var h5 = document.getElementById("form-bg").offsetHeight;
	  document.getElementById("container-contact-us").style.height = h5 + "px";
	});
});
