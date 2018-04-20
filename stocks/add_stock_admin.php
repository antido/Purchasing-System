<?php
	include '../db_connection/config.php';
	session_start();

	if(!isset($_SESSION['user']) && $_SESSION['logged_in'] == false){
		session_unset();
		session_destroy();

		header('Location: index.php?access=error');
		exit();
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
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="stock_main_admin.php">Stock</a>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="stock_main_admin.php">Stock Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="add_stock_admin.php">Add Stock</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Stock Logs</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../admin/main.php">Admin</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>

	<main>
		<div class="container mt-5">
			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-6">
					<?php
						$sql = "SELECT * FROM supplier";
						$result = mysqli_query($conn, $sql);

						if ($result->num_rows > 0){
						}
					?>
					<form action="model/add_stock.php" method="POST">
						<h2 class="text-center">Add Stocks</h2>
						<div class="form-group">
							<label>Supplier</label>
							<select class="form-control" name="stockSupplier" required>
								<?php while($row = $result->fetch_assoc()) { ?>
								<option value="<?php echo $row['supplier_id']; ?>"><?php echo $row['supplier_name']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Stock Name:</label>
							<input type="text" class="form-control" name="stockName" placeholder="Enter Stock Name" required>
						</div>
						<div class="form-group">
							<label>Stock Quantity:</label>
							<input type="number" class="form-control" name="stockQty" placeholder="Enter Stock Quantity" required>
						</div>
						<div class="form-group">
							<label>Stock Price:</label>
							<input type="text" class="form-control" name="stockPrice" placeholder="Enter Stock Price" required>
						</div>
						<div class="form-group">
							<label>Stock Description:</label>
							<input type="text" class="form-control" name="stockDesc" placeholder="Enter Stock Description" required>
						</div>
						<div>
							<input type="submit" class="form-control btn-success" name="addStock" value="Add Stock">
						</div>
					</form>
				</div>
				<div class="col-md-3">
				</div>
			</div>
		</div>
	</main>

	<footer class="container-fluid mt-5">
		<?php include '../includes/footer.php'; ?>
	</footer>

	<script src="../assets/js/jquery-3.3.1.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
</body>
</html>