<?php
include '../../app/controllers/posts.php';
?>
<?php include '../../app/include/head.php'; ?>

<body>
	<?php include("../../app/include/header.php"); ?>


	<main class="main">
		<?php include '../../app/include/sidebar-admin.php'; ?>

		<section class="posts">
			<div class="posts__controlls">
				<a href="create.php">Добавить пост</a>
				<a href="index.php">Управлять постами</a>
			</div>

			<h1>Добавление записи</h1>
			<?php include '../../app/helpers/error-info.php'; ?>
			<div class="post__create">
				<form action="create.php" method="post" enctype="multipart/form-data">
					<label for="post-title">Название статьи</label>
					<input type="text" id="post-title" name="post-title" placeholder="Название статьи" value="<?= $title ?>">
					<label for="editor">Содержимое статьи</label>
					<textarea name="post-text" id="editor" cols="100" rows="10" placeholder="Текст статьи"><?= $text ?></textarea>
					<label for="post-image">Выберите обложку для статьи</label>
					<input type="file" name="post-image" id="post-image">
					<select name="post-topics">
						<option value="">Категория: </option>
						<?php foreach ($topics as $key => $topic): ?>
							<option value="<?= $topic['id'] ?>">
								<?= $topic['name'] ?>
							</option>
						<?php endforeach; ?>
					</select>
					<input type="checkbox" name="publish" id="publish" value="1">
					<label for="publish">Опубликовать</label>
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