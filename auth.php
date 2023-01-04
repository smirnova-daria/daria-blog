<?php
include_once 'path.php';
include 'app/controllers/users.php';
?>

<?php include 'app/include/head.php'; ?>

<body>
	<?php include 'app/include/header.php'; ?>
	<main class="main">
		<section class="registration">
			<h1 class="registration__title">Войти в личный кабинет</h1>
			<form action="auth.php" method="post" class="registration__form">
				<?php include 'app/helpers/error-info.php'; ?>
				<div class="form-control">
					<label for="email">Email (при регистрации)</label>
					<input type="email" name="email" id="email" placeholder="введите email" value="<?= $email ?>">
				</div>
				<div class="form-control">
					<label for="password">Пароль</label>
					<input type="password" name="password" id="password" placeholder="введите пароль">
				</div>
				<div class="form-control">
					<button type="submit" class="form__btn" name="btn-log">Войти</button>
					<a href="registration.php">Зарегистрироваться</a>
				</div>
			</form>
		</section>
	</main>
	<?php include 'app/include/footer.php'; ?>
</body>

</html>