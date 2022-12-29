<?php if (count($errMsg) > 0): ?>
	<ul style="color: darkred;">
		<?php foreach ($errMsg as $error): ?>
			<li>
				<?= $error ?>
			</li>
			<?php endforeach; ?>
	</ul>
<?php endif; ?>