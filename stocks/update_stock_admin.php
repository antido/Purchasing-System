<?php 
	include '../db_connection/config.php';
	session_start();

	if(!isset($_SESSION['user']) && $_SESSION['logged_in'] == false){
		session_unset();
		session_destroy();

		header('Location: ../index.php?access=error');
		exit();
	}

	if(isset($_GET['stockId'])){
		$id = $_GET['stockId'];

		$sql = "SELECT * FROM stocks WHERE stock_id = '$id'";
		$result = mysqli_query($conn, $sql);

		if($result->num_rows > 0){
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
	<title>Purchasing System</title>
</head>
<body>
	<section>
		<a class="btn btn-secondary mt-2" href="stock_main_admin.php">BACK</a>
	</section>

	<main>
		<div class="container mt-5">
			<div class="row">
				<div class="col-md">
				</div>
				<div class="col-md">
					<form action="model/update_stock.php" method="POST">
						<h2 class="text-center">Update Stock Data</h2>
						<?php while($row = $result->fetch_assoc()) { ?>
							<div class="form-group">
								<input type="hidden" class="form-control" name="id" value="<?php echo $row['stock_id']; ?>">
							</div>
							<div class="form-group">
								<input type="hidden" class="form-control" name="supplierId" value="<?php echo $row['supplier_id']; ?>">
							</div>
							<div class="form-group">
								<label>Stock Name:</label>
								<input type="text" class="form-control" name="stockName" value="<?php echo $row['stock_name']; ?>">
							</div>
							<div class="form-group">
								<label>Stock Quantity:</label>
								<input type="number" class="form-control" name="stockQty" value="<?php echo $row['stock_quantity']; ?>">
							</div>
							<div class="form-group">
								<label>Stock Price:</label>
								<input type="text" class="form-control" name="stockPrice" value="<?php echo $row['stock_price']; ?>">
							</div>
							<div class="form-group">
								<label>Stock Description:</label>
								<input type="text" class="form-control" name="stockDesc" value="<?php echo $row['stock_description']; ?>">
							</div>
							<div class="form-group">
								<input type="hidden" class="form-control" name="createdDate" value="<?php echo $row['createdDate']; ?>">
							</div>
							<div class="form-group">
								<input type="submit" class="form-control btn-primary" name="updateStock" value="Update Stock">
							</div>
						<?php } ?>
					</form>
				</div>
				<div class="col-md">
				</div>
			</div>
		</div>
	</main>

	<footer class="footer mt-5">
		<?php include '../includes/footer.php'; ?>
	</footer>

	<script src="../assets/js/jquery-3.3.1.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
</body>
</html>