<?php
include '../../path.php';
include '../../app/database/db.php';

$topics = selectAll('topics');
$posts = selectAll('posts');
$postsAdm = selectAllFromPostsWithUsers('posts', 'users');

$id = '';
$title = '';
$text = '';
$topic = '';
$errMsg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-post'])) {
	$title = trim($_POST['post-title']);
	$text = trim($_POST['post-text']);
	$topic = $_POST['post-topics'];
	$publish = isset($_POST['publish']) ? 1 : 0;


	if ($title === '' || $text === '' || $topic === '') {
		$errMsg = 'Не все поля заполнены!';
	} elseif (mb_strlen($title, 'UTF8') < 7) {
		$errMsg = 'Название статьи должно состоять как минимум из семи символов';
	} else {

		$post = [
			'id_user' => $_SESSION['id'],
			'title' => $title,
			'img' => $_POST['post-image'],
			'content' => $text,
			'status' => $publish,
			'id_topic' => $topic
		];

		$id = insert('posts', $post);
		$post = selectOne('posts', ['id' => $id]);

		// header("location: " . BASE_URL . "admin/posts/index.php");


	}
} else {
	$title = '';
	$text = '';
}

// if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
// 	$id = $_GET['id'];
// 	$topic = selectOne('topics', ['id' => $id]);
// 	$id = $topic['id'];
// 	$name = $topic['name'];
// 	$description = $topic['description'];
// }

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])) {
// 	$name = $_POST['topic-name'];
// 	$description = $_POST['topic-description'];

// 	if ($name === '' || $description === '') {
// 		$errMsg = 'Не все поля заполнены!';
// 	} elseif (mb_strlen($name, 'UTF8') < 2) {
// 		$errMsg = 'Название категории должно состоять как минимум из двух символов';
// 	} else {

// 		$topic = [
// 			'name' => $name,
// 			'description' => $description
// 		];

// 		$id = $_POST['id'];
// 		$topic_id = update('topics', $id, $topic);

// 		header("location: " . BASE_URL . "admin/topics/index.php");


// 	}
// }

// if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
// 	$id = $_GET['delete_id'];
// 	delete('topics', $id);
// 	header("location: " . BASE_URL . "admin/topics/index.php");
// }