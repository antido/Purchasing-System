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
					<table>
						<tr>
							<td>Stock Name:</td>
							<td>$row[stock_name]</td>
						</tr>
						<tr>
							<td>Stock Description:</td>
							<td>$row[stock_description]</td>
						</tr>
						<tr>
							<td>Stock Quantity:</td>
							<td>$row[stock_quantity]</td>
						</tr>
						<tr>
							<td>Stock Price:</td>
							<td>$row[stock_price]</td>
						</tr>
					</table>
				";
			}
		}
	}
?>