<?php
include 'path.php';
include 'app/database/db.php';
$posts = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-term'])) {
	$posts = searchInTitleAndContent($_POST['search-term'], 'posts', 'users');
}
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
		<section class="articles">
			<div class="container-md">
				<h2 class="section-title">Результаты поиска</h2>
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