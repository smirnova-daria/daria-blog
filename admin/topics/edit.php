<?php
include '../../app/controllers/topics.php';
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
				<a href="create.php">Добавить категорию</a>
				<a href="index.php">Управлять категориями</a>
			</div>

			<h1>Обновление категории</h1>

			<div class="post__create">
				<form action="edit.php" method="post">
					<input name="id" value="<?= $id ?>" type="hidden">
					<p style="color: darkred"><?= $errMsg ?></p>
					<label for="tag-name">Название категории</label>
					<input type="text" id="topic-name" name="topic-name" placeholder="Название категории" value="<?= $name ?>">
					<label for="topic-description">Описание категории</label>
					<textarea name="topic-description" id="topic-description" cols="100" rows="10"
						placeholder="Описание категории"><?= $description ?></textarea>

					<button type="submit" name="topic-edit">Обновить</button>
				</form>
			</div>
		</section>
	</main>


	<?php include("../../app/include/footer.php"); ?>
</body>

</html>