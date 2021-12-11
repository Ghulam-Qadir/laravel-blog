@extends('layouts.layout')
@section('title', 'All ajax View')
@section('content')
<div class="container">
			<div class="row">
		<div class="col-md-12">
			<h1>Crud With Ajex Method</h1>
		</div>
	</div>
	<div id="row">
		<div class="col-md-6 m-3">
			{{-- <a href="{{ url('create') }}" class="btn btn-primary">Add ajax</a> --}}
			<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Post
</button>
		</div>
		<div class="col-md-12">
			<table class="table">
				<div id="datainserted">
				</div>
				@if(Session::has('success'))
				<div class="alert alert-success">
					{{Session::get('success')}}
				</div>
				@endif
				@if(Session::has('warning'))
				<div class="alert alert-info">
					{{Session::get('warning')}}
				</div>
				@endif
					@if(Session::has('danger'))
				<div class="alert alert-danger">
					{{Session::get('danger')}}
				</div>
				@endif
				<thead>
					<tr>
						<th>Id</th>
						<th>Title</th>
						<th>ajax Image</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($ajaxcrud as $ajax)
					<tr>
						<td>{{ $ajax->id }}</td>
						<td><a href="single/{{ $ajax->slug }}">{{ $ajax->title }}</a></td>
						<td><img src="{{ asset('/upload/ajaxposts/'.$ajax->post_image)}}" alt="" width="100"></td>
						<td><a class="btn btn-primary" href="edit/{{ $ajax->id }}">Edit</a></td>
						<td><a class="btn btn-danger" href="delete/{{ $ajax->id }}">Delete</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
@section('scripts');
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  	<form id="ajaxalldata" action="{{ url('ajaxstore') }}" method="POST" enctype="multipart/form-data">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<ul class="alert alert-info d-none" id="save_errorlist"></ul>
		<div class="form-group">
		
		<input type="text" name="title" placeholder="title" class="form-control title">
	</div>
	<div class="form-group">
		<textarea name="body"  cols="30" rows="10" class="form-control body"></textarea>
	</div>
	<div class="form-group">
		<input type="file" name="post_image" class="form-control post-image">
	</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary ajaxdatasubmit">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>
@endsection