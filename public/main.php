<?php 
	include '../db_connection/config.php';
	session_start();

	if(!isset($_SESSION['user']) && $_SESSION['logged_in'] == false){
		session_unset();
		session_destroy();

		header('Location: ../index.php?login=error');
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
	<link rel="stylesheet" type="text/css" href="../assets/css/datatables.css">
	<script src="../assets/js/jquery-3.3.1.js"></script>
	<script src="../assets/js/datatables.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
	<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
	<title>Purchasing System - Public</title>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="main.php">System</a>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" href="main.php">Home</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="publicActionsDropdownMenu" data-toggle="dropdown">Actions</a>
						<div class="dropdown-menu" aria-labelledby="publicActionsDropdownMenu">
							<a class="dropdown-item" href="../stocks/stock_main.php">Purchase Stocks</a>
							<a class="dropdown-item" href="change_account.php">Update Account</a>
							<a class="dropdown-item" href="model/logout.php">Logout</a>
						</div>
					</li>
				</ul>
			</div>
			<span class="text-success">Welcome User: <br/><center><?php echo $_SESSION['user']; ?></center></span>
		</nav>
	</header>

	<main>
		<div class="container-fluid mt-5">
			<h3 class="text-center">Purchase Logs</h3>
			<?php
				$sql = "SELECT * FROM user_purchase up INNER JOIN stocks s ON up.stock_id = s.stock_id WHERE user_id = '".$_SESSION['userId']."'";
				$result = mysqli_query($conn, $sql);

				if($result->num_rows > 0){
				}
			?>
			<table class="table table-striped table-bordered mt-4" id="publicDashboardTable">
				<thead class="thead-dark">
					<tr>
						<th>Purchase ID</th>
						<th>Purchase Date</th>
						<th>Purchase Name</th>
						<th>Purchase Quantity</th>
						<th>Purchase Total Price</th>
					</tr>
				</thead>
				<tbody>
				<?php while($row = $result->fetch_assoc()){ ?>
					<tr>
						<td><?php echo $row['user_purchase_id']; ?></td>
						<td><?php echo $row['purchase_createdDate']; ?></td>
						<td><?php echo $row['stock_name']; ?></td>
						<td><?php echo $row['purchase_quantity']; ?></td>
						<td>₱ <?php echo $row['purchase_quantity'] * $row['stock_price']; ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</main>

	<footer class="footer mt-5">
		<?php include '../includes/footer.php'; ?>
	</footer>

	<script type="text/javascript">
		$(document).ready(function (){
			$('#publicDashboardTable').DataTable();
		});
	</script>
</body>
</html>