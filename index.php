<?php
include 'path.php';
include 'app/database/db.php';
$posts = selectAll('posts', ['status' => 1]);
$topPosts = selectTopTopics('posts');
?>

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
	<?php include("app/include/header.php"); ?>
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
					<?php foreach ($topPosts as $post): ?>
						<article class="top__article article-top">
							<img src=" <?= BASE_URL . "assets/img/posts/" . $post['img'] ?>" alt="article poster"
								class="article-top__img">
							<a href="<?= BASE_URL . 'article.php?post=' . $post['id'] ?>">
								<h3 class="article-top__title">
									<?= substr($post['title'], 0, 120) ?>
								</h3>
							</a>
						</article>
						<?php endforeach; ?>

				</div>
			</div>
		</section>
		<section class="articles">
			<div class="container-md">
				<h2 class="section-title">Все публикации</h2>
				<div class="top__articles">
					<?php foreach ($posts as $post): ?>
						<article class="top__article article-top">
							<img src=" <?= BASE_URL . "assets/img/posts/" . $post['img'] ?>" alt="article poster"
								class="article-top__img">
							<a href="<?= BASE_URL . 'article.php?post=' . $post['id'] ?>">
								<h3 class="article-top__title">
									<?= substr($post['title'], 0, 120) ?>
								</h3>
							</a>
							<div class="article-top__tags">
								<span class="article-tag tag-green">#javascript</span>
								<span class="article-tag tag-blue">#php</span>
								<span class="article-tag tag-red">#blog</span>
							</div>
							<p class="article-top__description">
								<?= substr($post['content'], 0, 150) ?>
							</p>
							<time class="article-top__date" datetime="2022-12-21"><?= $post['created_date'] ?></time>
						</article>
						<?php endforeach; ?>

				</div>
			</div>
		</section>
	</main>
	<?php include("app/include/footer.php"); ?>
</body>

</html>