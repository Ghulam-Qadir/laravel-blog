@extends('layouts.layout')
@section('title', 'All images View')
@section('content')
<div class="container">
	<h2>Upload Image Using Dropzone Tutorial</h2><br/>
	<form method="post" action="{{url('create-gallery')}}" enctype="multipart/form-data"
	class="dropzone" id="dropzone">
	@csrf

</form>
<br>
<button class="btn btn-primary" id="uploadfiles">Upload</button>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		}
	});
	var allimage = [];
	Dropzone.autoDiscover = false;
	var myDropzone = new Dropzone("#dropzone", { 
		autoProcessQueue: false,
		addRemoveLinks: true,
   parallelUploads: 10 // Number of files process at a time (default 2)
});

	$('#uploadfiles').click(function(){
		myDropzone.processQueue();
		var action = myDropzone.options.url;
		var method = myDropzone.options.method;
		allimage = myDropzone.files;
		$.ajax({
			url: action,
			type: method,
			data: allimage,
			cache: false,
			contentType: false,
			processData: false,
			success:function(data){
				if (data.status == 200) {
					
				}else{

				}
			}
		})
	});
</script>
@endsection