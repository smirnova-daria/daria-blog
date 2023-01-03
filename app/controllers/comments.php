<?php
include '../../path.php';

$commentsForAdm = selectAll('comments');
$id = '';

$page = isset($_GET['post']) ? $_GET['post'] : '';
$email = '';
$commentText = '';
$errMsg = [];
$status = 0;
$comments = selectAll('comments', ['page' => $page, 'status' => 1]);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send-comment'])) {
	$email = trim($_POST['email']);
	$commentText = trim($_POST['comment']);

	if ($email === '' || $commentText === '') {
		array_push($errMsg, "He все поля заполнены!");
	} elseif (mb_strlen($commentText) < 10) {
		array_push($errMsg, "Длина комментария должна быть не менее 10 символов");
	} else {
		$user = selectOne('users', ['email' => $email]);

		if (isset($user['email'])) {
			$status = 1;
		}

		$comment = [
			'status' => $status,
			'page' => $page,
			'email' => $email,
			'comment' => $commentText
		];

		insert('comments', $comment);
		$comments = selectAll('comments', ['page' => $page, 'status' => 1]);
		$email = '';
		$commentText = '';
	}

} else {
	$email = '';
	$commentText = '';
	$comments = selectAll('comments', ['page' => $page, 'status' => 1]);
}


if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
	$id = $_GET['delete_id'];
	delete('comments', $id);
	header("location: " . BASE_URL . "admin/comments/index.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])) {
	$id = $_GET['pub_id'];
	$publish = $_GET['publish'];
	update('comments', $id, ['status' => $publish]);
	header("location: " . BASE_URL . "admin/comments/index.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
	$comment = selectOne('comments', ['id' => $_GET['id']]);

	$id = $comment['id'];
	$text = $comment['comment'];
	$email = $comment['email'];
	$publish = $comment['status'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-comment'])) {
	$text = trim($_POST['comment-text']);
	$publish = isset($_POST['publish']) ? 1 : 0;

	if ($text === '') {
		array_push($errMsg, 'Не все поля заполнены!');
	} elseif (mb_strlen($text, 'UTF8') < 10) {
		array_push($errMsg, 'Комментарий должен состоять минимум из 10 символов');
	} else {

		$comment = [
			'comment' => $text,
			'status' => $publish
		];

		$id = $_POST['id'];
		update('comments', $id, $comment);

		header("location: " . BASE_URL . "admin/comments/index.php");
	}
}