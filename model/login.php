<?php
	include '../db_connection/config.php';
	session_start();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$user = mysqli_real_escape_string($conn, $_POST['username']);
		$pass = mysqli_real_escape_string($conn, $_POST['password']);

		$sql = "SELECT * FROM accounts WHERE username = '$user' AND password = '$pass'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$active = $row;
		$count = mysqli_num_rows($result);
		if($count == 1 && $row['account_type'] == 'Public'){
			$_SESSION['user'] = $user;
			$_SESSION['logged_in'] = true;

			header('Location: ../public/main.php?login=success');
			exit();
		}else if($count == 1 && $row['account_type'] == 'Admin'){
			$_SESSION['user'] = $user;
			$_SESSION['logged_in'] = true;

			header('Location: ../admin/main.php?login=success');
			exit();
		}else{
			header('Location: ../index.php?login=failed');
			exit();
		}
	}else{
		header('Location: ../index.php?login=failed');
		exit();
	}
?>