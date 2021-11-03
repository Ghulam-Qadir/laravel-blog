@extends('layouts.layout')
@section('title', 'Creat Posts')
@section('content')
<div class="container">
	<div id="row">
		<div class="col-md-12">	
	<form action="{{ route('Post.update',[$PostArr->id]) }}" method="Post">
		<div class="form-group">
		@csrf
		 @method('PUT')
		<input type="text" name="title" placeholder="title" class="form-control" value="{{ $PostArr->title }}">
	</div><div class="form-group">
		<textarea name="body" id="" cols="30" rows="10" class="form-control">{{ $PostArr->body }}</textarea>
	</div><div class="form-group">	
		<input class="btn btn-primary" type="submit" name="submit" value="Update">
		</div>
	</form>
		</div>
	</div>
</div>
@endsection