<?php
session_start();
// include '../../path.php';
?>

<header class="header">
	<div class="container-md">
		<p class="header__logo">My blog</p>
		<nav class="header__menu menu">
			<ul class="menu__list">
				<li>
					<a href="" class="menu-header__link">
						<?= $_SESSION['login']; ?>
					</a>
				</li>
				<li>
					<a href="<?= BASE_URL . 'logout.php' ?>" class="menu-header__link">
						Выйти
					</a>
				</li>
			</ul>
		</nav>
	</div>
</header>