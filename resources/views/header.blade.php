<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminLTE 2 | Starter</title>	
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
	<link rel="stylesheet" href="{{ URL::to('/') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">	
	<link rel="stylesheet" href="{{ URL::to('/') }}/bower_components/font-awesome/css/font-awesome.min.css">	
	<link rel="stylesheet" href="{{ URL::to('/') }}/bower_components/Ionicons/css/ionicons.min.css">	
	<link rel="stylesheet" href="{{ URL::to('/') }}/dist/css/AdminLTE.min.css">	
	<link rel="stylesheet" href="{{ URL::to('/') }}/dist/css/skins/skin-blue.min.css">


	<link href="{{ URL::to('/') }}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
	<link href="{{ URL::to('/') }}/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" />


	<link rel='stylesheet' href="{{ URL::to('/') }}/bower_components/quilljs/dist/css/monokai-sublime.min.css">
    <link rel='stylesheet' href="{{ URL::to('/') }}/bower_components/quilljs/dist/css/katex.min.css">
    <link rel='stylesheet' href="{{ URL::to('/') }}/bower_components/quilljs/dist/css/quill.snow.css">
    
	




	<link rel="stylesheet" href="{{ URL::to('/') }}/css/custom-style.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>


<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<!-- Main Header -->
		<header class="main-header">

			<!-- Logo -->
			<a href="index2.html" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels 
				<span class="logo-mini"><b>A</b>LT</span>-->
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>Email</b> Send</span>
			</a>

			<!-- Header Navbar -->
			<nav class="navbar navbar-static-top" role="navigation">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<!-- Navbar Right Menu -->
				<a href="{{route('logout')}}" class="log-out-btn btn btn-danger btn-lg" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
				
			</nav>
		</header>