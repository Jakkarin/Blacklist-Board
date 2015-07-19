<?php import('layouts/header.php'); ?>

<div class="container">
<form action="<?php echo site_url('auth/login'); ?>" method="POST">
	<div class="row">
		<div class="col-sm-offset-4 col-sm-4">
			<?php if ($error): ?>
				<div class="error text-center"><?php echo $error; ?></div>
			<?php endif; ?>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="glyphicon glyphicon-user"></i>
					</span>
					<input type="email" id="email" name="email" class="form-control" placeholder="email" required>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="glyphicon glyphicon-barcode"></i>
					</span>
					<input type="password" id="passwd" name="passwd" class="form-control" placeholder="password" required>
				</div>
			</div>
			<div class="form-group">
				<input type="hidden" name="<?php echo csrf_token_name(); ?>" value="<?php echo csrf_token(); ?>" />
				<input type="hidden" id="login_token" name="login_token" value="" />
				<button class="btn btn-info width100p">login</button>
			</div>
		</div>
	</div>
</form>
</div>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
	$('form').on('submit', function() {
		var data = $('input#passwd').val();
		$('input#login_token').val(CryptoJS.SHA512(data).toString());
		$('input#passwd').val(Math.random().toString(36).substring(2, data.length + 2));
	});
});
</script>
<?php import('layouts/footer.php'); ?>