<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href=" {{ asset('storage/asset/css/bootstrap.min.css') }}">
	<title>Document</title>
</head>
<body>
	<div class="container">
		<div class="row h-50">
			<div class="col-md-6 mx-auto my-auto">
				 @if(session('msg')) 
				<div class="alert alert-danger" role="alert">
				{{ session('msg') }}
				</div>
				@endif 
				<form class="align-middle" action="loginUser" method="POST">
					@csrf
					<div class="form-group">
						<label for="exampleInputEmail1">Email address</label>
						<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
						<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
					</div>
					<button type="submit" class="btn btn-primary mt-2">Submit</button>
				</form>
			</div>
		</div>
	</div>	
	<!-- Optional JavaScript -->
@include('layouts.footer')