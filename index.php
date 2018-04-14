<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<title>Purchasing System</title>
</head>
<body>
	<main>
		<div class="container mt-5">
			<div class="row">
				<div class="col-md">
				</div>
				<div class="col-md">
					<form action="login.php" method="POST">
						<h2 class="text-center">Welcome</h2>
						<div class="form-group">
							<label>Username:</label>
							<input type="text" class="form-control" name="username" placeholder="Enter Username" required>
						</div>
						<div class="form-group">
							<label>Password:</label>
							<input type="password" class="form-control" name="password" placeholder="Enter Password" required>
						</div>
						<div class="form-group">
							<input type="submit" class="form-control btn-primary" name="login" value="Login">
						</div>
					</form>
					<form action="register_user.php">
						<div class="form-group">
							<input type="submit" class="form-control btn btn-secondary" name="register" value="Register Account">
						</div>
					</form>
				</div>
				<div class="col-md">
				</div>
			</div>
		</div>
	</main>

	<script src="assets/js/jquery-3.3.1.js"></script>
	<script src="assets/js/bootstrap.js"></script>
</body>
</html>