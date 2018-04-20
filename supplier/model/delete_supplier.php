<?php
	include '../../db_connection/config.php';
	session_start();

	if(isset($_GET['delete'])){
		$id = $_GET['delete'];

		$sql = "DELETE FROM supplier WHERE supplier_id = '$id'";
		$result = mysqli_query($conn, $sql);

		header('Location: ../supplier_main_admin.php?delete_supplier=success');
		exit();
	}else{
		header('Location: ../supplier_main_admin.php?delete_supplier=failed');
		exit();
	}
?>