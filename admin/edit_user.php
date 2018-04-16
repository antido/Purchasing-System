<?php
	include '../db_connection/config.php';
	session_start();

	if(!isset($_SESSION['user']) && $_SESSION['logged_in'] == false){
		session_unset();
		session_destroy();

		header('Location: ../index.php?login=error');
		exit();
	}

	if(isset($_GET['edit'])){
		$id = $_GET['edit'];

		$sql = "SELECT * FROM users WHERE user_id = '$id'";
		$result = mysqli_query($conn, $sql);

		if ($result->num_rows > 0){
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<title>Purchasing System</title>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="main.php">System</a>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" href="main.php">Main</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="model/logout.php">Logout</a>
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
					<?php while($row = $result->fetch_assoc()) { ?>
					<form action="model/edit.php" method="POST">
						<h2>Update Data</h2>
						<div class="form-group">
							<input type="hidden" class="form-control" name="id" value="<?php echo $row['user_id']; ?>">
						</div>
						<div class="form-group">
							<label>Firstname:</label>
							<input type="text" class="form-control" name="fName" value="<?php echo $row['first_name']; ?>">
						</div>
						<div class="form-group">
							<label>Middlename:</label>
							<input type="text" class="form-control" name="mName" value="<?php echo $row['middle_name']; ?>">
						</div>
						<div class="form-group">
							<label>Lastname:</label>
							<input type="text" class="form-control" name="lName" value="<?php echo $row['last_name']; ?>">
						</div>
						<div class="form-group">
							<label>Age:</label>
							<input type="number" class="form-control" name="age" value="<?php echo $row['age']; ?>">
						</div>
						<div class="form-group">
							<label>Gender:</label>
							<select class="form-control" name="gender">
								<option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Others">Others</option>
							</select>
						</div>
						<div class="form-group">
							<label>Contact Number:</label>
							<input type="text" class="form-control" name="contactNum" value="<?php echo $row['contact_number']; ?>">
						</div>
						<div class="form-group">
							<label>Home Address:</label>
							<input type="text" class="form-control" name="homeAddr" value="<?php echo $row['home_address']; ?>">
						</div>
						<div class="form-group">
							<label>Profession:</label>
							<input type="text" class="form-control" name="profession" value="<?php echo $row['profession']; ?>">
						</div>
						<div class="form-group">
							<input type="hidden" class="form-control" name="createdDate" value="<?php echo $row['createdDate']; ?>">
						</div>
						<div class="form-group">
							<input type="submit" class="form-control btn-primary" name="edit" value="Update">
						</div>
					</form>
					<?php } ?>
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
</body>
</html>