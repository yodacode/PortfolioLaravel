<!-- app/views/layouts/master.blade.php -->
<html>
	<head>
		<!--CSS-->
		<link rel="stylesheet" href="{{ URL::asset('lib/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('lib/bootstrap/css/bootstrap-theme.min.css') }}">
		<title>Benjamin</title>
	</head>
    <body>
        
        <header class="navbar navbar-inverse">
			<section class="container">
				<ul class="nav navbar-nav">
					<li>
						<a href="/" class="navbar-brand">Benjamin</a>
					</li>
				</ul>			
				<ul class="nav navbar-nav navbar-right">
					<li>
						{{ link_to_action('UserController@signin', 'Connexion', $parameters = array(), $attributes = array()); }}
					</li>
				</ul>
			</section>
		</header>



        <div class="container">
        	<!-- will be used to show any messages -->
			@if (Session::has('message'))
				<div class="alert alert-info">{{ Session::get('message') }}</div>
			@endif
            @yield('content')
        </div>

        <!--SCRIPT-->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="{{ URL::asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
    </body>
</html>
