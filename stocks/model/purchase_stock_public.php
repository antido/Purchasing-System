<?php
	include '../../db_connection/config.php';
	session_start();

	if(isset($_POST['stockId'])){
		$id = $_POST['stockId'];

		$sql = "SELECT * FROM stocks WHERE stock_id = '$id'";
		$result = mysqli_query($conn, $sql);

		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo 
				"
				<form action='model/purchase_stock.php' method='POST'>
					<div class='form-group'>
						<input type='hidden' class='form-control' name='stockId' value='$row[stock_id]'>
					</div>
					<div class='form-group'>
						<input type='hidden' class='form-control' name='supplierId' value='$row[supplier_id]'>
					</div>
					<div class='form-group'>
						<label>Stock Name:</label>
						<input type='text' class='form-control' name='stockName' value='$row[stock_name]' disabled>
						<input type='hidden' class='form-control' name='stockName' value='$row[stock_name]'>
					</div>
					<div class='form-group'>
						<label>Stock Description:</label>
						<input type='text' class='form-control' name='stockDesc' value='$row[stock_description]' disabled>
						<input type='hidden' class='form-control' name='stockDesc' value='$row[stock_description]'>
					</div>
					<div class='form-group'>
						<label>Stock Price:</label>
						<input type='text' class='form-control' name='stockPrice' value='₱ $row[stock_price]' disabled>
						<input type='hidden' class='form-control' name='stockPrice' value='$row[stock_price]'>
					</div>
					<div class='form-group'>
						<input type='hidden' class='form-control' name='stockAvailableQty' value='$row[stock_quantity]'>
					</div>
					<div class='form-group'>
						<input type='hidden' class='form-control' name='createdDate' value='$row[createdDate]'>
					<div>
					<div class='form-group'>
						<label>Stock Quantity:</label>
						<input type='number' class='form-control' name='stockQty'>
					</div>
					<div class='form-group'>
						<input type='submit' class='form-control btn-success' name='purchaseStock' value='Purchase'>
					</div>
				</form>
				";
			}
		}
	}
?>