<?php
include '../../app/database/db.php';
include '../../app/controllers/comments.php';
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