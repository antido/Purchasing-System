<?php
	include '../../db_connection/config.php';
	session_start();

	if(isset($_POST['purchaseStock'])){
		$stockQty = mysqli_real_escape_string($conn, $_POST['stockQty']);
		$stockAvailableQty = $_POST['stockAvailableQty'];
		$stockId = $_POST['stockId'];
		$supplierId = $_POST['supplierId'];
		$userId = $_SESSION['userId'];
		$stockName = $_POST['stockName'];
		$stockDesc = $_POST['stockDesc'];
		$stockPrice = $_POST['stockPrice'];
		$createdDate = $_POST['createdDate'];

		if($stockAvailableQty < $stockQty){
			echo ("<script language='javascript'>
					window.alert('Insufficient Stock Quantity');
					window.history.go(-1)
				 </script>");
		}else{
			$sql = "INSERT INTO user_purchase(user_id, stock_id, purchase_quantity, purchase_createdDate, purchase_updatedDate) VALUES ('$userId', '$stockId', '$stockQty', now(), now())";
			$result = mysqli_query($conn, $sql);

			if($result){
				$sql2 = "UPDATE stocks SET supplier_id = '$supplierId', stock_name = '$stockName', stock_quantity = '$stockAvailableQty' - '$stockQty', stock_price = '$stockPrice', stock_description = '$stockDesc', createdDate = '$createdDate', updatedDate = now() WHERE stock_id = '$stockId'";
				$result2 = mysqli_query($conn, $sql2);

				header('Location: ../stock_main.php?purchase_stock=success');
				exit();
			}
		}

	}else{
		header('Location: ../stock_main.php?purchase_stock=failed');
		exit();
	}
?>