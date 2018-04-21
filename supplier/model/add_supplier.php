<?php
	include '../../db_connection/config.php';
	session_start();

	if(isset($_POST['addSupplier'])){
		$supplierName = mysqli_real_escape_string($conn, $_POST['supplierName']);
		$supplierAddr = mysqli_real_escape_string($conn, $_POST['supplierAddr']);
		$supplierNum = mysqli_real_escape_string($conn, $_POST['supplierNumber']);

		$sql = "INSERT INTO supplier (supplier_name, supplier_address, supplier_number, createdDate, updatedDate) VALUES ('$supplierName', '$supplierAddr', '$supplierNum', now(), now())";
		$result = mysqli_query($conn, $sql);

		header('Location: ../supplier_main_admin.php?add_supplier=success');
		exit();
	}else{
		header('Location: ../supplier_main_admin.php?add_supplier=failed');
		exit();
	}
?>