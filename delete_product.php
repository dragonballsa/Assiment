<?php
if (isset($_POST['id'])) {
	$id = $_POST['id'];

	require_once ('database.php');
	$sql = 'delete from product where id = '.$id;
	execute($sql);

	echo 'Xoá sản phẩm thành công';
}