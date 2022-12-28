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

			<h1>Добавление записи</h1>

			<p style="color: darkred"><?= $errMsg ?></p>
			<div class="post__create">
				<form action="create.php" method="post">
					<label for="post-title">Название статьи</label>
					<input type="text" id="post-title" name="post-title" placeholder="Название статьи">
					<label for="editor">Содержимое статьи</label>
					<textarea name="post-text" id="editor" cols="100" rows="10" placeholder="Текст статьи"></textarea>
					<label for="post-image">Выберите обложку для статьи</label>
					<input type="file" name="post-image" id="post-image">
					<select name="post-topics">
						<option value="">Категория: </option>
						<?php foreach ($topics as $key => $topic): ?>
						<option value="<?= $topic['id'] ?>"><?= $topic['name'] ?></option>
						<?php endforeach; ?>
					</select>
					<button type="submit" name="add-post">Опубликовать</button>
				</form>
			</div>
		</section>
	</main>


	<?php include("../../app/include/footer.php"); ?>

	<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
	<script src="../../assets/js/script.js"></script>
</body>

</html>