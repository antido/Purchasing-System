<?php
	include '../db_connection/config.php';
	session_start();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$user = mysqli_real_escape_string($conn, $_POST['username']);
		$pass = mysqli_real_escape_string($conn, $_POST['password']);

		$sql = "SELECT * FROM accounts WHERE username = '$user' AND password = '$pass'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array(MYSQLI_ASSOC, $result);
		$active = $row;
		$count = mysqli_num_rows($result);
		if($count == 1){
			$_SESSION['user'] = $user;
			$_SESSION['logged_in'] = true;

			header('Location: ../main.php?login=success');
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