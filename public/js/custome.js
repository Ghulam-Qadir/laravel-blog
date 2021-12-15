$(document).ready(function() {
	var alldata = [];
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
				alldata = response.ajaxcrud;
				// console.log(response.ajaxcrud)
				$.each(response.ajaxcrud, function(key, val_ajex) {
					/* iterate through array or object */
					$('#ajaxalldatatable').append(`
						<tr>
						<td>${val_ajex.id}</td>
						<td>${val_ajex.title}</td>
						<td><img src="${val_ajex.post_image}" width="100"></td>
						<td><button type="button" class="btn btn-primary editbtn" value="${val_ajex.id}">Edit</button></td>
						<td><button type="button" class="btn btn-danger deletebutton" value="${val_ajex.id}">Delete</button></td>
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

$(document).on('click', '.deletebutton', function(e) {
	   if(!confirm("Do you really want to do this?")) {
       return false;
     }
	e.preventDefault();
	var delid = $(this).val();
	var e = this;
	var url = "/ajaxdel/"+ delid
	
	$.ajax({
	url: url,
	type: 'POST',
	dataType: 'json',
	data:{'id':delid}
})
.done(function(response) {
 if(response.status == 200){
      // Remove row from HTML Table
      $(e).closest('tr').css('background','#f44336');
      $(e).closest('tr').fadeOut(1000,function(){
        $(this).remove();
        $('#datainserted').append(`<div class="alert alert-danger">${response.massage}</div>`)
      });
    }
})
.fail(function() {
	console.log("error");
})
.always(function() {
	console.log("complete");
});
 });


$(document).on('click', '.editbtn', function(e) {
	e.preventDefault();
	/* Act on the event */
	var id1 = $(this).val();
	var item = alldata.find(item => item.id == id1);
	console.log(item);
});


});