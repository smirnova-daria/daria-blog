<div class="pagination">
	<ul>
		<li><a href="<?= BASE_URL . '?page=1' ?>">1</a></li>

		<?php if ($totalPages > 2): ?>
			<?php for ($i = 2; $i < $totalPages; $i++): ?>
				<li><a href="<?= BASE_URL . '?page=' . $i ?>">
						<?= $i ?>
					</a></li>
				<?php endfor; ?>
			<?php endif; ?>

		<li><a href="<?= BASE_URL . '?page=' . $totalPages ?>">
				<?= $totalPages ?>
			</a></li>
	</ul>
</div>