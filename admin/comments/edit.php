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
			<h1>Редактирование комментария</h1>
			<?php include '../../app/helpers/error-info.php'; ?>
			<div class="post__create">
				<form action="edit.php" method="post">
					<input name="id" value="<?= $id ?>" type="hidden">
					<label for="post-title">Email</label>
					<input type="email" id="post-title" name="email" placeholder="Название статьи" value="<?= $email ?>" readonly>
					<label for="comment-text">Комментарий</label>
					<textarea name="comment-text" id="comment-text" cols="100" rows="10"
						placeholder="Текст статьи"><?= $text ?></textarea>

					<?php if (empty($publish) || $publish === 0): ?>
						<input type="checkbox" name="publish" id="publish">
						<label for="publish">Опубликовать</label>
						<?php else: ?>
						<input type="checkbox" name="publish" id="publish" value="1" checked>
						<label for="publish">Опубликовать</label>
						<?php endif; ?>
					<button type="submit" name="edit-comment">Сохранить</button>
				</form>
			</div>
		</section>
	</main>


	<?php include("../../app/include/footer.php"); ?>

	<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
	<script src="../../assets/js/script.js"></script>
</body>

</html>