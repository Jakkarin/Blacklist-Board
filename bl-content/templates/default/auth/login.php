<?php import('layouts/header.php'); ?>

<div class="container">
<form>
	<div class="row">
		<div class="col-sm-offset-3 col-sm-4">
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addons">
						<label for="email">Email :</label>
					</span>
					<input type="email" id="email" name="email" class="input-control">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
						<span class="input-group-addons">
							<label for="passwd">password :</label>
						</span>
						<input type="password" id="passwd" name="passwd" class="input-control">
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
</div>

<?php import('layouts/footer.php'); ?>