<?php
	include '../../db_connection/config.php';
	session_start();

	if(isset($_POST['editSupplier'])){
		$id = $_POST['id'];
		$supplierName = mysqli_real_escape_string($conn, $_POST['supplierName']);
		$supplierAddr = mysqli_real_escape_string($conn, $_POST['supplierAddr']);
		$supplierNumber = mysqli_real_escape_string($conn, $_POST['supplierNumber']);
		$createdDate = $_POST['createdDate'];

		$sql = "UPDATE supplier SET supplier_name = '$supplierName', supplier_address = '$supplierAddr', supplier_number = '$supplierNumber', createdDate = '$createdDate', updatedDate = now() WHERE supplier_id = '$id'";
		$result = mysqli_query($conn, $sql);

		header('Location: ../supplier_main_admin.php?update_supplier=success');
		exit();
	}else{
		header('Location: ../supplier_main_admin.php?update_supplier=error');
		exit();
	}
?>