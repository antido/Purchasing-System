<?php
	include '../../db_connection/config.php';
	session_start();

	if(isset($_POST['updateStock'])){
		$id = $_POST['id'];
		$supplierId = $_POST['supplierId'];
		$stockName = mysqli_real_escape_string($conn, $_POST['stockName']);
		$stockQty = mysqli_real_escape_string($conn, $_POST['stockQty']);
		$stockPrice = mysqli_real_escape_string($conn, $_POST['stockPrice']);
		$stockDesc = mysqli_real_escape_string($conn, $_POST['stockDesc']);
		$createdDate = $_POST['createdDate'];

		$sql = "UPDATE stocks SET supplier_id = '$supplierId', stock_name = '$stockName', stock_quantity = '$stockQty', stock_price = '$stockPrice', stock_description = '$stockDesc', createdDate = '$createdDate', updatedDate = now() WHERE stock_id = '$id'";
		$result = mysqli_query($conn, $sql);

		header('Location: ../stock_main_admin.php?update_stock=success');
		exit();
	}else{
		header('Location: ../stock_main_admin.php?update_stock=failed');
		exit();
	}
?>