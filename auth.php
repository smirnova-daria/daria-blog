<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Личный Блог &mdash; Смирнова Дарья</title>
</head>

<body>
	<header class="header">
		<div class="container-md">
			<p class="header__logo">My blog</p>
			<nav class="header__menu menu">
				<ul class="menu__list">
					<li><a href="/" class="menu__link">Главная</a></li>
					<li><a href="/articles" class="menu__link">Статьи</a></li>
					<li><a href="/contacts" class="menu__link">Контакты</a></li>
					<!-- <li><a href="" class="menu-header__link">Личный кабинет</a>
				<ul>
					<li><a href="" class="menu-header__link">Админ панель</a></li>
					<li><a href="" class="menu-header__link">Выйти</a></li>
				</ul>
				</li> -->
				</ul>
			</nav>
		</div>
	</header>
	<main class="main">
		<section class="registration">
			<h1 class="registration__title">Войти в личный кабинет</h1>
			<form action="auth.html" method="post" class="registration__form">
				<div class="form-control">
					<label for="login">Логин</label>
					<input type="text" name="login" id="login" placeholder="введите логин">
				</div>
				<div class="form-control">
					<label for="password">Пароль</label>
					<input type="password" name="password" id="password" placeholder="введите пароль">
				</div>
				<div class="form-control">
					<button type="submit" class="form__btn">Войти</button>
					<a href="registration.html">Зарегистрироваться</a>
				</div>
			</form>
		</section>
	</main>
	<footer class="footer">
		<div class="container-md">
			<nav class="footer__menu menu">
				<ul class="menu__list">
					<li><a href="/" class="menu__link">Главная</a></li>
					<li><a href="/articles" class="menu__link">Статьи</a></li>
					<li><a href="/contacts" class="menu__link">Контакты</a></li>
				</ul>
			</nav>
			<div class="footer__info">
				<p class="footer__author">Смирнова Дарья &mdash; frontend разработчик</p>
				<time class="footer__year">2022</time>
			</div>
		</div>
	</footer>
</body>

</html>