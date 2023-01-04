<?php
include '../../app/controllers/posts.php';
?>

<?php include '../../app/include/head.php'; ?>

<body>
	<?php include("../../app/include/header-admin.php"); ?>


	<main class="main">
		<?php include '../../app/include/sidebar-admin.php'; ?>

		<section class="posts">
			<h1>Редактирование записи</h1>
			<?php include '../../app/helpers/error-info.php'; ?>
			<div class="post__create">
				<form action="edit.php" method="post" enctype="multipart/form-data">
					<input name="id" value="<?= $id ?>" type="hidden">
					<label for="post-title">Название статьи</label>
					<input type="text" id="post-title" name="post-title" placeholder="Название статьи" value="<?= $title ?>">
					<label for="editor">Содержимое статьи</label>
					<textarea name="post-text" id="editor" cols="100" rows="10" placeholder="Текст статьи"><?= $text ?></textarea>
					<label for="post-image">Выберите обложку для статьи</label>
					<input type="file" name="post-image" id="post-image">
					<select name="post-topics">
						<?php foreach ($topics as $key => $top): ?>
							<option value="<?= $top['id'] ?>" <?php if ($top['id'] === $topic): ?> selected <?php endif; ?>>
								<?= $top['name'] ?>
							</option>
						<?php endforeach; ?>
					</select>
					<?php if (empty($publish) || $publish === 0): ?>
						<input type="checkbox" name="publish" id="publish">
						<label for="publish">Опубликовать</label>
					<?php else: ?>
						<input type="checkbox" name="publish" id="publish" value="1" checked>
						<label for="publish">Опубликовать</label>
					<?php endif; ?>
					<button type="submit" name="edit-post">Сохранить</button>
				</form>
			</div>
		</section>
	</main>


	<?php include("../../app/include/footer.php"); ?>

	<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
	<script src="../../assets/js/script.js"></script>
</body>

</html>