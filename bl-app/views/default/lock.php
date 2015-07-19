<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>BlacklistPanel | Lockscreen</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.4 -->
<link href="<?php echo adminAsset('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
<!-- Font Awesome Icons -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="<?php echo adminAsset('dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
	<div class="lockscreen-logo">
		<a href="javascript:void(0);"><b>Blacklist</b>Panel</a>
	</div>
	<!-- User name -->
	<div class="lockscreen-name"><?php echo auth()->username; ?></div>
	<!-- START LOCK SCREEN ITEM -->
	<div class="lockscreen-item">
		<!-- lockscreen image -->
		<div class="lockscreen-image">
			<img src="<?php echo empty(auth()->avatar) ? adminAsset('dist/img/no-avatar.jpg') : base_url('bl-content/users/'.auth()->id.'/'.auth()->avatar) ; ?>" alt="User Image" />
		</div>
		<!-- /.lockscreen-image -->
		<!-- lockscreen credentials (contains the form) -->
		<form class="lockscreen-credentials">
			<div class="input-group">
				<input type="password" class="form-control" placeholder="password" />
				<div class="input-group-btn">
					<button class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
				</div>
			</div>
		</form><!-- /.lockscreen credentials -->
	</div><!-- /.lockscreen-item -->
	<div class="help-block text-center">
		Enter your password to enter panel
	</div>
	<div class="text-center">
		<a href="<?php echo site_url('') ?>">Or back to home</a>
	</div>
	<div class="lockscreen-footer text-center">
		Templates by <b><a href="http://almsaeedstudio.com" class="text-black">Almsaeed Studio</a></b> <br/>
		Copyright &copy; 2014-2015 All rights reserved
	</div>
</div><!-- /.center -->
<!-- jQuery 2.1.4 -->
<script src="<?php echo adminAsset('plugins/jQuery/jQuery-2.1.4.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo adminAsset('dist/js/sha512.js') ?>"></script>
<script>
	$('form').submit(function(e) {
		e.preventDefault();
		if ($('form > div > input').val() !== '') {
			$.post('<?php echo site_url('administrator/lock/signin'); ?>', {
				login_token: CryptoJS.SHA512($('form > div > input').val()).toString(),
				<?php echo csrf_token_name(); ?>: '<?php echo csrf_token(); ?>'
			}).done(function(data) { 
				if (data === 'wait') {
					alert('มีการพยายาม login มากเกินไป กรุณารอ 15 นาที');
					$('form > div > input').val('');
				} else if (data === 'wrong') {
					alert('รหัสผ่านไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง');
					$('form > div > input').val('');
				} else {
					location.href = '<?php echo site_url('administrator'); ?>';
				}
			});
		}
	});
</script>
</body>
</html>
