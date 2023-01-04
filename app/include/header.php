<header class="header">
	<div class="container-md">
		<p class="header__logo">Daria Smirnova</p>
		<div class="header__menu-wrapper">
			<?php include 'menu.php'; ?>
			<div class="search">

				<form action="<?= BASE_URL . 'search.php' ?>" class="search-form" method="post">
					<button type="submit" class="search-btn">
						<i class="fa-solid fa-magnifying-glass search-icon"></i>
					</button>
					<input type="text" name="search-term" placeholder="поиск по статьям" class="search-input">
				</form>
			</div>
		</div>
	</div>
</header>