<?php
include_once '../../path.php';
include '../../app/controllers/users.php';
?>

<?php include '../../app/include/head.php'; ?>

<body>
	<?php include '../../app/include/header.php'; ?>


	<main class="main">
		<?php include '../../app/include/sidebar-admin.php'; ?>

		<section class="posts">
			<div class="posts__controlls">
				<a href="create.php">Добавить пользователя</a>
				<a href="index.php">Управлять пользователями</a>
			</div>
			<h1>Пользователи</h1>
			<div class="posts__header">
				<ul>
					<li>ID</li>
					<li>Логин</li>
					<li>Email</li>
					<li>Роль</li>
					<li>Редактировать</li>
					<li>Удалить</li>
				</ul>
			</div>
			<div class="users" style="display: flex; flex-wrap: wrap; gap: 1rem;">
				<?php foreach ($users as $key => $user): ?>
					<article class="post" style="border: 1px solid #eee;">
						<span class="post__id"><?= $user['id'] ?></span>
						<p class="post__title">
							<?= $user['username'] ?>
						</p>
						<p class="post__title">
							<?= $user['email'] ?>
						</p>
						<p class="post__author">
							<?php if ($user['admin'] === 1): ?>admin<?php else: ?>user<?php endif; ?>
						</p>
						<a href="edit.php?edit_id=<?= $user['id']; ?>" class="post__edit-btn">Редактировать</a>
						<a href="index.php?delete_id=<?= $user['id']; ?>" class="post__delete-btn">Удалить</a>
					</article>
				<?php endforeach; ?>
			</div>
		</section>
	</main>


	<?php include '../../app/include/footer.php'; ?>
</body>

</html>