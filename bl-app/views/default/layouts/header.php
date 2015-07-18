<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>AdminLTE 2 | Dashboard</title>
	<meta name="_token" content="<?php echo csrf_token(); ?>">
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.4 -->
	<link href="<?php echo adminAsset('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
	<!-- FontAwesome 4.3.0 -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!-- Ionicons 2.0.0 -->
	<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
	<!-- Theme style -->
	<link href="<?php echo adminAsset('dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo adminAsset('dist/css/skins/_all-skins.min.css') ?>" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo adminAsset('assets/css/ngProgress.css'); ?>">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
<header class="main-header">
	<!-- Logo -->
	<a href="<?php echo site_url(''); ?>" class="logo">
	<!-- mini logo for sidebar mini 50x50 pixels -->
	<span class="logo-mini"><b>BL</b>P</span>
	<!-- logo for regular state and mobile devices -->
	<span class="logo-lg"><b>Blacklist</b>Panel</span>
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
		<span class="sr-only">Toggle navigation</span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo empty(auth()->avatar) ? adminAsset('dist/img/no-avatar.jpg') : base_url('bl-content/users/'.auth()->id.'/'.auth()->avatar) ; ?>" class="user-image" alt="User Image" />
						<span class="hidden-xs"><?php echo auth()->username; ?></span>
					</a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header">
							<img src="<?php echo empty(auth()->avatar) ? adminAsset('dist/img/no-avatar.jpg') : base_url('bl-content/users/'.auth()->id.'/'.auth()->avatar) ; ?>" class="img-circle" alt="User Image" />
							<p>
								<?php echo auth()->username; ?> - Web Developer
								<small><?php auth()->email; ?></small>
							</p>
						</li>
							<!-- Menu Body -->
						<li class="user-body">
							<div class="col-xs-4 text-center">
								<a href="#">Followers</a>
							</div>
							<div class="col-xs-4 text-center">
								<a href="#">Sales</a>
							</div>
							<div class="col-xs-4 text-center">
								<a href="#">Friends</a>
							</div>
						</li>
							<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="#" class="btn btn-default btn-flat">Profile</a>
							</div>
							<div class="pull-right">
								<a href="<?php echo site_url('administrator/lock/signout'); ?>" class="btn btn-default btn-flat">Sign out</a>
							</div>
						</li>
					</ul>
				</li>
				<!-- Control Sidebar Toggle Button -->
				<li>
					<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
				</li>
			</ul>
		</div>
	</nav>
</header>
<div ng-app="menuApp">