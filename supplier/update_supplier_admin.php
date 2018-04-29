<?php
	include '../db_connection/config.php';
	session_start();

	if(!isset($_SESSION['user']) && $_SESSION['logged_in'] == false){
		session_unset();
		session_destroy();

		header('Location: ../index.php?access=error');
		exit();
	}

	if(isset($_GET['edit'])){
		$id = $_GET['edit'];

		$sql = "SELECT * FROM supplier WHERE supplier_id = '$id'";
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
	<script src="../assets/js/jquery-3.3.1.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
	<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
	<title>Purchasing System</title>
</head>
<body>
	<section>
		<a class="btn btn-secondary mt-2" href="supplier_main_admin.php">BACK</a>
	</section>

	<main>
		<div class="container mt-5">
			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-6">
					<?php while($row = $result->fetch_assoc()) { ?>
					<form action="model/update_supplier.php" method="POST">
						<h2 class="text-center">Update Supplier</h2>
						<div class="form-group">
							<input type="hidden" class="form-control" name="id" value="<?php echo $row['supplier_id']; ?>">
						</div>
						<div class="form-group">
							<label>Supplier Name:</label>
							<input type="text" class="form-control" name="supplierName" value="<?php echo $row['supplier_name']; ?>">
						</div>
						<div class="form-group">
							<label>Supplier Address:</label>
							<input type="text" class="form-control" name="supplierAddr" value="<?php echo $row['supplier_address']; ?>">
						</div>
						<div class="form-group">
							<label>Supplier Contact Number:</label>
							<input type="text" class="form-control" name="supplierNumber" value="<?php echo $row['supplier_number']; ?>">
						</div>
						<div class="form-group">
							<input type="hidden" class="form-control" name="createdDate" value="<?php echo $row['createdDate']; ?>">
						</div>
						<div class="form-group">
							<input type="submit" class="form-control btn-primary" name="editSupplier" value="Update Supplier">
						</div>
					</form>
					<?php } ?>
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