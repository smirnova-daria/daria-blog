<aside class="admin__sidebar">
	<ul>
		<li><a href="<?= BASE_URL . "admin/posts/index.php" ?>" <?php if (strpos($_SERVER['REQUEST_URI'], 'admin/posts')): ?>class="active-link" <?php endif; ?>>Записи</a></li>
		<li><a href="<?= BASE_URL . "admin/users/index.php" ?>" <?php if (strpos($_SERVER['REQUEST_URI'], 'admin/users')): ?>class="active-link" <?php endif; ?>>Пользователи</a></li>
		<li><a href="<?= BASE_URL . "admin/topics/index.php" ?>" <?php if (strpos($_SERVER['REQUEST_URI'], 'admin/topics')): ?>class="active-link" <?php endif; ?>>Категории</a></li>
		<li><a href="<?= BASE_URL . "admin/comments/index.php" ?>" <?php if (strpos($_SERVER['REQUEST_URI'], 'admin/comments')): ?>class="active-link" <?php endif; ?>>Комментарии</a></li>
	</ul>
</aside>