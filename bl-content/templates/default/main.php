<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Material Design Lite</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css" media="screen,projection">
	<link rel="stylesheet" href="<?php echo asset('assets/css/app.css') ?>">
</head>
<body>
	<nav>
		<div class="container">
			<div class="nav-wrapper">
				<a href="#" class="brand-logo">Logo</a>
				<ul class="right hide-on-med-and-down">
					<li><a href="#">Sass</a></li>
					<li><a href="#">Components</a></li>
					<li><a href="#">JavaScript</a></li>
				</ul>
				<ul id="nav-mobile" class="side-nav">
					<li><a href="#">Sass</a></li>
					<li><a href="#">Components</a></li>
					<li><a href="#">JavaScript</a></li>
					<li><a href="#">Sass</a></li>
					<li><a href="#">Components</a></li>
					<li><a href="#">JavaScript</a></li>
					<li><a href="#">Sass</a></li>
					<li><a href="#">Components</a></li>
					<li><a href="#">JavaScript</a></li>
					<li><a href="#">Sass</a></li>
					<li><a href="#">Components</a></li>
					<li><a href="#">JavaScript</a></li>
					<li><a href="#">Sass</a></li>
					<li><a href="#">Components</a></li>
					<li><a href="#">JavaScript</a></li>
					<li><a href="#">Sass</a></li>
					<li><a href="#">Components</a></li>
					<li><a href="#">JavaScript</a></li>
				</ul>
				<a href="#" data-activates="nav-mobile" class="button-collapse">
					<i class="mdi-navigation-menu"></i>
				</a>
			</div>
		</div>
	</nav>
	<div class="container">
		<br/>
		<div class="row">
			<div class="col s12 m6">
				<div class="video-container no-controls">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/O3WHfcYWS_w" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
			<div class="col s12 m6">
				<div class="row">
					<div class="col s12">
						<ul class="tabs">
						<li class="tab col s3"><a href="#test1" class="active">โพสต์ล่าสุด</a></li>
						<li class="tab col s3"><a href="#test2">โพสต์ใหม่</a></li>
						<li class="tab col s3"><a href="#test3">โพสต์ยอดนิยม</a></li>
						</ul>
					</div>
					<div id="test1" class="col s12">
						<ul class="collection">
							<li class="collection-item">Alvin</li>
							<li class="collection-item">Alvin</li>
							<li class="collection-item">Alvin</li>
							<li class="collection-item">Alvin</li>
						</ul>
					</div>
					<div id="test2" class="col s12">
						<ul class="collection">
							<li class="collection-item">Alvin2</li>
							<li class="collection-item">Alvin2</li>
							<li class="collection-item">Alvin2</li>
							<li class="collection-item">Alvin2</li>
						</ul>
					</div>
					<div id="test3" class="col s12">
						<ul class="collection">
							<li class="collection-item">Alvin3</li>
							<li class="collection-item">Alvin3</li>
							<li class="collection-item">Alvin3</li>
							<li class="collection-item">Alvin3</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m12 l9">
				<div class="row">
					<div class="col s12">
						<div class="panel">
							<div class="panel-heading">TEST</div>
							<ul class="collection">
								<li class="collection-item panel-desc">
									<div class="col s2 m2 board-icon">
										<img class="icon" src="http://25.media.tumblr.com/f590b2a5698ba3996773d359fbee0891/tumblr_n14rz29GuL1snowzso1_250.gif">
									</div>
									<div class="col s10 l5">
										<b>Topic</b><br/>
										description
									</div>
									<div class="col l2 hide-on-med-and-down">
										192/500
									</div>
									<div class="col l3 hide-on-med-and-down">
										lastpost
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col hide-on-med-and-down l3">
			<?php echo widget('test'); ?>
			</div>
		</div>
	</div>
	<footer class="page-footer">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="white-text">Footer Content</h5>
					<p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
				</div>
				<div class="col l4 offset-l2 s12">
					<h5 class="white-text">Links</h5>
					<ul>
					<li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
					<li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
					<li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
					<li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				© 2014 Copyright
				<span class="grey-text text-lighten-4 right">{elapsed_time} ms | {memory_usage}</span>
			</div>
		</div>
	</footer>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
	<script type="text/javascript">
	$(".button-collapse").sideNav();
	</script>
</body>
</html>