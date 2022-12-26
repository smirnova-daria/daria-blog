

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
				<a href="create.php">Добавить пользователя</a>
				<a href="index.php">Управлять пользователями</a>
			</div>

			<h1>Добавление пользователя</h1>

			<iv class="post__create">
				<form action="create.php" method="post">
					<div class="form-control">
						<label for="login">Логин</label>
						<input type="text" name="login" id="login" placeholder="введите логин" value="">
					</div>
					<div class="form-control">
						<label for="email">Email</label>
						<input type="email" name="email" id="email" placeholder="введите email" value="">
					</div>
					<div class="form-control">
						<label for="password">Пароль</label>
						<input type="password" name="password" id="password" placeholder="введите пароль">
					</div>
					<div class="form-control">
						<label for="password-repeat">Повторите пароль</label>
						<input type="password" name="password-repeat" id="password-repeat" placeholder="повторите пароль">
					</div>
					<select name="user-role" id="">
						<option value="user">user</option>
						<option value="admin">admin</option>
					</select>
					<button type="submit">Создать</button>
				</form>
				</div>
		</section>
	</main>


	<?php include("../../app/include/footer.php"); ?>
</body>

</html>