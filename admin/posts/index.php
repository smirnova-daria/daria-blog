<?php
include '../../app/controllers/posts.php';
?>

<?php include '../../app/include/head.php'; ?>

<body>
	<?php include '../../app/include/header.php'; ?>


	<main class="main">
		<div class="container-md">
			<div class="admin__wrapper">
				<?php include '../../app/include/sidebar-admin.php'; ?>

				<section class="admin__posts">
					<h2 class="admin__main-title">Управление записями</h2>

					<div class="admin__table">
						<div class="admin__table-head grid-5-cols">
							<h5 class="admin__table-head">ID</h5>
							<h5 class="admin__table-head">Название</h5>
							<h5 class="admin__table-head">Автор</h5>
							<h5 class="admin__table-head">Управление</h5>
						</div>


						<?php foreach ($postsAdm as $key => $post): ?>
							<article class="admin__table-row grid-5-cols admin__post">


								<span class="admin__post-id"><?= $key + 1 ?></span>
								<p class="admin__post-title">
									<?= $post['title'] ?>
								</p>
								<p class="admin__post-author"><?= $post['username'] ?></p>
								<div class="admin__post-controlls">
									<a href="edit.php?id=<?= $post['id']; ?>" class="admin__post-edit-btn">Редактировать</a>
									<a href="edit.php?delete_id=<?= $post['id']; ?>" class="admin__post-delete-btn">Удалить</a>
									<?php if ($post['status']): ?>
										<a href="edit.php?publish=0&pub_id=<?= $post['id'] ?>" class="admin__post-hide-btn">В черновик</a>
									<?php else: ?>
										<a href="edit.php?publish=1&pub_id=<?= $post['id'] ?>" class="admin__post-hide-btn">Опубликовать</a>
									<?php endif; ?>
								</div>
							</article>
						<?php endforeach; ?>
					</div>

					<a href="create.php" class="admin__add-post-btn">Добавить пост</a>

				</section>
			</div>
		</div>
	</main>


	<?php include '../../app/include/footer.php'; ?>
</body>

</html>