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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
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
						<a class="nav-link" href="#">Stocks</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="model/logout.php">Logout</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>

	<footer class="footer mt-5">
		<?php include '../includes/footer.php'; ?>
	</footer>

	<script src="../assets/js/jquery-3.3.1.js"></script>
	<script src="../assets/js/bootstrap.js"></script>
</body>
</html>