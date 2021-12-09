$(document).ready(function() {
/*	$(".ajaxdatasubmit").click(function() {
		console.log("hello");
	});*/
	$(document).on('click', '.ajaxdatasubmit', function(e) {
		e.preventDefault();
		console.log("hello");
	});
});