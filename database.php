<?php
require_once ('cofig.php');

function execute($sql) {

	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_query($conn, $sql);	
	mysqli_close($conn);
}

function executeResult($sql) {
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);


	$resultset = mysqli_query($conn, $sql);
	$list      = [];
	while ($row = mysqli_fetch_array($resultset, 1)) {
		$list[] = $row;
	}

	mysqli_close($conn);
	return $list;
}
function getOneProduct($id) {
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	$sql_select_one = "SELECT * FROM product WHERE id = $id LIMIT 1";
	$result_one = mysqli_query($conn, $sql_select_one);
	$product = mysqli_fetch_assoc($result_one);
	return $product;
}
function checkUserLogin($username, $password) {
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	$sql_select_one = "SELECT * FROM users WHERE `username` = '$username' AND `password` = '$password' LIMIT 1";
	$result_one = mysqli_query($conn, $sql_select_one);
	$user = mysqli_fetch_assoc($result_one);
	return $user;
}
