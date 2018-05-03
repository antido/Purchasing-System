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
	<title>Purchasing System - Public</title>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="main.php">System</a>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="main.php">Home</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle active" href="#" id="publicActionsDropdownMenu" data-toggle="dropdown">Actions</a>
						<div class="dropdown-menu" aria-labelledby="publicActionsDropdownMenu">
							<a class="dropdown-item" href="../stocks/stock_main.php">Stocks</a>
							<a class="dropdown-item active" href="change_account.php">Update Account</a>
							<a class="dropdown-item" href="model/logout.php">Logout</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</header>

	<main>
		<div class="container mt-5">
			<div class="row">
				<div class="col-md">
				</div>
				<div class="col-md">
					<?php
						$id = $_SESSION['userId'];

						$sql = "SELECT * FROM accounts WHERE user_id = '$id'";
						$result = mysqli_query($conn, $sql);

						if($result->num_rows > 0){

						}
					?>
					<h2 class="text-center">Change Credentials</h2>
					<form action="model/edit_account.php" method="POST">
						<?php while($row = $result->fetch_assoc()) { ?>
						<div class="form-group">
							<input type="hidden" class="form-control" name="accountId" value="<?php echo $row['account_id']; ?>">
						</div>
						<div class="form-group">
							<input type="hidden" class="form-control" name="userId" value="<?php echo $row['user_id']; ?>">
						</div>
						<div class="form-group">
							<input type="hidden" class="form-control" name="createdDate" value="<?php echo $row['createdDate']; ?>">
						</div>
						<div class="form-group">
							<input type="hidden" class="form-control" name="accntType" value="<?php echo $row['account_type']; ?>">
						</div>
						<div class="form-group">
							<label>New Username:</label>
							<input type="text" class="form-control" name="username" placeholder="Enter New Username" required>
						</div>
						<div class="form-group">
							<label>New Password:</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Enter New Password" required>
						</div>
						<div class="form-group">
							<label>Confirm New Password:</label>
							<input type="password" class="form-control" id="confirm-password" name="confirmPass" placeholder="Confirm Password" required>
							<span id="message"></span>
						</div>
						<div class="form-group">
							<input type="submit" class="form-control btn-primary" id="change-btn" name="editAccount" value="Update Account">
						</div>
						<?php } ?>
					</form>
				</div>
				<div class="col-md">
				</div>
			</div>
		</div>
	</main>

	<footer class="footer mt-5">
		<?php include '../includes/footer.php'; ?>
	</footer>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#password, #confirm-password').on('keyup', function(){
				if($('#password').val() != $('#confirm-password').val()){
					$('#message').html('Not Matching').css('color', 'red');
					$('#change-btn').attr('disabled', true);
				}else{
					$('#message').html('Matching').css('color', 'green');
					$('#change-btn').attr('disabled', false);
				}
			});
		});
	</script>
</body>
</html>