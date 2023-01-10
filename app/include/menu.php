<nav class="header__menu menu">
	<ul class="menu__list">
		<li><a href="<?php echo BASE_URL ?>" class="menu__link">Главная</a></li>
		<li><a href="<?php echo BASE_URL . 'article.php' ?>" class="menu__link">Статьи</a></li>
		<li><a href="" class="menu__link">Контакты</a></li>
        <?php if (isset($_SESSION['id'])): ?>
		    <li class="li-with-sub">
				<a href="" class="menu__link link-sub"><?= $_SESSION['login']; ?></a>
				<ul class="menu__sub-menu">
					<?php if ($_SESSION['admin']): ?>
						<li>
							<a href="<?php echo BASE_URL . 'admin/posts/index.php' ?>" class="menu__link">Админ панель</a>
						</li>
					<?php endif; ?>
					<li><a href="<?= BASE_URL . 'logout.php' ?>" class="menu__link">Выйти</a></li>
				</ul>
			<?php else: ?>
				<li><a href="<?= BASE_URL . 'auth.php' ?>" class="menu__link">Войти</a></li>
				<li><a href="<?= BASE_URL . 'registration.php' ?>" class="menu__link">Регистрация</a></li>
		    </li>
        <?php endif; ?>
	</ul>
</nav>