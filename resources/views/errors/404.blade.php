<html>
	<head>
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
	
		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #2c3e50;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {	
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 72px;
				margin-bottom: 40px;
			}

			body {
			  /* Margin bottom by footer height */
			 	
			}
			footer {
			  position: absolute;
			  bottom: 0;
			  width: 100%;
			  /* Set the fixed height of the footer here */
			  height: 60px;
			  background-color: #f5f5f5;

			}


		</style>
	</head>
	<body style="background-image: url({{ asset('img/background4.png') }});">
		<div class="container">
			<div class="content">
				<div class="title"><h3>Error 404</h3></div><h1>You look lost..</h1><h2>go back <a href="{{ url('/') }}">here</a></h2>
			</div>
			
				<footer class="footer">
					
							<p class="text-center">built with <a href="http://laravel.com"><img src="{{ asset('img/laravel.png') }}" alt="laravel"></a> 
							The Dashboard	 &copy;  2015 for technical support and inquiries at eldrin.paul@gmail.com</p>
					
				</footer>

			
			
		</div>
	</body>
</html>
