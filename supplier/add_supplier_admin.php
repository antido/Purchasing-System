<?php 
	include '../db_connection/config.php';
	session_start();

	if(!isset($_SESSION['user']) && $_SESSION['logged_in'] == false){
		session_unset();
		session_destroy();

		header('Location: ../index.php?access=error');
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
	<script src="../assets/js/jquery-3.3.1.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
	<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
	<title>Purchasing System</title>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="supplier_main_admin.php">Supply</a>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="supplier_main_admin.php">Supplier Dashboard</a>
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
					<form action="model/add_supplier.php" method="POST">
						<h2 class="text-center">Add Supplier</h2>
						<div class="form-group">
							<label>Supplier Name:</label>
							<input type="text" class="form-control" name="supplierName" placeholder="Enter Supplier Name" required>
						</div>
						<div class="form-group">
							<label>Supplier Address:</label>
							<input type="text" class="form-control" name="supplierAddr" placeholder="Enter Supplier Address" required>
						</div>
						<div class="form-group">
							<label>Supplier Contact Number:</label>
							<input type="text" class="form-control" name="supplierNumber" placeholder="Enter Supplier Contact Number" required>
						</div>
						<div class="form-group">
							<input type="submit" class="form-control btn-success" name="addSupplier" value="Add Supplier">
						</div>
					</form>
				</div>
				<div class="col-md-3">
				</div>
			</div>
		</div>
	</main>

	<footer class="footer mt-5">
		<?php include '../includes/footer.php'; ?>
	</footer>

</body>
</html>