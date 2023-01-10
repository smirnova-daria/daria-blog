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
			<h2 class="admin__main-title">Добавление записи</h2>
			<?php include '../../app/helpers/error-info.php'; ?>

				<form action="create.php" method="post" enctype="multipart/form-data" class="admin__form">
                    <div class="admin__form-control admin__form-control--line">
                        <label for="post-title">Название статьи</label>
                        <input type="text" id="post-title" name="post-title" placeholder="Название статьи"
                               value="<?= $title ?>">
                    </div>
                    <div class="admin__form-control">
                        <label for="editor">Содержимое статьи</label>
                        <textarea name="post-text" id="editor" cols="100" rows="10" placeholder="Текст статьи"
                                  class="editor"><?= $text ?></textarea>
                    </div>
                    <div class="admin__form-control admin__form-control--line">
                        <label for="post-image">Выберите обложку для статьи</label>
                        <input type="file" name="post-image" id="post-image">
                    </div>
                    <div class="admin__form-control admin__form-control--line">
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
                    </div>
					<button type="submit" name="add-post" class="admin__form-save-btn">Опубликовать</button>
				</form>

		</section>
            </div>
        </div>
	</main>


	<?php include '../../app/include/footer.php'; ?>

	<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
	<script src="../../assets/js/script.js"></script>
</body>

</html>