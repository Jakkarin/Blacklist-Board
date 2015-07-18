		</div>
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 2.2.0 | {elapsed_time} ms | {memory_usage}
			</div>
			<strong>Templates by <b><a href="http://almsaeedstudio.com" class="text-black">Almsaeed Studio</a></b> Copyright &copy; 2014-2015.</strong> All rights reserved.
		</footer>
		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Create the tabs -->
			<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
				<li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
				<li><a href="#control-sidebar-stats-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
				<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
				<!-- Home tab content -->
				<div class="tab-pane active" id="control-sidebar-home-tab">
					<h3 class="control-sidebar-heading">Recent Activity</h3>
				</div><!-- /.tab-pane -->
				<!-- Stats tab content -->
				<div class="tab-pane" id="control-sidebar-stats-tab">
					<h3 class="control-sidebar-heading">Stats Tab Content</h3>
				</div><!-- /.tab-pane -->
				<!-- Settings tab content -->
				<div class="tab-pane" id="control-sidebar-settings-tab">
					<h3 class="control-sidebar-heading">Setting</h3>
				</div><!-- /.tab-pane -->
			</div>
		</aside><!-- /.control-sidebar -->
		<div class="control-sidebar-bg"></div>
	</div>
	<script type="text/javascript">
		var mURL = '<?php echo base_url('administrator'); ?>';
		var mAsset = '<?php echo adminAsset('/') ?>';
	</script>
	<script src="<?php echo adminAsset('assets/js/angular.min.js'); ?>"></script>
	<script src="<?php echo adminAsset('assets/js/angular-route.min.js'); ?>"></script>
	<script src="<?php echo adminAsset('assets/js/ngProgress.min.js'); ?>"></script>
	<script src="<?php echo adminAsset('controller/menuController.js'); ?>"></script>
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