@extends('layouts.layout')
@section('title', $postdata->title)
@section('content')
<div class="container">
	<div id="row">
		<div class="col-md-12">
			<img src="{{ asset('upload/post/'.$postdata->post_image)}}" alt="" class="w-100">
			<h1>{{ $postdata->title }}</h1>
			<p>{{ $postdata->body }}</p>
	</div>
</div>
@endsection