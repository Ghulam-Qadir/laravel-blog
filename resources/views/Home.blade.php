@extends('layouts.app')
@section('title', 'Creat Posts')
@section('content')
<div class="container">
<div class="row mt-4">
@foreach ($posts as $post)
		<div class="col-md-4 mt-1">
			<div class="card">
				<div class="card-head">
				</div>
				<div class="card-body">
					<img src="{{ asset('upload/post/'.$post->post_image)}}" alt="" class="w-100 mb-3">
					<h5><a href="single/{{ $post->slug }}">{{ $post->title }}</a></h5>
					<p>{{ $post->body }}</p>
				</div>
			</div>
		</div>
@endforeach
	</div>
</div>
@endsection