<?php
include('path.php');
include('app/controllers/users.php');
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Личный Блог &mdash; Смирнова Дарья</title>
</head>

<body>
	<?php include("app/include/header.php"); ?>
	<main class="main">
		<section class="registration">
			<h1 class="registration__title">Форма регистрации</h1>
			<form action="registration.php" method="post" class="registration__form">
				<div class="form-control">
					<label for="login">Логин</label>
					<input type="text" name="login" id="login" placeholder="введите логин">
				</div>
				<div class="form-control">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" placeholder="введите email">
				</div>
				<div class="form-control">
					<label for="password">Пароль</label>
					<input type="password" name="password" id="password" placeholder="введите пароль">
				</div>
				<div class="form-control">
					<label for="password-repeat">Повторите пароль</label>
					<input type="password" name="password-repeat" id="password-repeat" placeholder="повторите пароль">
				</div>
				<div class="form-control">
					<button type="submit" name="btn-reg" class="form__btn">Зарегистрироваться</button>
					<a href="auth.php">Войти</a>
				</div>
			</form>
		</section>
	</main>
	<?php include("app/include/footer.php"); ?>
</body>

</html>