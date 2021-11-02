<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title')</title>
<!-- Bootstrap CSS -->
	<link rel="stylesheet" href=" {{ asset('asset/css/bootstrap.min.css') }}">
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Navbar</a>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('about') }}">About</a>
      </li>   
      <li class="nav-item">
        <a class="nav-link" href="{{ url('contact') }}">Contact</a>
      </li>
      <li class="nav-item">
      	<a href="{{ url('posts') }}" class="nav-link">Post View</a>
      </li>
      <li class="nav-item">
      	<a href="{{ url('posts/create') }}" class="nav-link">Add Post</a>
      </li>
    </ul>
  </div>
</nav>
</header>
@yield('content')
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('asset/js/jquery-3.5.1.slim.min.js') }}"></script>
<script src=" {{ asset('asset/js/popper.min.js') }} dist/umd/"></script>
<script src=" {{ asset('asset/js/bootstrap.min.js') }}"></script>
</body>
</html>