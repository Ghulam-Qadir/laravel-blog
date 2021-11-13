@extends('layouts.layout')
@section('title', 'All Post View')
@section('content')
<div class="container">
	<div id="row">
		<div class="col-md-6 m-3">
					<a href="{{ url('create') }}" class="btn btn-primary">Add Post</a>
				</div>
		<div class="col-md-12">
		<table class="table">

			<thead>
				<tr>
					<th>Id</th>
					<th>Title</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($posts as $post)
				<tr>
					<td>{{ $post->id }}</td>
					<td>{{ $post->title }}</td>
					<td><a class="btn btn-primary" href="edit/{{ $post->id }}">Edit</a></td>
					<td><a class="btn btn-danger" href="delete/{{ $post->id }}">Delete</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		</div>
	</div>
</div>
@endsection