<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="_token" content="{{csrf_token()}}" />
	<title>@yield('title')</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href={{ asset('css/app.css') }}>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
</head>
<body>
<header>
@include('layouts.nav')
</header>