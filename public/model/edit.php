<?php 
	include '../../db_connection/config.php';
	session_start();

	if(isset($_POST['edit'])){

		$id = $_POST['id'];
		$fName = mysqli_real_escape_string($conn, $_POST['fName']);
		$mName = mysqli_real_escape_string($conn, $_POST['mName']);
		$lName = mysqli_real_escape_string($conn, $_POST['lName']);
		$age = mysqli_real_escape_string($conn, $_POST['age']);
		$gender = mysqli_real_escape_string($conn, $_POST['gender']);
		$contactNum = mysqli_real_escape_string($conn, $_POST['contactNum']);
		$homeAddr = mysqli_real_escape_string($conn, $_POST['homeAddr']);
		$profession = mysqli_real_escape_string($conn, $_POST['profession']);
		$createdDate = $_POST['createdDate'];

		$sql = "UPDATE users SET first_name = '$fName', middle_name = '$mName', last_name = '$lName', age = '$age', gender = '$gender', contact_number = '$contactNum', home_address = '$homeAddr', profession = '$profession', createdDate = '$createdDate', updatedDate = now() WHERE user_id = '$id'";
		$result = mysqli_query($conn, $sql);

		header('Location: ../main.php?update_data=success');
		exit();
	}else{
		header('Location: ../main.php?update_data=failed');
		exit();
	}
?>