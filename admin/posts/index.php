<?php
include '../../app/controllers/posts.php';
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&display=swap" rel="stylesheet"> -->


	<title>Личный Блог &mdash; Смирнова Дарья</title>
</head>

<body>
	<?php include("../../app/include/header-admin.php"); ?>


	<main class="main">
		<?php include '../../app/include/sidebar-admin.php'; ?>

		<section class="posts">
			<div class="posts__controlls">
				<a href="create.php">Добавить пост</a>
				<a href="index.php">Управлять постами</a>
			</div>
			<h1>Управление записями</h1>
			<div class="posts__header">
				<ul>
					<li>ID</li>
					<li>Название</li>
					<li>Автор</li>
					<li>Редактировать</li>
					<li>Удалить</li>
				</ul>
			</div>
			<?php foreach ($postsAdm as $key => $post): ?>
				<article class="post">
					<span class="post__id"><?= $key + 1 ?></span>
					<h2 class="post__title">
						<?= $post['title'] ?>
					</h2>
					<p class="post__author"><?= $post['username'] ?></p>
					<a href="edit.php?id=<?= $post['id']; ?>" class="post__edit-btn">Редактировать</a>
					<a href="edit.php?delete_id=<?= $post['id']; ?>" class="post__delete-btn">Удалить</a>
					<?php if ($post['status']): ?>
						<a href="edit.php?publish=0&pub_id=<?= $post['id'] ?>" class="post__hide-btn">В черновик</a>
						<?php else: ?>
						<a href="edit.php?publish=1&pub_id=<?= $post['id'] ?>" class="post__hide-btn">Опубликовать</a>
						<?php endif; ?>
				</article>
				<?php endforeach; ?>
		</section>
	</main>


	<?php include("../../app/include/footer.php"); ?>
</body>

</html>