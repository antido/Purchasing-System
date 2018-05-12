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
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/datatables.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<script src="../assets/js/jquery-3.3.1.js"></script>
	<script src="../assets/js/datatables.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
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
						<a class="nav-link active" href="stock_main_admin.php">Stock Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../admin/main.php">Admin</a>
					</li>
				</ul>
			</div>
			<span class="text-primary">Welcome Admin: <br><center><?php echo $_SESSION['user']; ?></center></span>
		</nav>
	</header>

	<main>
		<div class="container-fluid mt-5">
			<?php
				$sql = "SELECT * FROM stocks st INNER JOIN supplier su ON st.supplier_id = su.supplier_id";
				$result = mysqli_query($conn, $sql);

				if($result->num_rows > 0){
				}
			?>
			<a class="btn btn-success mb-2" href="add_stock_admin.php"><i class="fas fa-plus"></i></a>
			<table class="table table-striped table-bordered" id="stockAdminTable">
				<thead class="thead-dark">
					<tr>
						<th>Stock ID</th>
						<th>Stock Name</th>
						<th>Stock Quantity</th>
						<th>Stock Price</th>
						<th>Supplier</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php while($row = $result->fetch_assoc()) { ?>
					<tr>
						<td><?php echo $row['stock_id']; ?></td>
						<td><?php echo $row['stock_name']; ?></td>
						<td><?php echo $row['stock_quantity']; ?></td>
						<td>₱ <?php echo $row['stock_price']; ?></td>
						<td><?php echo $row['supplier_name']; ?></td>
						<td>
							<a class="btn btn-secondary" data-toggle="modal" href="#viewStockModal" data-id="<?php echo $row['stock_id']; ?>"><i class="fas fa-eye"></i></a>
							<a class="btn btn-primary" href="update_stock_admin.php?stockId=<?php echo $row['stock_id']; ?>"><i class="fas fa-pencil-alt"></i></a>
							<a class="btn btn-danger" onclick="return confirm('Are you sure ?');" href="model/delete_stock.php?stockId=<?php echo $row['stock_id']; ?>"><i class="fas fa-trash-alt"></i></a>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</main>

	<div class="modal fade" id="viewStockModal" tabindex="-1" role="dialog" aria-labelledby="viewStockModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="viewStockModalLabel">View Stock Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<!-- Fetched Data to be displayed -->
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<footer class="container-fluid mt-5">
		<?php include '../includes/footer.php'; ?>
	</footer>

	
	<script>
		$(document).ready(function(){
			$('#viewStockModal').on('show.bs.modal', function (e){
				var stockId = $(e.relatedTarget).data('id');
				$.ajax({
					type: 'POST',
					url: 'model/view_stock_modal.php',
					data: 'stockId=' + stockId,
					success: function(data){
						$('.modal-body').html(data);
					}
				});
			});
			
			$('#stockAdminTable').DataTable();
		});
	</script>
</body>
</html>