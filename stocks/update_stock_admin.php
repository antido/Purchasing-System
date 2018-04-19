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
	<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
	<title>Purchasing System</title>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="update_stock_admin.php">Stock</a>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="add_stock_admin.php">Add Stock</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="update_stock_admin.php">Update Stock</a>
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
					<form action="model/update_stock.php" method="POST">
						<h2 class="text-center">Update Stock</h2>
						<div class="form-group">
						
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