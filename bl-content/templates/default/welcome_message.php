<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Material Design Lite</title>
	<link rel="stylesheet" href="<?php echo asset('assets/css/material.min.css') ?>">
	<link rel="stylesheet" href="<?php echo asset('assets/css/app.css') ?>">
</head>
<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--overlay-drawer-button container is-upgraded">
		<header class="mdl-layout__header mdl-layout__header--scroll mdl-layout__header--transparent header">
				<div class="mdl-layout__header-row">
					<span class="mdl-layout-title">Title</span>
					<div class="mdl-layout-spacer"></div>
				</div>
				<div class="mdl-layout__header-row mdl-layout--large-screen-only">
					<div class="mdl-layout-spacer"></div>
					<nav class="waterfall-demo-header-nav mdl-navigation">
						<a class="mdl-button mdl-js-button" href="">Link</a>
						<a class="mdl-button mdl-js-button" href="">Link</a>
						<a class="mdl-button mdl-js-button" href="">Link</a>
						<a class="mdl-button mdl-js-button" href="">Link</a>
					</nav>
				</div>
		</header>
		<div class="mdl-layout__drawer">
			<span class="mdl-layout-title">Title</span>
			<nav class="mdl-navigation">
				<a class="mdl-navigation__link" href="">Link</a>
				<a class="mdl-navigation__link" href="">Link</a>
				<a class="mdl-navigation__link" href="">Link</a>
				<a class="mdl-navigation__link" href="">Link</a>
			</nav>
		</div>
		<main class="mdl-layout__content">
			<div class="page-content">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--6-col">6
				</div>
				<div class="mdl-cell mdl-cell--6-col">
					<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
						<div class="mdl-tabs__tab-bar">
							<a href="#starks-panel" class="mdl-tabs__tab is-active">Starks</a>
							<a href="#lannisters-panel" class="mdl-tabs__tab">Lannisters</a>
							<a href="#targaryens-panel" class="mdl-tabs__tab">Targaryens</a>
						</div>

						<div class="mdl-tabs__panel is-active" id="starks-panel">
							<ul>
								<li>Eddard</li>
								<li>Catelyn</li>
								<li>Robb</li>
								<li>Sansa</li>
								<li>Brandon</li>
								<li>Arya</li>
								<li>Rickon</li>
							</ul>
						</div>
						<div class="mdl-tabs__panel" id="lannisters-panel">
							<ul>
								<li>Tywin</li>
								<li>Cersei</li>
								<li>Jamie</li>
								<li>Tyrion</li>
							</ul>
						</div>
						<div class="mdl-tabs__panel" id="targaryens-panel">
							<ul>
								<li>Viserys</li>
								<li>Daenerys</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--12-col text-center">
					<div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div>
				</div>
			</div>
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--8-col">
					
				</div>
				<div class="mdl-cell mdl-cell--4-col">
					
				</div>
			</div>
		</main>
	</div>


	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="<?php echo asset('assets/js/material.min.js') ?>"></script>
</body>
</html>