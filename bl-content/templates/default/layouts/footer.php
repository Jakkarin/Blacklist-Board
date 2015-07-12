<footer class="bg-black">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				Blacklsit Board Powered by BlacklistBB Develop by Jakkarin <br/>
				Version 0.0001 [DEV]
			</div>
			<div class="col-sm-6">
				{elapsed_time} ms | {memory_usage}
			</div>
		</div>
	</div>
</footer>
<script type="text/javascript" src="<?php echo asset('assets/js/modernizr.custom.js') ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/js/jquery-2.1.4.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo asset('assets/js/jquery.dlmenu.js') ?>"></script>
<script type="text/javascript">
	$(function() {
		$( '#dl-menu' ).dlmenu();
	});
</script>
</body>
</html>