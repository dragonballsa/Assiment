<?php
require_once('database.php');
$_contact= $_nameproduct = '';
if (isset($_POST['contact'])) {
		$_contact = $_POST['contact'];
	}
if (isset($_POST['nameproduct'])) {
		$_nameproduct = $_POST['nameproduct'];
	}
$_contact = str_replace('\'', '\\\'', $_contact);
if ($_contact != '' && $_nameproduct != '') {
	$sql = "insert into contact(nameproduct, contact) values ('$_nameproduct
		', '$_contact')";
		execute($sql);
		header('Location:notification.php');
die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact Product</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		body{
			margin-top: 100px;
		}
		footer.py-5.bg-dark {
			margin-top: 250px;
		}
	</style>
</head>
<body>
	<<nav class="navbar navbar-expand-lg navbar-white bg-red fixed-top" style="background-color: #e3f2fd;">
		<div class="container">
			<a class="navbar-brand" href="index.php">TNH-Shop</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item ">
						<a class="nav-link" href="index.php">Home
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="login.php">Login</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="contact.php">Contact</a>
						<span class="sr-only">(current)</span>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Đánh Giá</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
						<label for="nameproduct"> Tên sản phẩm:</label>
						<input type="text" class="form-control" id="nameproduct" name="nameproduct">
					</div>
					<div class="form-group">
						<label for="contact">Đánh giá:</label>
						<input type="text" class="form-control" id="contact" name="contact">
					</div>
					<button class="btn btn-success">Gửi</button>
				</form>
			</div>
		</div>
	</div>
	<footer class=" bg-light fixed-bottom">
		<div class="container">
			<p class="m-0 text-center text-black">Copyright by &copy; TNH 2001</p>
		</div>
	</footer>
</body>
</html>
