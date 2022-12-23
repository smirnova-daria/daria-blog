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
		<section class="about">
			<div class="container-sm">
				<h2 class="section-title">Обо мне</h2>
				<div class="about__description">
					<p>Привет! 👋 Я Дарья, Frontend-разработчик.
						Уже год активно изучаю frontend-разработку.</p>
					<p>Получила базу на курсах:
					<ul>
						<li>HTML Academy (верстка, основы JS)</li>
						<li>Glo Academy (два завершенных проекта на чистом JS под руководством куратора, вошла в тройку лучших
							студентов потока)</li>
						<li>Codecademy (более продвинутый JS, React, Redux, тестирование)</li>
					</ul>
					</p>
					<p>
						Параллельно занимаюсь самостоятельно: уроки на Youtube, книги, собственные пет-проекты, статьи и best
						practies.
						Проекты пишу на React, при этом понимаю принципы работы как с классовыми компонентами, так и с хуками. Для
						управления
						состоянием использую Redux, в том числе работаю как с Redux core, так и с Redux toolkit. Умею работать с
						REST
						API, делаю
						запросы через axios. Дополнительно использую TypeScript, react-router-dom, react-redux, библиотеки
						компонентов
						(Material
						UI, Ant Design). Работала с css modules, styled component. Умею писать unit тесты с использованием jest и
						react testing
						library.
					</p>
				</div>
				<div class="about__photo">

				</div>
			</div>
		</section>
		<section class="top">
			<div class="container-md">
				<h2 class="section-title">Топ публикаций</h2>
				<div class="top__articles">
					<article class="top__article article-top">
						<img src="assets/img/articles/article1.jpg" alt="article poster" class="article-top__img">
						<h3 class="article-top__title">С чего всё начиналось</h3>
						<div class="article-top__tags">
							<span class="article-tag tag-green">#javascript</span>
							<span class="article-tag tag-blue">#php</span>
							<span class="article-tag tag-red">#blog</span>
						</div>
						<p class="article-top__description">
							Это самая первая статья о том, как всё начиналось. Зачем мне нужен блог? Какой стек используется? Какие
							этапы разработки? И многое другое...
						</p>
						<time class="article-top__date" datetime="2022-12-21">21 декабря 2022</time>
					</article>
					<article class="top__article article-top">
						<img src="assets/img/articles/article1.jpg" alt="article poster" class="article-top__img">
						<h3 class="article-top__title">С чего всё начиналось</h3>
						<div class="article-top__tags tags">
							<span class="article-tag tag-green">#javascript</span>
							<span class="article-tag tag-blue">#php</span>
							<span class="article-tag tag-red">#blog</span>
						</div>
						<p class="article-top__description">
							Это самая первая статья о том, как всё начиналось. Зачем мне нужен блог? Какой стек используется? Какие
							этапы разработки? И многое другое...
						</p>
						<time class="article-top__date" datetime="2022-12-21">21 декабря 2022</time>
					</article>
					<article class="top__article article-top">
						<img src="assets/img/articles/article1.jpg" alt="article poster" class="article-top__img">
						<h3 class="article-top__title">С чего всё начиналось</h3>
						<div class="article-top__tags">
							<span class="article-tag tag-green">#javascript</span>
							<span class="article-tag tag-blue">#php</span>
							<span class="article-tag tag-red">#blog</span>
						</div>
						<p class="article-top__description">
							Это самая первая статья о том, как всё начиналось. Зачем мне нужен блог? Какой стек используется? Какие
							этапы разработки? И многое другое...
						</p>
						<time class="article-top__date" datetime="2022-12-21">21 декабря 2022</time>
					</article>
				</div>
			</div>
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