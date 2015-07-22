<?php import('layouts/header.php'); ?>

<div class="container">
<form action="<?php echo site_url('auth/login'); ?>" method="POST">
	<div class="row">
		<div class="col-sm-offset-4 col-sm-4">
			<?php if ($error): ?>
				<div class="alert alert-danger text-center"><?php echo $error; ?></div>
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
			<div class="form-group" style="display:table">
				<div style="display:table-columm">
					<div style="display:table-cell">
						<span id="th-captcha"></span>
						<input type="text" id="captcha-code" name="captcha" class="form-control clearBoxshadow" style="height: 42px;" placeholder="captcha" autocomplete="off" required>
					</div>
					<div class="btn-group-vertical" role="group" aria-label="..." style="display:table-cell">
						<button type="button" class="btn btn-default" onclick="getCaptcha();"><i class="glyphicon glyphicon-refresh"></i></button>
						<button type="button" class="btn btn-default"><i class="glyphicon glyphicon-headphones"></i></button>
						<button type="button" class="btn btn-default" onclick="clearCaptcha();"><i class="glyphicon glyphicon-remove"></i></button>
					</div>
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
	getCaptcha();
	$('form').on('submit', function() {
		var data = $('input#passwd').val();
		$('input#login_token').val(CryptoJS.SHA512(data).toString());
		$('input#passwd').val(Math.random().toString(36).substring(2, data.length + 2));
	});
});
getCaptcha = function () {
	$.get('<?php echo site_url('captcha') ?>').done(function(res) {
		$('#th-captcha').html('<img src="'+ res +'" height="85" width="100%"/>');
	});
}
clearCaptcha = function () {
	$('#captcha-code').val('');
	$('#captcha-code').select();
}
</script>
<?php import('layouts/footer.php'); ?>