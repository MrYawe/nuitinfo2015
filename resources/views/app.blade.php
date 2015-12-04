<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Panic Map</title>

	<link href="{{ asset('assets/bower/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	@yield('head')
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/home') }}">Panic Map</a>
			</div>

			<div class="collapse navbar-collapse" id="navbar">
				<ul class="nav navbar-nav">
					<!--<li><a href="{{ url('/') }}">Welcome</a></li>
					<li><a href="{{ url('/threejs-example') }}">Three.js example</a></li> -->
					<!--<li><a href="{{ url('/socket-example') }}">Socket.io example</a></li>
					<li><a href="{{ url('/fire') }}" target="_blank">Fire public event</a></li>
					<li><a href="{{ url('/fire-private') }}" target="_blank">Fire private event</a></li>-->
					<li><a href="{{ url('/threejs-planete') }}">Planete</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li style="display:inline-block;text-align:right;"><a href="#" style="outline:none;"><img src="assets/img/zoom_in.png" style="margin-right:20px;cursor:pointer;" width="30" id="zoom_in"><img src="assets/img/zoom_out.png" style="cursor:pointer;" width="30" id="zoom_out"></a></li>
					@if(auth()->guest())
						@if(!Request::is('auth/login'))
							<li><a href="{{ url('/auth/login') }}">Login</a></li>
						@endif
						@if(!Request::is('auth/register'))
							<li><a href="{{ url('/auth/register') }}">Register</a></li>
						@endif
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	<div id="earth_div"></div>

	@yield('content')

	<!-- Scripts -->
	<script src="{{ asset('assets/bower/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/bower/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src='https://code.responsivevoice.org/responsivevoice.js'></script>
	<script src="{{ asset('assets/js/scribe.js') }}"></script>
	<script src="{{ asset('assets/js/read-site.js') }}"></script>
	@yield('javascript')
</body>
</html>
