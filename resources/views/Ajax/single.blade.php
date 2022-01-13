@extends('layouts.layout')
@section('title', $ajaxdata->title)
@section('content')
<div class="container">
	<div id="row">
		<div class="col-md-12">
			<img src="{{ asset($ajaxdata->post_image)}}" alt="" class="w-100">
			<h1>{{ $ajaxdata->title }}</h1>
			<p>{{ $ajaxdata->body }}</p>
	</div>
</div>
@endsection