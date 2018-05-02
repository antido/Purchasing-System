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
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
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
					<li class="nav-item">
						<a class="nav-link active" href="main.php">Main</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="inventoryDropdownMenuLink" data-toggle="dropdown">Inventory</a>
						<div class="dropdown-menu" aria-labelledby="inventoryDropdownMenuLink">
							<a class="dropdown-item" href="../stocks/stock_main_admin.php">Stocks</a>	
							<a class="dropdown-item" href="../supplier/supplier_main_admin.php">Supplier</a>
							<a class="dropdown-item" href="public_purchase_logs.php">Purchases Logs</a>
							<a class="dropdown-item" href="#">Activity Logs</a>
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
				$sql = "SELECT * FROM users";
				$result = mysqli_query($conn, $sql);

				if($result->num_rows > 0){
				}
			?>
			<a class="btn btn-success mb-2" data-toggle="modal" href="#addAccountModal">Add</a>
			<table class="table table-striped table-bordered" id="adminDashboardTable">
				<thead class="thead-dark">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Age</th>
						<th>Contact Number</th>
						<th>Profession</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php while($row = $result->fetch_assoc()){ ?>
					<tr>
						<td><?php echo $row['user_id']; ?></td>
						<td><?php echo $row['first_name'] .' '. $row['middle_name'] .' '. $row['last_name']; ?></td>
						<td><?php echo $row['age']; ?></td>
						<td><?php echo $row['contact_number']; ?></td>
						<td><?php echo $row['profession']; ?></td>
						<td>
							<a class="btn btn-secondary" data-toggle="modal" href="#viewModal" data-id="<?php echo $row['user_id']; ?>">View</a>
							<a class="btn btn-primary" href="edit_user.php?edit=<?php echo $row['user_id']; ?>">Edit</a>
							<a class="btn btn-danger" onclick="return confirm('Are you sure ?');" href="model/delete.php?delete=<?php echo $row['user_id']; ?>">Delete</a>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</main>

	<!-- View Data Modal -->
	<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="viewModalLabel">View Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<!-- Fetched Data to be displayed -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>		
	</div>

	<!-- Add Accounts Modal -->
	<div class="modal fade" id="addAccountModal" tabindex="-1" role="dialog" aria-labelledby="addAccountModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body modal-body-centered">
					<h5 class="text-center">Create Account For:</h5>
					<div class="row">
						<div class="col-md-3">
						</div>
						<div class="col-md-6">
							<a class="btn btn-success ml-4" href="add_account_user.php">Public</a>
							<a class="btn btn-primary" href="add_account_admin.php">Admin</a>
						</div>
						<div class="col-md-3">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>

	<footer class="footer mt-5"> 
		<?php include '../includes/footer.php'; ?>
	</footer>

	<script>
		$(document).ready(function(){
			$('#viewModal').on('show.bs.modal', function (e){
				var userId = $(e.relatedTarget).data('id');
				$.ajax({
					type: 'POST',
					url: 'model/view_modal.php',
					data: 'userId=' + userId, 
					success: function(data){
		           		$(".modal-body").html(data);
		        	}
		    	});
			});

			$('#adminDashboardTable').DataTable();
		});
	</script>
</body>
</html>