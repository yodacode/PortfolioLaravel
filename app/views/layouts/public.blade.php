<!-- app/views/layouts/master.blade.php -->
<html>
	<head>
		<!--CSS-->
		<link rel="stylesheet" href="{{ URL::asset('lib/bootstrap/css/bootstrap-flatly.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/public.css') }}">

		<title>Portfolio</title>
	</head>
    <body>
        <header class="navbar navbar-static-top bs-docs-nav">
          <div class="container">
            <div class="navbar-header">
              <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a href="../" class="navbar-brand">{ Benjamin }</a>
            </div>
            <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Posts <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li>{{ link_to_action('PostsController@index', 'Posts');}}</li>
							<li>{{ link_to_action('TagsController@index', 'Tags');}}</li>
							<li>{{ link_to_action('CategoriesController@index', 'Categories');}}</li>
							<li class="divider"></li>
							<li>{{ link_to_action('PostsController@create', 'Ajouter un Post');}}</li>
						</ul>
					</li>
					<li>{{ link_to_action('MediasController@index', 'Medias');}}</li>
				</ul>
              	<ul class="nav navbar-nav navbar-right">
	              	@if(!Auth::check())
	              		<li>
	              			{{ link_to_action('UsersController@getLogin', 'Login', $parameters = array(), $attributes = array()); }}
	              		</li>
	              		<li>
	              			{{ link_to_action('UsersController@getRegister', 'Register', $parameters = array(), $attributes = array()); }}
	              		</li>
	              	@else
	              		<li>
	              			{{ link_to_action('UsersController@getLogout', 'Logout', $parameters = array(), $attributes = array()); }}
	              		</li>
	          		@endif
              	</ul>
            </nav>
          </div>
        </header>

    	<!-- will be used to show any messages -->
		@if (Session::has('message'))
			<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif
        @yield('content')

        <footer class="footer">
        	<section class="container">
	        	<section class="col-md-4">
	        		<h4>En savoir plus</h4>
	        		<ul>
	        			<li><a href="#">Twitter</a></li>
	        			<li><a href="#">Google</a></li>
	        			<li><a href="#">Facebook</a></li>
	        			<li><a href="#">Contact</a></li>	        			
	        		</ul>
	        	</section>
	        	<section class="col-md-4">
	        		<h4>En savoir plus</h4>
	        		<ul>
	        			<li><a href="#">Twitter</a></li>
	        			<li><a href="#">Google</a></li>
	        			<li><a href="#">Facebook</a></li>
	        			<li><a href="#">Contact</a></li>	        			
	        		</ul>
	        	</section>
	        	<section class="col-md-4">
	        		<h4>En savoir plus</h4>
	        		<ul>
	        			<li><a href="#">Twitter</a></li>
	        			<li><a href="#">Google</a></li>
	        			<li><a href="#">Facebook</a></li>
	        			<li><a href="#">Contact</a></li>	        			
	        		</ul>
	        	</section>
        	</section>
        </footer>


        <!--SCRIPT-->
		<script type="text/javascript" src="{{ URL::asset('js/jquery-1.10.2.min.js') }}"></script>
		<script src="{{ URL::asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="{{ URL::asset('js/App/App.js') }}"></script>

		<!--lib-->
		<script src="{{ URL::asset('js/jquery.ui.widget.js') }}"></script>
	    <script src="{{ URL::asset('js/jquery.iframe-transport.js') }}"></script>
	   	<script src="{{ URL::asset('js/jquery.fileupload.js') }}"></script>
	   	<script src="{{ URL::asset('js/imagesloaded.pkgd.min.js') }}"></script>
	   	<script src="{{ URL::asset('js/masonry.pkgd.min.js') }}"></script>
	   	<script src="{{ URL::asset('js/jquery.parallax.min.js') }}"></script>

    </body>
</html>
