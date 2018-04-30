<?php
	include '../../db_connection/config.php';
	session_start();

	if(isset($_POST['editAccount'])){
		$accountId = $_POST['accountId'];
		$userId = $_POST['userId'];
		$createdDate = $_POST['createdDate'];
		$accntType = $_POST['accntType'];
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);

		$sql = "UPDATE accounts SET user_id = '$userId', username = '$username', password = '$password', account_type = '$accntType', createdDate = '$createdDate', updatedDate = now() WHERE account_id = '$accountId'";
		$result = mysqli_query($conn, $sql);

		header('Location: ../main.php?update_account=success');
		exit();
	}else{
		header('Location: ../main.php?update_account=failed');
		exit();
	}
?>