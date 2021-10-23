<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>All Post Show</title>
</head>
<body>
	@foreach ($posts as $post)
		<h1>{{$post->title}}</h1>
		<p>{{$post->body}}</p>
	@endforeach
</body>
</html>