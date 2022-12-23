<?php

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

$params = [
	'admin' => 0,
	'username' => 'user Ben'
];
// prePrint(selectAll('users', $params));
prePrint(selectOne('users'));