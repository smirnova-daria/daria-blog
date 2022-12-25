<header class="header">
	<div class="container-md">
		<p class="header__logo">My blog</p>
		<nav class="header__menu menu">
			<ul class="menu__list">
				<li><a href="<?php echo BASE_URL ?>" class="menu__link">Главная</a></li>
				<li><a href="<?php echo BASE_URL . 'article.php' ?>" class="menu__link">Статьи</a></li>
				<li><a href="" class="menu__link">Контакты</a></li>
				<li>
					<?php if (isset($_SESSION['id'])): ?>
					<a href="" class="menu-header__link"><?= $_SESSION['login']; ?></a>
					<ul>
						<?php if ($_SESSION['admin']): ?>
						<li><a href="<?php echo BASE_URL . 'registration.php' ?>" class="menu-header__link">Админ панель</a></li>
						<?php endif; ?>
						<li><a href="<?= BASE_URL . 'logout.php' ?>" class="menu-header__link">Выйти</a></li>
					</ul>
					<?php else: ?>
					<a href="<?= BASE_URL . 'auth.php' ?>" class="menu-header__link">Войти</a>
					<ul>
						<li><a href="<?= BASE_URL . 'registration.php' ?>">Регистрация</a></li>
					</ul>
					<?php endif; ?>
				</li>
			</ul>
		</nav>
	</div>
</header>