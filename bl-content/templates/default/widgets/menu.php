<div class="left-menu">
	<div id="dl-menu" class="dl-menuwrapper row">
		<div class="dl-trigger col-xs-2">
			<button>Open Menu</button>
		</div>
		<div class="col-xs-10 bg-black">
			<img src="<?php echo asset('assets/img/logo.jpg') ?>" width="45px">
			&nbsp; Jakkarin - Logout
		</div>
		<ul class="dl-menu col-xs-12">
	<?php foreach ($a1 as $v1): ?>
			<li>
				<a href="<?php echo $v1['link']; ?>" class="truncate"><?php echo $v1['name']; ?></a>
				<?php if (in_array($v1['id'], $c2)): ?>
				<ul class="dl-submenu">
					<?php foreach ($a2 as $v2): ?>
					<?php if ($v2['sub'] === $v1['id']): ?>
					<li>
						<a href="<?php echo $v2['link']; ?>"><?php echo $v2['name']; ?></a>
						<?php if (in_array($v2['id'], $c3)): ?>
						<ul class="dl-submenu">
							<?php foreach ($a3 as $v3): ?>
							<?php if ($v3['sub'] === $v2['id']): ?>
							<li><a href="<?php echo $v3['link']; ?>"><?php echo $v3['name']; ?></a></li>
							<?php endif; ?>
							<?php endforeach; ?>
						</ul>
						<?php endif; ?>
					</li>
					<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			</li>
	<?php endforeach; ?>
		</ul>
	</div>
</div>