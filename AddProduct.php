<?php
require_once ('database.php');

$_nameproduct = $_link = $_price = $_installment = $_title ='';

if (!empty($_POST)) {
	$_id = '';

	if (isset($_POST['nameproduct'])) {
		$_nameproduct = $_POST['nameproduct'];
	}
	if (isset($_POST['link'])) {
		$_link = $_POST['link'];
	}
	if (isset($_POST['price'])) {
		$_price	 = $_POST['price'];
	}
	if (isset($_POST['title'])) {
		$_title = $_POST['title'];
	}
	if (isset($_POST['id'])) {
		$_id = $_POST['id'];
	}
	$_nameproduct = str_replace('\'', '\\\'', $_nameproduct);
	$_price      = str_replace('\'', '\\\'', $_price);
	$_link  = str_replace('\'', '\\\'', $_link);
	$_title       = str_replace('\'', '\\\'', $_title);

	if ($_id != '') {
		$sql = "update product set nameproduct = '$_nameproduct', link = '$_link', price = '$_price' , title = '$_title' where id = " .$_id;
	} else {
		$sql = "insert into product(nameproduct, link, price,title) value ('$_nameproduct
		', '$_link', '$_price','$_title')";
	}
	execute($sql);

	header('Location: admin.php');
	die();
}
$id = '';
if (isset($_GET['id'])) {
	$id          = $_GET['id'];
	$sql         = 'select * from product where id = '.$id;
	$productList = executeResult($sql);
	if ($productList != null && count($productList) > 0) {
		$prd        = $productList[0];
		$_nameproduct = $prd['nameproduct'];
		$_link      = $prd['link'];
		$_price  = $prd['price'];
		$_title  = $prd['title'];
	} else {
		$id = '';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registation Form * Form Tutorial</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm Sản Phẩm</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="usr">Tên Sản Phẩm:</label>
					  <input type="number" name="id" value="<?=$id?>" style="display: none;">
					  <input required="true" type="text" class="form-control" id="usr" name="nameproduct" value="<?=$_nameproduct?>">
					</div>
					<div class="form-group">
					  <label for="birthday">Link Sản Phẩm:</label>
					  <input type="text" class="form-control" id="link" name="link" value="<?=$_link?>">
					</div>
					<div class="form-group">
					  <label for="address">Giá Sản Phẩm:</label>
					  <input type="text" class="form-control" id="price" name="price" value="<?=$_price?>">
					</div>
					<div class="form-group">
					  <label for="address">Tiêu đề:</label>
					  <input type="text" class="form-control" id="title" name="title" value="<?=$_title?>">
					</div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
