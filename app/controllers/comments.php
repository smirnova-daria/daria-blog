<?php

$page = $_GET['post'];

$email = '';
$commentText = '';
$errMsg = [];
$status = 0;
$comments = [];

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
	}

} else {
	$email = '';
	$commentText = '';
	$comments = selectAll('comments', ['page' => $page, 'status' => 1]);
}