<?php
include '../../path.php';
include '../../app/database/db.php';

if (!$_SESSION) {
	header('location: ' . BASE_URL . 'auth.php');
}

$topics = selectAll('topics');
$posts = selectAll('posts');
$postsAdm = selectAllFromPostsWithUsers('posts', 'users');

$id = '';
$title = '';
$text = '';
$topic = '';
$img = '';
$publish = '';
$errMsg = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-post'])) {
	if (!empty($_FILES['post-image']['name'])) {
		$imgName = time() . "_" . $_FILES['post-image']['name'];
		$fileTmpName = $_FILES['post-image']['tmp_name'];
		$fileType = $_FILES['post-image']['type'];
		$destination = ROOT_PATH . "\assets\img\posts\\" . $imgName;

		if (strpos($fileType, 'image') === false) {
			array_push($errMsg, "Moжно загружать только изображения!");
		} else {
			$result = move_uploaded_file($fileTmpName, $destination);
			if ($result) {
				$img = $imgName;
			} else {
				array_push($errMsg, 'Ошибка загрузки изображения на сервер');
			}
		}

	}

	$title = trim($_POST['post-title']);
	$text = trim($_POST['post-text']);
	$topic = $_POST['post-topics'];
	$publish = isset($_POST['publish']) ? 1 : 0;


	if ($title === '' || $text === '' || $topic === '') {
		array_push($errMsg, 'Не все поля заполнены!');
	} elseif (mb_strlen($title, 'UTF8') < 7) {
		array_push($errMsg, 'Название статьи должно состоять как минимум из семи символов');
	} else {

		$post = [
			'id_user' => $_SESSION['id'],
			'title' => $title,
			'img' => $img,
			'content' => $text,
			'status' => $publish,
			'id_topic' => $topic
		];

		insert('posts', $post);
		header("location: " . BASE_URL . "admin/posts/index.php");
	}
} else {
	$id = '';
	$title = '';
	$text = '';
	$topic = '';
	$publish = '';
	$img = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
	$post = selectOne('posts', ['id' => $_GET['id']]);

	$id = $post['id'];
	$title = $post['title'];
	$text = $post['content'];
	$topic = $post['id_topic'];
	$publish = $post['status'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-post'])) {
	$title = trim($_POST['post-title']);
	$text = trim($_POST['post-text']);
	$topic = $_POST['post-topics'];
	$publish = isset($_POST['publish']) ? 1 : 0;

	if (!empty($_FILES['post-image']['name'])) {
		$imgName = time() . "_" . $_FILES['post-image']['name'];
		$fileTmpName = $_FILES['post-image']['tmp_name'];
		$fileType = $_FILES['post-image']['type'];
		$destination = ROOT_PATH . "\assets\img\posts\\" . $imgName;

		if (strpos($fileType, 'image') === false) {
			array_push($errMsg, "Moжно загружать только изображения!");
		} else {
			$result = move_uploaded_file($fileTmpName, $destination);
			if ($result) {
				$img = $imgName;
			} else {
				array_push($errMsg, 'Ошибка загрузки изображения на сервер');
			}
		}
	} else {
		array_push($errMsg, 'Ошибка получения картинки');
	}

	if ($title === '' || $text === '' || $topic === '') {
		array_push($errMsg, 'Не все поля заполнены!');
	} elseif (mb_strlen($title, 'UTF8') < 7) {
		array_push($errMsg, 'Название статьи должно состоять как минимум из семи символов');
	} else {

		$post = [
			'id_user' => $_SESSION['id'],
			'title' => $title,
			'img' => $img,
			'content' => $text,
			'status' => $publish,
			'id_topic' => $topic
		];

		$id = $_POST['id'];
		update('posts', $id, $post);

		header("location: " . BASE_URL . "admin/posts/index.php");
	}
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
	$id = $_GET['delete_id'];
	delete('posts', $id);
	header("location: " . BASE_URL . "admin/posts/index.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])) {
	$id = $_GET['pub_id'];
	$publish = $_GET['publish'];
	update('posts', $id, ['status' => $publish]);
	header("location: " . BASE_URL . "admin/posts/index.php");
}