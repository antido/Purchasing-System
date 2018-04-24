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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
	<title>Purchasing System</title>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="main.php">System</a>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="main.php">Main</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../model/logout.php">Logout</a>
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
					<form action="model/add_admin.php" method="POST">
						<h2 class="text-center">Create Admin Account</h2>
						<h5 class="text-success mt-5">Personal Information</h5>
						<div class="form-group mt-3">
							<label>Firstname:</label>
							<input type="text" class="form-control" name="fName" placeholder="Enter Firstname" required>
						</div>
						<div class="form-group">
							<label>Middlename:</label>
							<input type="text" class="form-control" name="mName" placeholder="Enter Middlename">
						</div>
						<div class="form-group">
							<label>Lastname:</label>
							<input type="text" class="form-control" name="lName" placeholder="Enter Lastname" required>
						</div>
						<div class="form-group">
							<label>Age:</label>
							<input type="number" class="form-control" name="age" placeholder="Enter Age" required>
						</div>
						<div class="form-group">
							<label>Gender:</label>
							<select class="form-control" name="gender" required>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Others">Others</option>
							</select>
						</div>
						<div class="form-group">
							<label>Contact Number:</label>
							<input type="text" class="form-control" name="contactNum" placeholder="Enter Contact Number" required>
						</div>
						<div class="form-group">
							<label>Home Address:</label>
							<input type="text" class="form-control" name="homeAddr" placeholder="Enter Home Address" required>
						</div>
						<div class="form-group">
							<label>Profession:</label>
							<input type="text" class="form-control" name="profession" placeholder="Enter Profession" required>
						</div>
						<h5 class="text-success mt-5">Register Account</h5>
						<div class="form-group mt-3">
							<label>Admin Username:</label>
							<input type="text" class="form-control" name="username" placeholder="Enter Admin Username">
						</div>
						<div class="form-group">
							<label>Admin Password:</label>
							<input type="password" class="form-control" name="password" id="pass" placeholder="Enter Admin Password">
							<label class="mt-3">Confirm Admin Password:</label>
							<input type="password" class="form-control" name="confirmPassword" id="confirm-password" placeholder="Re-type Admin Password">
							<span id="message"></span>
						</div>
						<div class="form-group">
							<input type="submit" class="form-control btn-success" id="add-admin" name="add" value="Add">
						</div>
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

	<script src="../assets/js/jquery-3.3.1.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
	<script>
		$(document).ready(function(){
			$('#pass, #confirm-password').on('keyup', function(){
				if($('#pass').val() != $('#confirm-password').val()){
					$('#message').html('Not Matching').css('color', 'red');
					$('#add-admin').attr('disabled', true);
				}else{
					$('#message').html('Matching').css('color', 'green');
					$('#add-admin').attr('disabled', false);
				}
			});
		});
	</script>
</body>
</html>












