@extends('layouts.layout')
@section('title', 'All Post View')
@section('content')
<div class="container">
		<div class="row">
		<div class="col-md-12">
			<h1>Crud With Query Builder Method</h1>
		</div>
	</div>
	<div id="row">
		<div class="col-md-6 m-3">
			<a href="{{ url('querycreate') }}" class="btn btn-primary">Add Post</a>
		</div>
		<div class="col-md-12">
			<table class="table">
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
						<th>Post Image</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($querycruds as $post)
					<tr>
						<td>{{ $post->id }}</td>
						<td><a href="{{ route('querysingle',$post->slug) }}">{{ $post->title }}</a></td>
						<td><img src="{{ asset($post->post_image)}}" alt="" width="100"></td>
						<td><a class="btn btn-primary" href="queryedit/{{ $post->id }}">Edit</a></td>
						<td><a class="btn btn-danger" href="querydelete/{{ $post->id }}">Delete</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection