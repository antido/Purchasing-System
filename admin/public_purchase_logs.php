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
	<meta charset="utf-8">
	<meta name="vieport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/datatables.css">
	<script src="../assets/js/jquery-3.3.1.js"></script>
	<script src="../assets/js/datatables.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
	<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
	<title>Purchasing System - Admin</title>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="main.php">Admin</a>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav">
					<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="main.php">Main</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle active" href="#" id="inventoryDropdownMenuLink" data-toggle="dropdown">Inventory</a>
						<div class="dropdown-menu" aria-labelledby="inventoryDropdownMenuLink">
							<a class="dropdown-item" href="../stocks/stock_main_admin.php">Stocks</a>	
							<a class="dropdown-item" href="../supplier/supplier_main_admin.php">Supplier</a>
							<a class="dropdown-item active" href="public_purchase_logs.php">Purchases Logs</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="model/logout.php">Logout</a>
					</li>
				</ul>
			</div>
			<span class="text-primary">Welcome Admin: <br/><center><?php echo $_SESSION['user']; ?></center></span>
		</nav>
	</header>

	<main>
		<div class="container-fluid mt-5">
			<?php
				$sql = "SELECT * FROM user_purchase up INNER JOIN stocks s ON up.stock_id = s.stock_id INNER JOIN users u ON up.user_id = u.user_id";
				$result = mysqli_query($conn, $sql);

				if($result->num_rows > 0){
				}
			?>
			<table class="table table-striped table-bordered" id="publicPurchaseLogsTable">
				<thead class="thead-dark">
					<tr>
						<th>Purchase ID</th>
						<th>Buyer Name</th>
						<th>Purchase Date</th>
						<th>Purchase Name</th>
						<th>Purchase Quantity</th>
						<th>Purchase Total Price</th>
					</tr>
				</thead>
				<?php while($row = $result->fetch_assoc()) { ?>
				<tbody>
					<tr>
						<td><?php echo $row['user_purchase_id']; ?></td>
						<td><?php echo $row['first_name'] .' '. $row['middle_name'] .' '.$row['last_name']; ?></td>
						<td><?php echo $row['purchase_createdDate']; ?></td>
						<td><?php echo $row['stock_name']; ?></td>
						<td><?php echo $row['purchase_quantity']; ?></td>
						<td>₱ <?php echo $row['purchase_quantity'] * $row['stock_price']; ?> </td>
					</tr>
				</tbody>
				<?php } ?>
			</table>
		</div>
	</main>

	<footer class="footer mt-5">
		<?php include '../includes/footer.php'; ?>
	</footer>

	<script >
		$(document).ready(function(){
			$('#publicPurchaseLogsTable').DataTable();
		});
	</script>	
</body>
</html>

















