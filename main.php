<?php
	include 'db_connection/config.php';
	session_start();

	if(!isset($_SESSION['user']) && $_SESSION['logged_in'] == false){
		session_unset();
		session_destroy();

		header('Location: index.php?login=error');
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<title>Purchasing System</title>
</head>
<body>
	<header>
		<?php include 'includes/header.php'; ?>
	</header>

	<main>
		<div class="container-fluid mt-5">
			<?php
				$sql = "SELECT * FROM users";
				$result = mysqli_query($conn, $sql);

				if($result->num_rows > 0){
				}
			?>
			<a class="btn btn-success" href="add_user.php">Add</a>
			<table class="table table-striped table-bordered">
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
				<?php while($row = $result->fetch_assoc()){ ?>
				<tbody>
					<tr>
						<td><?php echo $row['user_id']; ?></td>
						<td><?php echo $row['first_name'] .' '. $row['middle_name'] .' '. $row['last_name']; ?></td>
						<td><?php echo $row['age']; ?></td>
						<td><?php echo $row['contact_number']; ?></td>
						<td><?php echo $row['profession']; ?></td>
						<td>
							<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#viewModal">View</button>
							<a class="btn btn-primary" href="edit_user.php?edit=<?php echo $row['user_id']; ?>">Edit</a>
							<a class="btn btn-danger" onclick="return confirm('Are you sure ?');" href="delete.php?delete=<?php echo $row['user_id']; ?>">Delete</a>
						</td>
					</tr>
				</tbody>
				<?php } ?>
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
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>		
	</div>

	<!-- Edit Data Modal -->
	<!-- <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editModalLabel">Update Data</h5>
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
	</div> -->

	<footer class="footer mt-5"> 
		<?php include 'includes/footer.php'; ?>
	</footer>

	<script src="assets/js/jquery-3.3.1.js"></script>
	<script src="assets/js/bootstrap.js"></script>
</body>
</html>