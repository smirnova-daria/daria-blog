<?php
include '../../app/controllers/topics.php';
?>

<?php include '../../app/include/head.php'; ?>

<body>
	<?php include("../../app/include/header.php"); ?>


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
					<?php include '../../app/helpers/error-info.php'; ?>
					<label for="tag-name">Название категории</label>
					<input type="text" id="topic-name" name="topic-name" placeholder="Название категории" value="<?= $name ?>">
					<label for="topic-description">Описание категории</label>
					<textarea name="topic-description" id="topic-description" cols="100" rows="10"
						placeholder="Описание категории"><?= $description ?></textarea>

					<button type="submit" name="topic-create">Опубликовать</button>
				</form>
			</div>
		</section>
	</main>


	<?php include("../../app/include/footer.php"); ?>
</body>

</html>