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
	<meta name="viewport" content="width=device-width, initial-cale=1.0">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
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
						<a class="nav-link active" href="supplier_main_admin.php">Supplier Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="add_supplier_admin.php">Add Supplier</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../admin/main.php">Admin</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>

	<main>
		<div class="container-fluid mt-5">
			<?php
				$sql = "SELECT * FROM supplier";
				$result = mysqli_query($conn, $sql);

				if($result->num_rows > 0){
				}
			?>
			<table class="table table-striped table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>Supplier ID</th>
						<th>Supplier Name</th>
						<th>Supplier Address</th>
						<th>Supplier Number</th>
						<th>Action</th>
					</tr>
				</thead>
				<?php while($row = $result->fetch_assoc()) { ?>
				<tbody>
					<tr>
						<td><?php echo $row['supplier_id']; ?></td>
						<td><?php echo $row['supplier_name']; ?></td>
						<td><?php echo $row['supplier_address']; ?></td>
						<td><?php echo $row['supplier_number']; ?></td>
						<td>
							<a class="btn btn-primary" href="update_supplier_admin.php?edit=<?php echo $row['supplier_id']; ?>">Edit</a>
							<a class="btn btn-danger" onclick="return confirm('Are you sure ?');" href="model/delete_supplier.php?delete=<?php echo $row['supplier_id']; ?>">Delete</a>
						</td>
					</tr>
				</tbody>
				<?php } ?>
			</table>
		</div>
	</main>

	<footer class="footer mt-5">
		<?php include '../includes/footer.php'; ?>
	</footer>

	<script src="../assets/js/jquery-3.3.1.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
</body>
</html>