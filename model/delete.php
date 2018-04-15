<?php
	include '../db_connection/config.php';
	session_start();

	if(isset($_GET['delete'])){
		$id = $_GET['delete'];

		$sql = "DELETE FROM accounts WHERE user_id = '$id'";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			$userID = mysqli_insert_id($conn);

			$sql2 = "DELETE FROM users WHERE user_id = '$id'";
			$result = mysqli_query($conn, $sql2);

			header('Location: ../main.php?delete_data=success');
			exit();
		}


	}else{
		header('Location: ../main.php?delete_data=failed');
		exit();
	}
?>