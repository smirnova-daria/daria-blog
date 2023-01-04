<?php
include_once 'path.php';
include 'app/database/db.php';
$post = selectOne('posts', ['id' => $_GET['post']]);
?>

<?php include 'app/include/head.php'; ?>

<body>
	<?php include 'app/include/header.php'; ?>
	<main class="main">
		<section class="article-section">
			<div class="container-md">
				<img src=" <?= BASE_URL . "assets/img/posts/" . $post['img'] ?>" alt="article banner" class="article__img">
			</div>
			<div class="container-sm">
				<article class="article">
					<h1 class="article__title">
						<?= $post['title'] ?>
					</h1>
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
						<time class="article-date" datetime="2022-12-21">
							<?= $post['created_date'] ?>
						</time>
					</div>
					<div class="article__text">
						<?= $post['content'] ?>
					</div>
				</article>
			</div>
		</section>
		<?php include 'app/include/comments.php'; ?>
	</main>
	<?php include 'app/include/footer.php'; ?>
</body>

</html>