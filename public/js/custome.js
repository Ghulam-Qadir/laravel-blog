$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		}
	});

	$("#ajaxalldata").submit(function(e) {
		e.preventDefault();
		var action = $(this).attr('action');
		var method = $(this).attr('method');
		var form = new FormData(this);
		//console.log(data);
		$.ajax({
			url: action,
			type: method,
			data: form,
			cache: false,
            contentType: false,
            processData: false,
			success: function (response) {
				console.log(response);
			}
		});
	});
});
