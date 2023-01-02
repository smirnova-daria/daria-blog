<?php
session_start();
require('connect.php');

function prePrint($value)
{
	echo '<pre>';
	print_r($value);
	echo '</pre>';
}

function dbCheckError($query)
{
	$errInfo = $query->errorInfo();

	if ($errInfo[0] !== PDO::ERR_NONE) {
		echo $errInfo[2];
		exit();
	}
	return true;
}

function selectAll($table, $params = [])
{
	global $pdo;
	$sql = "SELECT * FROM $table";

	if (!empty($params)) {
		$i = 0;
		foreach ($params as $key => $value) {
			if (!is_numeric($value)) {
				$value = "'" . $value . "'";
			}
			if ($i === 0) {
				$sql .= " WHERE $key=$value";
			} else {
				$sql .= " AND $key=$value";
			}

			$i++;
		}
	}
	$query = $pdo->prepare($sql);
	$query->execute();

	dbCheckError($query);
	return $query->fetchAll();
}
function selectOne($table, $params = [])
{
	global $pdo;
	$sql = "SELECT * FROM $table";

	if (!empty($params)) {
		$i = 0;
		foreach ($params as $key => $value) {
			if (!is_numeric($value)) {
				$value = "'" . $value . "'";
			}
			if ($i === 0) {
				$sql .= " WHERE $key=$value";
			} else {
				$sql .= " AND $key=$value";
			}

			$i++;
		}
	}

	// $sql .= " LIMIT 1";
	$query = $pdo->prepare($sql);
	$query->execute();

	dbCheckError($query);
	return $query->fetch();
}

function insert($table, $params)
{
	global $pdo;

	$i = 0;
	$col = '';
	$mask = '';
	foreach ($params as $key => $value) {
		if ($i === 0) {
			$col .= "$key";
			$mask .= "'" . "$value" . "'";
		} else {
			$col .= ", $key";
			$mask .= ", '" . "$value" . "'";
		}
		$i++;
	}

	$sql = "INSERT INTO $table ($col) VALUES ($mask)";

	$query = $pdo->prepare($sql);
	$query->execute();

	dbCheckError($query);

	return $pdo->lastInsertId();
}

function update($table, $id, $params)
{
	global $pdo;

	$i = 0;
	$str = '';
	foreach ($params as $key => $value) {
		if ($i === 0) {
			$str .= $key . " = '$value'";
		} else {
			$str .= ", " . $key . " = '$value'";
		}
		$i++;
	}

	$sql = "UPDATE $table SET $str WHERE id = $id";

	$query = $pdo->prepare($sql);
	$query->execute();

	dbCheckError($query);
}

function delete($table, $id)
{
	global $pdo;

	$sql = "DELETE FROM $table WHERE id = $id";

	$query = $pdo->prepare($sql);
	$query->execute();

	dbCheckError($query);
}

function selectAllFromPostsWithUsers($table1, $table2)
{
	global $pdo;

	$sql = "SELECT t1.id, t1.title, t1.img, t1.content, t1.status, t1.id_topic, t1.created_date, t2.username FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user=t2.id";

	$query = $pdo->prepare($sql);
	$query->execute();
	dbCheckError($query);
	return $query->fetchAll();
}
function selectTopTopics($table)
{
	global $pdo;

	$sql = "SELECT * FROM $table WHERE id_topic=7";

	$query = $pdo->prepare($sql);
	$query->execute();
	dbCheckError($query);
	return $query->fetchAll();
}


function searchInTitleAndContent($term, $table1, $table2)
{
	global $pdo;

	$term = trim(strip_tags(stripcslashes(htmlspecialchars($term))));

	$sql = "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user=u.id WHERE p.status=1 AND p.title LIKE '%$term%' OR p.content LIKE '%$term%'";

	$query = $pdo->prepare($sql);
	$query->execute();
	dbCheckError($query);
	return $query->fetchAll();
}

function countRow($table)
{
	global $pdo;

	$sql = "SELECT COUNT(*) FROM $table WHERE status=1";
	$query = $pdo->prepare($sql);
	$query->execute();
	dbCheckError($query);
	return $query->fetchColumn();
}


function selectAllWithLimit($table, $limit, $offset, $params = [])
{
	global $pdo;
	$sql = "SELECT * FROM $table";

	if (!empty($params)) {
		$i = 0;
		foreach ($params as $key => $value) {
			if (!is_numeric($value)) {
				$value = "'" . $value . "'";
			}
			if ($i === 0) {
				$sql .= " WHERE $key=$value";
			} else {
				$sql .= " AND $key=$value";
			}

			$i++;
		}
	}
	$sql .= " LIMIT $limit OFFSET $offset";

	$query = $pdo->prepare($sql);
	$query->execute();

	dbCheckError($query);
	return $query->fetchAll();
}