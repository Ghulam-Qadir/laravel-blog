@extends('layouts.layout')
@section('title', 'All Post View')
@section('content')
<div class="container">
	<div id="row">
		<div class="col-md-12">
			<img src="{{ asset('upload/post/'.$Postdata->post_image)}}" alt="" class="w-100">
			<h1>{{ $Postdata->title }}</h1>
			<p>{{ $Postdata->body }}</p>
	</div>
</div>
@endsection