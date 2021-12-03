@extends('layouts.layout')
@section('title', 'Creat querystore')
@section('content')
<div class="container">
	<div id="row">
		<div class="col-md-12">	
@if (session('status'))
	<h1>{{session('status')}}</h1>
@endif
<br>
<form action="{{ url('querystore') }}" method="POST" enctype="multipart/form-data">
		<div class="form-group">
		@csrf
		<input type="text" name="title" placeholder="title" class="form-control">
	</div>
	<div class="form-group">
		<textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<input type="file" name="post_image" class="form-control">
	</div>
	<div class="form-group">	
		<input class="btn btn-primary" type="submit" name="submit" value="Add Post">
	</div>
</form>
		</div>
	</div>
</div>
@endsection