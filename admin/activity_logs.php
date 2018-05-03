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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/datatables.css">
	<script src="../assets/js/jquery-3.3.1.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
	<script src="../assets/js/datatables.js"></script>
	<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
	<title>Purchasing System - Admin</title>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="main.php">Admin</a>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="main.php">Main</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle active" href="#" id="activitiesDropdownMenu" data-toggle="dropdown">Inventory</a>
						<div class="dropdown-menu" aria-labelledby="activitiesDropdownMenu">
							<a class="dropdown-item" href="../stocks/stock_main_admin.php">Stocks</a>
							<a class="dropdown-item" href="../supplier/supplier_main_admin.php">Supplier</a>
							<a class="dropdown-item" href="public_purchase_logs.php">Purchases Logs</a>
							<a class="dropdown-item active" href="activity_logs.php">Activity Logs</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../model/logout.php">Logout</a>
					</li>
				</ul>
			</div>
			<span class="text-primary">Welcome Admin: <center><?php echo $_SESSION['user']; ?></center></span>
		</nav>
	</header>

	<main> 
		<div class="container-fluid mt-5">
			<?php
				$sql = "SELECT * FROM activity a INNER JOIN users u ON a.user_id = u.user_id";
				$result = mysqli_query($conn, $sql);

				if($result->num_rows > 0){
				}
			?>
			<table class="table table-striped table-bordered" id="activityLogsTable">
				<thead class="thead-dark">
					<tr>
						<th>Activity ID</th>
						<th>User Name</th>
						<th>Activity Description</th>
						<th>Activity Date</th>
					</tr>
				</thead>
				<tbody>
				<?php while($row = $result->fetch_assoc()) { ?>
					<tr>
						<td><?php echo $row['activity_id']; ?></td>
						<td><?php echo $row['first_name'].' '.$row['middle_name'].' '.$row['last_name']; ?></td>
						<td><?php echo $row['activity_description']; ?></td>
						<td><?php echo $row['activity_createdDate']; ?></td>
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
		$(document).ready(function(){
			$('#activityLogsTable').DataTable();
		});
	</script>
</body>
</html>