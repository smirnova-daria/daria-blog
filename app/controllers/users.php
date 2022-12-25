<?php
include('app/database/db.php');

$errMsg = '';
$regStatus = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$admin = 0;
	$login = trim($_POST['login']);
	$email = trim($_POST['email']);
	$passFirst = trim($_POST['password']);
	$passSecond = trim($_POST['password-repeat']);

	if ($login === '' || $email === '' || $passFirst === '' || $passSecond === '') {
		$errMsg = 'Не все поля заполнены!';
	} elseif (mb_strlen($login, 'UTF8') < 3) {
		$errMsg = 'Логин должен состоять более, чем из двух символов';
	} elseif ($passFirst !== $passSecond) {
		$errMsg = 'Пароли не совпадают';
	} else {
		$existence = selectOne('users', ['email' => $email]);

		if ($existence && $existence['email'] === $email) {
			$errMsg = 'Пользователь с таким email адресом уже существует';
		} else {
			$pass = password_hash($passFirst, PASSWORD_DEFAULT);
			$post = [
				'admin' => $admin,
				'username' => $login,
				'email' => $email,
				'password' => $pass,
			];

			$id = insert('users', $post);
			$user = selectOne('users', ['id' => $id]);
			$_SESSION['id'] = $user['id'];
			$_SESSION['login'] = $user['username'];
			$_SESSION['admin'] = $user['admin'];
			if ($_SESSION['admin']) {
				header("Location: " . BASE_URL . 'admin/admin.php');
			} else {
				header("Location: " . BASE_URL);
			}

		}

	}

} else {
	$login = '';
	$email = '';
}