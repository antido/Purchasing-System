<?php
	include '../../db_connection/config.php';
	session_start();

	if(isset($_POST['add'])){

        $fName = mysqli_real_escape_string($conn, $_POST['fName']);
        $mName = mysqli_real_escape_string($conn, $_POST['mName']);
        $lName = mysqli_real_escape_string($conn, $_POST['lName']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $contactNum = mysqli_real_escape_string($conn, $_POST['contactNum']);
        $homeAddr = mysqli_real_escape_string($conn, $_POST['homeAddr']);
        $profession = mysqli_real_escape_string($conn, $_POST['profession']);

		$sql = "INSERT INTO users (first_name, middle_name, last_name, age, gender, contact_number, home_address, profession, createdDate, updatedDate) VALUES ('$fName', '$mName', '$lName', '$age', '$gender', '$contactNum', '$homeAddr', '$profession', now(), now())";
		$result = mysqli_query($conn, $sql);

		if($result){
			$userID = mysqli_insert_id($conn);

			$sql2 = "INSERT INTO accounts (user_id, username, password, account_type, createdDate, updatedDate) VALUES ((SELECT user_id FROM users WHERE user_id = '$userID'), '$contactNum', '$lName', 'Public', now(), now())";
			$result2 = mysqli_query($conn, $sql2);

			$sql3 = "INSERT INTO activity (user_id, activity_description, activity_createdDate, activity_updatedDate) VALUES ('".$_SESSION['userId']."', 'Added Public Account', now(), now())";
			$result3 = mysqli_query($conn, $sql3);

			header('Location: ../main.php?add_user=success');
			exit();
		}

	}else{
		header('Location: ../main.php?add_user=failed');
		exit();
	}
?>