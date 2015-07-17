		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 2.2.0
			</div>
			<strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
		</footer>
		<div class="control-sidebar-bg"></div>
	</div>
	<script type="text/javascript">
		var mURL = '<?php echo base_url('administrator'); ?>';
		var mAsset = '<?php echo adminAsset('/') ?>';
	</script>
	<script src="<?php echo adminAsset('assets/js/angular.min.js'); ?>"></script>
	<script src="<?php echo adminAsset('assets/js/angular-route.min.js'); ?>"></script>
	<script src="<?php echo adminAsset('assets/js/ngProgress.min.js'); ?>"></script>
	<script src="<?php echo adminAsset('controller/mainController.js'); ?>"></script>
	<!-- jQuery 2.1.4 -->
	<script src="<?php echo adminAsset('plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script type="text/javascript">
		$.widget.bridge('uibutton', $.ui.button);
	</script>
	<!-- Bootstrap 3.3.2 JS -->
	<script src="<?php echo adminAsset('bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo adminAsset('dist/js/app.js'); ?>" type="text/javascript"></script>

</body>
</html>