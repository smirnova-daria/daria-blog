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