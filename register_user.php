<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="assets/js/jquery-3.3.1.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
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
						<h5 class="text-success mt-5">Register Account</h5>
						<div class="form-group mt-3">
							<label>Username:</label>
							<input type="text" class="form-control" name="username" placeholder="Enter Preferred Username" required>
						</div>
						<div class="form-group">
							<label>Password:</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Enter Preferred Password" required>
							<label>Confirm Password:</label>
						    <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Re-type Password">
							<span id="message"></span>
						</div>
						<div class="form-group">
							<img class="form-control" src="model/captcha.php">
							<input type="text" class="form-control" name="captcha" placeholder="Enter Captcha" require>
						</div>
						<div class="form-group">
							<input type="submit" class="form-control btn btn-primary" id="register-user" name="register" value="Register">
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

	<script>
		$(document).ready(function(){
			$('#password, #confirm-password').on('keyup', function () {
			  if ($('#password').val() != $('#confirm-password').val()) {
			    $('#message').html('Not Matching').css('color', 'red');
			    $('#register-user').attr('disabled', true);
			  } else{
			    $('#message').html('Matching').css('color', 'green');
			    $('#register-user').attr('disabled', false);
			  } 
			});
		});
	</script>
</body>
</html>