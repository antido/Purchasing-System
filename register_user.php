<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<title>Purchasing System</title>
</head>
<body>
	<section class="mt-2">
		<a class="btn btn-secondary" href="index.php">BACK</a>
	</section>

	<main>
		<div class="container mt-3">
			<div class="row">
				<div class="col-md">
				</div>
				<div class="col-md">
					<form action="model/register.php" method="POST">
						<h2 class="text-center text-primary">Registration Form</h2>
						<div class="form-group mt-5">
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
							<select class="form-control" name="gender">  
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
						<div class="form-group">
							<input type="submit" class="form-control btn btn-primary" name="register" value="Register">
						</div>
					</form>
				</div>
				<div class="col-md">
				</div>
			</div>
		</div>
	</main>
	
	<footer class="footer mt-5">
	</footer>

	<script src="assets/js/jquery-3.3.1.js"></script>
	<script src="assets/js/bootstrap.js"></script>
</body>
</html>