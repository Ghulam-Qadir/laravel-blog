@extends('layouts.layout')
@section('title', 'All images View')
@section('content')
<div class="row">

<div class="col-12">
		<table class="table table-image">
		  <thead>
		    <tr>
		      <th scope="col">Day</th>
		      <th scope="col">Image</th>
		      <th scope="col">Article Name</th>
		      <th scope="col">Author</th>
		      <th scope="col">Words</th>
		    </tr>
		  </thead>
		  <tbody>
@foreach ($allimages as $element)
		    <tr>
		      <th scope="row">{{ $element->id }}</th>
		      <td class="w-25">
			      <img src="{{ $element->images_gallery }}" class="img-fluid img-thumbnail" alt="Sheep">
		      </td>
		      <td>Bootstrap 4 CDN and Starter Template</td>
		      <td>Cristina</td>
		      <td>913</td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>   
    </div>



</div>
@endsection