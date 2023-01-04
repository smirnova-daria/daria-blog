<?php
include 'app/database/db.php';

$posts = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-term'])) {
	$posts = searchInTitleAndContent($_POST['search-term'], 'posts', 'users');
}