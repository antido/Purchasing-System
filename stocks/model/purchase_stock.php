<?php
	include '../../db_connection/config.php';
	session_start();

	if(isset($_POST['purchaseStock'])){
		$stockId = $_POST['stockId'];
		$stockQty = mysqli_real_escape_string($conn, $_POST['stockQty']);
		$userId = $_SESSION['userId'];

		$sql = "INSERT INTO user_purchase(user_id, stock_id, purchase_quantity, purchase_createdDate, purchase_updatedDate) VALUES ('$userId', '$stockId', '$stockQty', now(), now())";
		$result = mysqli_query($conn, $sql);

		header('Location: ../stock_main.php?purchase_stock=success');
		exit();
	}else{
		header('Location: ../stock_main.php?purchase_stock=failed');
		exit();
	}
?>