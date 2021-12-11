$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		}
	});

// ajax data insert start
	$("#ajaxalldata").submit(function(e) {
		e.preventDefault();
		var action = $(this).attr('action');
		var method = $(this).attr('method');
		var form = new FormData(this);
		$.ajax({
			url: action,
			type: method,
			data: form,
			cache: false,
            contentType: false,
            processData: false,
			success: function (response) {
				if (response.status == 400) {
				$('#save_errorlist').html("");
				$('#save_errorlist').removeClass('d-none');
					$.each(response.errors, function(key, err_val) {
						 $('#save_errorlist').append('<li>'+err_val+'</li>');
					});
				}else if(response.status == 200){
					$('#datainserted').append('<div class="alert alert-success"'+response.success+'</div>')
						
				}
			}
		});
	});
// insert data end

});
