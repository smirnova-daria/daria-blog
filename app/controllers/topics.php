<?php
include '../../path.php';
include '../../app/database/db.php';

$topics = selectAll('topics');

$id = '';
$name = '';
$description = '';
$errMsg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-create'])) {
	$name = $_POST['topic-name'];
	$description = $_POST['topic-description'];

	if ($name === '' || $description === '') {
		$errMsg = 'Не все поля заполнены!';
	} elseif (mb_strlen($name, 'UTF8') < 2) {
		$errMsg = 'Название категории должно состоять как минимум из двух символов';
	} else {
		$existence = selectOne('topics', ['name' => $name]);

		if ($existence && $existence['name'] === $name) {
			$errMsg = 'Такая категория уже есть в базе';
		} else {
			$topic = [
				'name' => $name,
				'description' => $description
			];

			$id = insert('topics', $topic);
			$topic = selectOne('topics', ['name' => $name]);

			header("location: " . BASE_URL . "admin/topics/index.php");
		}

	}
} else {
	$name = '';
	$description = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
	$id = $_GET['id'];
	$topic = selectOne('topics', ['id' => $id]);
	$id = $topic['id'];
	$name = $topic['name'];
	$description = $topic['description'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])) {
	$name = $_POST['topic-name'];
	$description = $_POST['topic-description'];

	if ($name === '' || $description === '') {
		$errMsg = 'Не все поля заполнены!';
	} elseif (mb_strlen($name, 'UTF8') < 2) {
		$errMsg = 'Название категории должно состоять как минимум из двух символов';
	} else {

		$topic = [
			'name' => $name,
			'description' => $description
		];

		$id = $_POST['id'];
		$topic_id = update('topics', $id, $topic);

		header("location: " . BASE_URL . "admin/topics/index.php");


	}
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])) {
	$id = $_GET['delete_id'];
	delete('topics', $id);
	header("location: " . BASE_URL . "admin/topics/index.php");
}