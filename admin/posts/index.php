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
			<article class="post">
				<span class="post__id">1</span>
				<h2 class="post__title">Название статьи</h2>
				<p class="post__author">Daria</p>
				<button class="post__edit-btn">Редактировать</button>
				<button class="post__delete-btn">Удалить</button>
			</article>
		</section>
	</main>


	<?php include("../../app/include/footer.php"); ?>
</body>

</html>