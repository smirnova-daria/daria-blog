<?php include('path.php'); ?>

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
		<section class="article-section">
			<div class="container-md">
				<img src="assets/img/articles/article-banner.jpg" alt="article banner" class="article__img">
			</div>
			<div class="container-sm">
				<article class="article">
					<h1 class="article__title">С чего всё начиналось</h1>
					<div class="article__controlls">
						<button class="like">like</button>
						<button class="repost">repost</button>
						<button class="comment">comment</button>
					</div>
					<div class="article__info">
						<div class="tags">
							<span class="article-tag tag-green">#javascript</span>
							<span class="article-tag tag-blue">#php</span>
							<span class="article-tag tag-red">#blog</span>
						</div>
						<time class="article-date" datetime="2022-12-21">21 декабря 2022</time>
					</div>
					<div class="article__text">
						Пусть это будет моя первая запись в этом блоге.

						Сегодня было принято решение разработать собственный сайт, на котором буду выкладывать какие-то статьи
						(записи вроде
						этой), свои пет-проекты, делиться мыслями и тому подобное. Пока это просто идея пет проекта и только
						наброски того, как
						это будет выглядеть в будущем.

						Основная цель всего этого мероприятия - изучение php и применение его на практике.

						Я уже неплохо владею фронтенд частью, могу сверстать страницу и написать логику для взаимодействия с
						приложением, но вот
						полноценный бэк еще не писала, так что буду учиться.

						Ну а чтобы блог не пустовал и не был заполнен записями по типу “hello world” и “моя первая запись в блоге”,
						я решила
						записывать свои мысли по ходу разработки.

						Сегодня на повестке дня внешний вид сайта. Решила начать с простого и понятного. Зашла на сайты figma,
						dribbble и
						просмотрела варианты личного сайта, сайта-блога и тому подобное. Нашла вариант, которым буду вдохновляться.

						Примерно определила, какие разделы будут на сайте (о себе, статьи и портфолио), примерную структуру страниц,
						верстать
						начну уже завтра, сегодня поздновато.

						Вообще, хотелось бы и стек обозначить. По сути всё будет максимально просто: html, css, js, php, mysql.

						Конечно, при мыслях о собственном проекте сразу включается максимализм: сделать всё максимально классно и
						продвинуто. Но
						это и главная ловушка. Лучше сделать хоть как-то и сразу, чем хотеть сделать идеально и никогда даже не
						приступить к
						работе. Так что как бы мне ни хотелось прикрутить сразу всё - и vuejs, и scss, и какую-нибудь библиотеку
						компонентов, и
						так далее, и так далее - делать я этого, конечно, не буду. А то всё закончится командой vue create :D

						Такие итоги первой записи: есть примерный макет для верстки, поэтому завтра начинаю верстать.

						Увидимся в следующих статьях :)
					</div>
				</article>
			</div>
		</section>
	</main>
	<?php include("app/include/footer.php"); ?>
</body>

</html>