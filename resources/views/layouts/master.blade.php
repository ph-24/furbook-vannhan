<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Furbook</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<style type="text/css" media="screen">
	body{
		width: 60%;
		margin: auto;
	}
	h2{
		font-weight: bold;
	}
</style>
<script>
	$( function() {
		$( ".datepicker" ).datepicker({
			dateFormat:'yy/mm/dd' 
		});
	} );
</script>
</head>
<body>
	<div class="container">
		@yield('header')
	</div>
	@if (Session::has('success'))
	<div class="alert alert-success">
		{{Session::get('success')}}
	</div>
	@endif
	@if (Session::has('errors'))
	<div class="alert alert-warning">
		{{Session::get('errors')}}
	</div>
	@endif
	@yield('content')
</body>
</html>