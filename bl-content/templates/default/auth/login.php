<?php import('layouts/header.php'); ?>

<div class="container">
<form action="<?php echo site_url('auth/login'); ?>" method="POST">
	<div class="row">
		<div class="col-sm-offset-4 col-sm-4">
			<?php if ($error): ?>
				<div class="error text-center"><?php echo $error; ?></div>
			<?php endif; ?>
			<div class="form-group">
				<div class="input-group input-lg">
					<span class="input-group-addons">
						<label for="email"><i class="fa fa-user"></i></label>
					</span>
					<input type="email" id="email" name="email" class="input-control input-lg" placeholder="email">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group input-lg">
					<span class="input-group-addons">
						<label for="passwd"><i class="fa fa-unlock-alt"></i></label>
					</span>
					<input type="password" id="passwd" name="passwd" class="input-control input-lg" placeholder="password">
				</div>
			</div>
			<div class="form-group">
				<input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?php echo $csrf['hash']; ?>" />
				<button class="btn btn-lg width100p bg-blue">login</button>
			</div>
		</div>
	</div>
</form>
</div>

<?php import('layouts/footer.php'); ?>