<header class="header">
	<div class="container-md">
		<p class="header__logo">My blog</p>
		<?php include 'menu.php'; ?>
		<div class="search">
			<form action="<?= BASE_URL . 'search.php' ?>" class="search-form" method="post">
				<input type="text" name="search-term" placeholder="search...">
			</form>
		</div>
	</div>
</header>