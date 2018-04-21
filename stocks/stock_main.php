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
	<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
	<title>Purchasing System</title>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="">Stock</a>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" href="stock_main.php">Stocks</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../public/main.php">Your Account</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>

	<main>
		<div class="container-fluid mt-5">
			<?php
				$sql = "SELECT * FROM stocks";
				$result = mysqli_query($conn, $sql);

				if($result->num_rows > 0){
				}				
			?>
			<table class="table table-striped table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>Stock ID</th>
						<th>Stock Name</th>
						<th>Stock Description</th>
						<th>Stock Price</th>
						<th>Action</th>
					</tr>
				</thead>
				<?php while($row = $result->fetch_assoc()) { ?>
				<tbody>
					<tr>
						<td><?php echo $row['stock_id']; ?></td>
						<td><?php echo $row['stock_name']; ?></td>
						<td><?php echo $row['stock_description']; ?></td>
						<td>₱ <?php echo $row['stock_price']; ?></td>
						<td>
							<a class="btn btn-success" data-toggle="modal" href="#purchaseModal" data-id="<?php echo $row['stock_id']; ?>">Purchase</a>
						</td>
					</tr>
				</tbody>
				<?php } ?>
			</table>
		</div>
	</main>

	<!-- Purchase Stock Modal -->
	<div class="modal fade" id="purchaseModal" tabindex="-1" role="dialog" aria-labelledby="purchaseModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="purchaseModalLabel">Purchase Item</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>

	<footer class="footer mt-5">
		<?php include '../includes/footer.php'; ?>
	</footer>

	<script src="../assets/js/jquery-3.3.1.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
	<script>
		$(document).ready(function(){
			$('#purchaseModal').on('show.bs.modal', function (e){
				var stockId = $(e.relatedTarget).data('id');
				$.ajax({
					type: 'POST',
					url: 'model/purchase_stock_public.php',
					data: 'stockId=' + stockId,
					success: function(data){
						$('.modal-body').html(data);
					}
				});
			});
		});
	</script>
</body>
</html>