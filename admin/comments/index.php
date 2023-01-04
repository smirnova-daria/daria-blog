<?php
include '../../app/database/db.php';
include '../../app/controllers/comments.php';
?>

<?php include '../../app/include/head.php'; ?>

<body>
	<?php include("../../app/include/header-admin.php"); ?>


	<main class="main">
		<?php include '../../app/include/sidebar-admin.php'; ?>

		<section class="posts">
			<h1>Управление комментариями</h1>
			<div class="posts__header">
				<ul>
					<li>ID</li>
					<li>Текст</li>
					<li>Автор</li>
					<li>Редактировать</li>
					<li>Удалить</li>
				</ul>
			</div>
			<?php foreach ($commentsForAdm as $key => $comment): ?>
				<article class="post">
					<span class="post__id"><?= $comment['id'] ?></span>
					<h4 class="post__title">
						<?= $comment['comment'] ?>
					</h4>
					<p class="post__author"><?= $comment['email'] ?></p>
					<a href="edit.php?id=<?= $comment['id']; ?>" class="post__edit-btn">Редактировать</a>
					<a href="edit.php?delete_id=<?= $comment['id']; ?>" class="post__delete-btn">Удалить</a>
					<?php if ($comment['status']): ?>
						<a href="edit.php?publish=0&pub_id=<?= $comment['id'] ?>" class="post__hide-btn">В черновик</a>
					<?php else: ?>
						<a href="edit.php?publish=1&pub_id=<?= $comment['id'] ?>" class="post__hide-btn">Опубликовать</a>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</section>
	</main>


	<?php include("../../app/include/footer.php"); ?>
</body>

</html>