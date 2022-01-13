@extends('layouts.layout')
@section('title', $querydata->title)
@section('content')
<div class="container">
	<div id="row">
		<div class="col-md-12">
			<img src="{{ asset($querydata->post_image)}}" alt="" class="w-100">
			<h1>{{ $querydata->title }}</h1>
			<p>{{ $querydata->body }}</p>
	</div>
</div>
@endsection