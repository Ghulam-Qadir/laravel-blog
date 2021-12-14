$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		}
	});
	loaddata();
	function loaddata() {
		$.ajax({
			url: 'ajaxpostsget',
			type: 'GET',
			dataType: 'json',
			success: function (response) {
				// console.log(response.ajaxcrud)
				$.each(response.ajaxcrud, function(key, val_ajex) {
					/* iterate through array or object */
					$('#ajaxalldatatable').append(`
						<tr>
						<td>${val_ajex.id}</td>
						<td>${val_ajex.title}</td>
						<td><img src="${val_ajex.post_image}" width="100"></td>
						<td><a class="btn btn-primary" href="">Edit</a></td>
						<td><a class="btn btn-danger" href="">Delete</a></td>
						</tr>
						`)
				});
			}
		})
	}
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
				$('#exampleModal').modal('hide');
				$('#ajaxalldatatable').html("");
				loaddata();
				$('#datainserted').append(`<div class="alert alert-success">${response.success}</div>`)
			}
		}
	});
});
// insert data end
});