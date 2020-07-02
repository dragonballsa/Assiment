<?php
require_once ('database.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Product</title>
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
			<div class="panel-heading" style="color: red; text-align: center; font-size: 30px;">
				Quản lý thông tin sản phẩm
				<form method="get">
					<input type="text" name="search" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm theo tên sản phẩm">
				</form>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên sản phẩm</th>
							<th>Link sản phẩm</th>
							<th>Giá sản phẩm </th>
							<th>Tiêu đề</th>
							<th width="60px"></th>
							<th width="60px"></th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (isset($_GET['search']) && $_GET['search'] != '') {
							$sql = 'select * from product where nameproduct like "%'.$_GET['search'].'%"';
						} else {
							$sql = 'select * from product';
						}

						$productList = executeResult($sql);

						$index = 1;
						foreach ($productList as $pro) {
							echo '<tr>
							<td>'.($index++).'</td>

							<td>'.$pro['nameproduct'].'</td>
							<td><img style = "width:300px;height:300px;"   src ="'.$pro['link'].'"/></td>
							<td>'.$pro['price'].'</td>
							<td>'.$pro['title'].'</td>
							<td><button class="btn btn-warning" onclick=\'window.open("AddProduct.php?id='.$pro['id'].'","_self")\'>Edit</button></td>
							<td><button class="btn btn-danger" onclick="deleteProduct('.$pro['id'].')">Delete</button></td>
							</tr>';
						}
						?>
					</tbody>
				</table>
				<div class="panel panel-primary">
					<div class="panel-heading" style="color: pink; text-align: center; font-size: 30px;">
						Quản lý phản hồi người dùng
						<form method="get">
							<input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm theo tên sản phẩm">
						</form>
					</div>
					<div class="panel-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>STT</th>
									<th>Tên sản phẩm</th>
									<th>Phản hồi người dùng sản phẩm</th>
									<th width="60px"></th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (isset($_GET['s']) && $_GET['s'] != '') {
									$sql = 'select * from contact where nameproduct like "%'.$_GET['s'].'%"';
								} else {
									$sql = 'select * from contact';
								}
								$productList = executeResult($sql);
								$index = 1;
								foreach ($productList as $pro) {
									echo '<tr>
									<td>'.($index++).'</td>
									<td>'.$pro['nameproduct'].'</td>
									<td>'.$pro['contact'].'</td>
									<td><button class="btn btn-danger" onclick="deleteProduct('.$pro['id'].')">Delete</button></td>
									</tr>';
								}
								?>
							</tbody>
						</table>
						<button class="btn btn-success" onclick="window.open('AddProduct.php', '_self')">Add Product</button>
						<a class="btn btn-dark" href="index.php">Về trang Home</a>
						<a class="btn btn-warning" href="logout.php">Đăng xuất</a>
					</div>
				</div>
			</div>

			<script type="text/javascript">
				function deleteProduct(id) {
					option = confirm('Bạn có muốn xoá sản phẩm này không')
					if(!option) {
						return;
					}
					console.log(id)
					$.post('delete_product.php', {
						'id': id
					}, function(data) {
						alert(data)
						location.reload()
					})
				}
			</script>
		</body>
		</html>
