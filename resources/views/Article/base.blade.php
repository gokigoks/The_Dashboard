<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Dashboard</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="{{ asset('css/Bootstrap.css') }}" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
	</head>
	<body>
<div class="wrapper">
    @yield('content')
</div>
	<!-- script references -->
		<script type="text/javascript" src="{{ asset('/js/jquery-2.1.4.js') }}"></script> 
		<script src="{{ asset('js/bootstrap.js') }}"></script>
	</body>
</html>