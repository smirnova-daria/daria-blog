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
				<a href="create.php">Добавить категорию</a>
				<a href="index.php">Управлять категориями</a>
			</div>

			<h1>Добавление категории</h1>

			<div class="post__create">
				<form action="create.php" method="post">
					<label for="tag-name">Название категории</label>
					<input type="text" id="tag-name" name="tag-name" placeholder="Название статьи">
					<label for="tag-description">Описание категории</label>
					<textarea name="tag-description" id="tag-description" cols="100" rows="10"
						placeholder="Описание категории"></textarea>

					<button type="submit">Опубликовать</button>
				</form>
			</div>
		</section>
	</main>


	<?php include("../../app/include/footer.php"); ?>
</body>

</html>