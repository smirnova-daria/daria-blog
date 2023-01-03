<?php
include 'app/controllers/comments.php';
?>

<section class="comments-section">
	<h3>Оставить комментарий</h3>
	<form action="<?= BASE_URL . 'article.php?post=' . $page ?>" method="post">
		<div style="color: darkred;">
			<?php include 'app/helpers/error-info.php'; ?>
		</div>
		<input type="hidden" value="<?= $page ?>">
		<label for="comments-email">Ваш email</label>
		<input type="email" name="email" id="comments-email" value="<?= $email ?>">
		<label for="comments-text">Комментарий</label>
		<textarea name="comment" id="comments-text" cols="30" rows="5"><?= $commentText ?></textarea>
		<button type="submit" name="send-comment">Отправить</button>
	</form>

	<h3>Комментарии</h3>
	вывод комментариев
</section>