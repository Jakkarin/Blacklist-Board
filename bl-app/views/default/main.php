<html lang="th" ng-app="App">
<head>
	<meta name="viewport" content="initial-scale=1" />
	<title>Administrator - dashboard</title>
	<link rel="stylesheet" href="<?php echo adminAsset('assets/css/angular-material.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo adminAsset('assets/css/app.css'); ?>">
	<link rel="stylesheet" href="<?php echo adminAsset('assets/css/ngProgress.css'); ?>">
</head>
<body layout="row" ng-controller="AppLayout" style="display:none;">
	<md-sidenav layout="column" class="site-sidenav md-sidenav-left md-whiteframe-z2 ng-isolate-scope md-locked-open md-closed" md-component-id="left" md-is-locked-open="$mdMedia('gt-sm')">
		<header class="nav-header">
			<img src="<?php echo adminAsset('assets/img/logo.jpg'); ?>" alt="" style="width:100%;">
		</header>
		<md-content layout-padding>
			<ul>
				<li ng-repeat="list in menuData">
					<md-button href="{{ list.link }}" class="md-primary" >
						{{ list.name }}
					</md-button>
				</li>
			</ul>
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
					{{ pageName }}
				</span>
			</h1>
		</div>
	</md-toolbar>
	<div layout="column" flex id="content">
		<md-content layout="column" ng-view flex class="md-padding"></md-content>
	</div>
	</div>
	<script type="text/javascript">
		var mURL = '<?php echo base_url('administrator'); ?>';
		var mAsset = '<?php echo adminAsset('/') ?>';
		var textHeader = document.getElementById('textHeader');
	</script>
	<script src="<?php echo adminAsset('assets/js/angular.min.js'); ?>"></script>
	<script src="<?php echo adminAsset('assets/js/angular-animate.min.js'); ?>"></script>
	<script src="<?php echo adminAsset('assets/js/angular-aria.min.js'); ?>"></script>
	<script src="<?php echo adminAsset('assets/js/angular-route.min.js'); ?>"></script>
	<script src="<?php echo adminAsset('assets/js/ngProgress.min.js'); ?>"></script>
	<script src="<?php echo adminAsset('assets/js/angular-material.min.js'); ?>"></script>
	<script src="<?php echo adminAsset('controller/mainController.js'); ?>"></script>
</body>
</html>