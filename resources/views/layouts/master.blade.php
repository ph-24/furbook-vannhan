<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Furbook</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
	<div class="container">
		@yield('header');
	</div>
	@if (Session::has('success'))
	<div class="alert alert-success">
		{{Session::get(success)}}
	</div>
	@endif
	@yield('content')
</body>
</html>