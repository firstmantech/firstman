<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title') - FirstMan Techno Enterprises Limited</title>

	<link href="{{ asset('assets/img/favicon.144x144.png') }}" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="{{ asset('assets/img/favicon.114x114.png') }}" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="{{ asset('assets/img/favicon.72x72.png') }}" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="{{ asset('assets/img/favicon.57x57.png') }}" rel="apple-touch-icon" type="image/png">
	<link href="{{ asset('assets/img/favicon.png') }}" rel="icon" type="image/png">
	<link href="{{ asset('assets/img/favicon.ico') }}" rel="shortcut icon">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<link rel="stylesheet" href="{{ asset('assets/css/lib/lobipanel/lobipanel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/separate/vendor/lobipanel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/lib/jqueryui/jquery-ui.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/separate/pages/widgets.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/lib/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lib/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    @yield('styles')
</head>

<body class="horizontal-navigation">
	<header class="site-header">
	    <div class="container-fluid">
	        <a href="#" class="site-logo">
	            <img class="hidden-md-down" src="{{ asset('assets/img/logo/logo-new.jpg') }}" alt="">
	            <img class="hidden-lg-down" src="{{ asset('assets/img/logo/logo-fav.jpg') }}" alt="">
	        </a>
	        
	        <button class="hamburger hamburger--htla">
	            <span>toggle menu</span>
	        </button>
	        <div class="site-header-content">
	            <div class="site-header-content-in">
	                <div class="site-header-shown">
	                    <div class="dropdown dropdown-notification notif">
	                        <a href="#"
	                           class="header-alarm dropdown-toggle active"
	                           id="dd-notification"
	                           data-toggle="dropdown"
	                           aria-haspopup="true"
	                           aria-expanded="false">
	                            <i class="font-icon-alarm"></i>
	                        </a>
	                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-notif" aria-labelledby="dd-notification">
	                            <div class="dropdown-menu-notif-header">
	                                Notifications
	                                <span class="label label-pill label-danger">4</span>
	                            </div>
	                            @php
	                            	$notifications = DB::table('notifications')->orWhereNull('comments')->orderBy('id', 'desc')->take(5)->get();
	                            @endphp
	                            <div class="dropdown-menu-notif-list">
	                            	@forelse($notifications as $notification)
	                                <div class="dropdown-menu-notif-item">
	                                    <div class="dot"></div>
	                                    <a href="{{ route('notifications.edit',$notification->id) }}">{{ $notification->id }}</a>
	                                    <div class="color-blue-grey-lighter">{{ $notification->created_at->diffForHumans() }}</div>
	                                </div>
	                                @empty
	                                <div class="dropdown-menu-notif-item">
	                                    <div class="dot"></div>
	                                    <a href="#">No Results</a>
	                                </div>
	                                @endforelse
	                            </div>
	                            <div class="dropdown-menu-notif-more">
	                                <a href="#">See more</a>
	                            </div>
	                        </div>
	                    </div>

	
	                    <div class="dropdown user-menu">
	                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <img src="{{ asset('assets/img/avatar-2-64.png') }}" alt="">
	                        </button>
	                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span>Profile</a>
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Settings</a>
	                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Help</a>
	                            <div class="dropdown-divider"></div>
	                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
	                        </div>
	                    </div>
	
	                    <button type="button" class="burger-right">
	                        <i class="font-icon-menu-addl"></i>
	                    </button>
	                </div><!--.site-header-shown-->
	
	            </div><!--site-header-content-in-->
	        </div><!--.site-header-content-->
	    </div><!--.container-fluid-->
	</header><!--.site-header-->

	<div class="mobile-menu-left-overlay"></div>
	<ul class="main-nav nav nav-inline">
		<li class="nav-item">
			<a class="nav-link" href="{{ url('/home') }}">Dashboard</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{ url('/sales') }}">Sales</a>
		</li>
		<!-- <li class="nav-item">
			<a class="nav-link" href="{{ url('/operations') }}">Operations</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{ url('/ops-billing') }}">Operations Billing</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{ url('/crm') }}">Customer Relationship</a>
		</li> -->
		<li class="nav-item">
			<a class="nav-link" href="{{ url('/users') }}">User Management</a>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Masters</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="{{ url('states') }}">States</a>
				<a class="dropdown-item" href="{{ url('cities') }}">Cities</a>
				<a class="dropdown-item" href="{{ url('salutations') }}">Salutations</a>
				<a class="dropdown-item" href="{{ url('sources') }}">Sources</a>
				<a class="dropdown-item" href="{{ url('departments') }}">Departments</a>
				<a class="dropdown-item" href="{{ url('services') }}">Services</a>
				<a class="dropdown-item" href="{{ url('reasons') }}">Reasons</a>
				<a class="dropdown-item" href="{{ url('types') }}">Types</a>
				<a class="dropdown-item" href="{{ url('verticals') }}">Verticals</a>
			</div>
		</li>
	</ul>

	@yield('content')


	<script src="{{ asset('assets/js/lib/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/lib/popper/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/lib/tether/tether.min.js') }}"></script>
	<script src="{{ asset('assets/js/lib/bootstrap/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/plugins.js') }}"></script>

	<script type="text/javascript" src="{{ asset('assets/js/lib/jqueryui/jquery-ui.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/lib/lobipanel/lobipanel.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/lib/match-height/jquery.matchHeight.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('https://www.gstatic.com/charts/loader.js') }}"></script>
	

@yield('javascript')

<script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>