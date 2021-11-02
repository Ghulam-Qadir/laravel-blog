@extends('layouts.layout')
@section('title', 'All Post View')
@section('content')
<div class="container">
	<div id="row">
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
					<td><a class="btn btn-primary" href=" posts/{{ $post->id }}/edit">Edit</a></td>
					<td><a class="btn btn-danger" href="/delete/{{ $post->id }}">Delete</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		</div>
	</div>
</div>
@endsection