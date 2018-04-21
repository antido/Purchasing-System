<?php
	include '../../db_connection/config.php';
	session_start();

	if(isset($_POST['addStock'])){
		$supplier = $_POST['stockSupplier'];
		$stockName = mysqli_real_escape_string($conn, $_POST['stockName']);
		$stockQty = mysqli_real_escape_string($conn, $_POST['stockQty']);
		$stockPrice = mysqli_real_escape_string($conn, $_POST['stockPrice']);
		$stockDesc = mysqli_real_escape_string($conn, $_POST['stockDesc']);

		$sql = "INSERT INTO stocks (supplier_id, stock_name, stock_quantity, stock_price, stock_description, createdDate, updatedDate) VALUES ('$supplier', '$stockName', '$stockQty', '$stockPrice', '$stockDesc', now(), now())";
		$result = mysqli_query($conn, $sql);

		header('Location: ../stock_main_admin.php?adding_stock=success');
		exit();
	}else{
		header('Location: ../stock_main_admin.php?adding_stock=failed');
		exit();
	}
?>