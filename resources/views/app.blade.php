<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="_token" content="{{ csrf_token() }}"/>
	<title>The Dashboard</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('/js/stylesheets/jquery.cssemoticons.css') }}">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/dashboard') }}"><img alt="Brand" style="height:60px;" src="{{ asset('img/dashboard_brand.jpg') }}"/></a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/home') }}">Home</a></li>
					<li><a href="{{ url('/article') }}">threads</a></li>
					

				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		
		@include('flash::message')


		@yield('content')


	</div>
	<!-- Scripts -->
	
	
	@include('footer')
	
	
	
    <script type="text/javascript" src="{{ asset('/js/jquery-2.1.4.js') }}"></script> 
	<script type="text/javascript" src="{{ asset('/js/bootstrap.js') }}"></script>
	
	
	<script type="text/javascript">

		
		$('#flash-overlay-modal').modal();
		

		
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
		    }
		});

	</script>

	@yield('js')
</body>
</html>
