<html lang="th" ng-app="App">
<head>
	<title>Administrator - dashboard</title>
	<link rel="stylesheet" href="<?php echo adminAsset('assets/css/angular-material.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo adminAsset('assets/css/app.css'); ?>">
	<meta name="viewport" content="initial-scale=1" />
</head>
<body layout="row" ng-controller="AppLayout" style="display:none;">
	<md-sidenav layout="column" class="site-sidenav md-sidenav-left md-whiteframe-z2 ng-isolate-scope md-locked-open md-closed" md-component-id="left" md-is-locked-open="$mdMedia('gt-sm')">
		<header class="nav-header">
			<img src="<?php echo adminAsset('assets/img/logo.jpg'); ?>" alt="" style="width:100%;">
		</header>
		<md-content layout-padding>
			<md-button class="md-primary" ng-click="closeSidenav('left')">
				close
			</md-button>
			<md-button class="md-primary" ng-click="ctest(this)">
				close
			</md-button>
		</md-content>
	</md-sidenav>
	<div layout="column" tabindex="-1" role="main" flex="">
	<md-toolbar layout="row">
		<div class="md-toolbar-tools">
			<md-button ng-click="toggleSidenav('left')" hide-gt-sm class="md-icon-button">
				<md-icon aria-label="Menu" md-svg-icon="<?php echo adminAsset('assets/icon/menu.svg'); ?>"></md-icon>
			</md-button>
			<h1>
				<span hide-sm>
					Administrator 
					<md-icon aria-hidden="true" md-svg-src="<?php echo adminAsset('assets/icon/icon_right.svg'); ?>"></md-icon>
				</span>
				<span id="textHeader">
					{{ textHeader }}
				</span>
			</h1>
		</div>
	</md-toolbar>
	<div layout="column" flex id="content">
		<md-content layout="column" ng-controller="AppContent" flex class="md-padding">
			<div class="md-toolbar-tools">
				<h3 class="ng-binding">Toolbar</h3>
			</div>
		</md-content>
	</div>
	</div>
	
	<script src="<?php echo adminAsset('assets/js/angular.min.js'); ?>"></script>
	<script src="<?php echo adminAsset('assets/js/angular-animate.min.js'); ?>"></script>
	<script src="<?php echo adminAsset('assets/js/angular-aria.min.js'); ?>"></script>
	<script src="<?php echo adminAsset('assets/js/angular-material.min.js'); ?>"></script>
	<script src="<?php echo adminAsset('controller/mainController.js'); ?>"></script>
</body>
</html>