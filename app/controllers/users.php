<?php
include SITE__ROOT . '/app/database/db.php';

function setSession($params)
{
	$_SESSION['id'] = $params['id'];
	$_SESSION['login'] = $params['username'];
	$_SESSION['admin'] = $params['admin'];
	if ($_SESSION['admin']) {
		header("Location: " . BASE_URL . 'admin/posts/index.php');
	} else {
		header("Location: " . BASE_URL);
	}
}

$errMsg = [];
$regStatus = '';
$login = '';
$email = '';
$id = '';
$users = selectAll('users');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-reg'])) {
	$admin = 0;
	$login = trim($_POST['login']);
	$email = trim($_POST['email']);
	$passFirst = trim($_POST['password']);
	$passSecond = trim($_POST['password-repeat']);

	if ($login === '' || $email === '' || $passFirst === '' || $passSecond === '') {
		array_push($errMsg, 'Не все поля заполнены!');
	} elseif (mb_strlen($login, 'UTF8') < 3) {
		array_push($errMsg, 'Логин должен состоять более, чем из двух символов');
	} elseif ($passFirst !== $passSecond) {
		array_push($errMsg, 'Пароли не совпадают');
	} else {
		$existence = selectOne('users', ['email' => $email]);

		if ($existence && $existence['email'] === $email) {
			array_push($errMsg, 'Пользователь с таким email адресом уже существует');
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
			setSession($user);

		}

	}

} else {
	$login = '';
	$email = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-log'])) {
	$email = trim($_POST['email']);
	$pass = trim($_POST['password']);

	if ($email === '' || $pass === '') {
		array_push($errMsg, 'Не все поля заполнены!');
	} else {
		$existence = selectOne('users', ['email' => $email]);

		if ($existence && password_verify($pass, $existence['password'])) {
			setSession($existence);
		} else {
			array_push($errMsg, 'Неверный email или пароль');
		}
	}
} else {
	$email = '';
}


//Добавление пользователя в админке
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])) {

	$admin = 0;
	$login = trim($_POST['login']);
	$email = trim($_POST['email']);
	$passFirst = trim($_POST['password']);
	$passSecond = trim($_POST['password-repeat']);

	if ($login === '' || $email === '' || $passFirst === '' || $passSecond === '') {
		array_push($errMsg, 'Не все поля заполнены!');
	} elseif (mb_strlen($login, 'UTF8') < 3) {
		array_push($errMsg, 'Логин должен состоять более, чем из двух символов');
	} elseif ($passFirst !== $passSecond) {
		array_push($errMsg, 'Пароли не совпадают');
	} else {
		$existence = selectOne('users', ['email' => $email]);

		if ($existence && $existence['email'] === $email) {
			array_push($errMsg, 'Пользователь с таким email адресом уже существует');
		} else {
			$pass = password_hash($passFirst, PASSWORD_DEFAULT);
			if (isset($_POST['admin-role'])) {
				$admin = 1;
			}
			$user = [
				'admin' => $admin,
				'username' => $login,
				'email' => $email,
				'password' => $pass,
			];

			$id = insert('users', $user);
			$user = selectOne('users', ['id' => $id]);
			setSession($user);

		}
	}
} else {
	$login = '';
	$email = '';
}

//Удаление пользователя
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
	$id = $_GET['delete_id'];
	delete('users', $id);
	header("location: " . BASE_URL . "admin/users/index.php");
}

//Редактирование пользователя
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])) {
	$user = selectOne('users', ['id' => $_GET['edit_id']]);

	$id = $user['id'];
	$login = $user['username'];
	$admin = $user['admin'];
	$email = $user['email'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-user'])) {
	$id = $_POST['id'];
	$login = trim($_POST['login']);
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	$passwordRepeat = trim($_POST['password-repeat']);
	$admin = isset($_POST['admin-role']) ? 1 : 0;

	if ($login === '') {
		array_push($errMsg, 'Не все поля заполнены!');
	} elseif (mb_strlen($login, 'UTF8') < 2) {
		array_push($errMsg, 'Логин должен состоять как минимум из двух символов');
	} elseif ($password !== $passwordRepeat) {
		array_push($errMsg, 'Пароли не совпадают');
	} else {
		$pass = password_hash($password, PASSWORD_DEFAULT);
		$user = [
			'admin' => $admin,
			'username' => $login,
			'password' => $pass,
		];

		update('users', $id, $user);
		header("location: " . BASE_URL . "admin/users/index.php");
	}
}