<?php
	include '../../db_connection/config.php';
	session_start();

	if(isset($_GET['stockId'])){
		$id = $_GET['stockId'];

		$sql = "DELETE FROM stocks WHERE stock_id = '$id'";
		$result = mysqli_query($conn, $sql);

		header('Location: ../stock_main_admin.php?delete_stock=success');
		exit();
	}else{
		header('Location: ../stock_main_admin.php?delete_stock=failed');
		exit();
	}
?>