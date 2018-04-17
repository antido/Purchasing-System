<?php
	include '../db_connection/config.php';
	session_start();

	if(isset($_POST['captcha']) && $_POST['captcha'] != "" && $_SESSION['code'] == $_POST['captcha']){
		
		if(isset($_POST['register'])){
			$fName = mysqli_real_escape_string($conn, $_POST['fName']);
			$mName = mysqli_real_escape_string($conn, $_POST['mName']);
			$lName = mysqli_real_escape_string($conn, $_POST['lName']);
			$age = mysqli_real_escape_string($conn, $_POST['age']);
			$gender = mysqli_real_escape_string($conn, $_POST['gender']);
			$contactNum = mysqli_real_escape_string($conn, $_POST['contactNum']);
			$homeAddr = mysqli_real_escape_string($conn, $_POST['homeAddr']);
			$profession = mysqli_real_escape_string($conn, $_POST['profession']);
			$username = mysqli_real_escape_string($conn, $_POST['username']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);

			$sql = "INSERT INTO users (first_name, middle_name, last_name, age, gender, contact_number, home_address, profession, createdDate, updatedDate) VALUES ('$fName', '$mName', '$lName', '$age', '$gender', '$contactNum', '$homeAddr', '$profession', now(), now())";
			$result = mysqli_query($conn, $sql);

			if($result){
				$userID = mysqli_insert_id($conn);

				$sql2 = "INSERT INTO accounts (user_id, username, password, account_type, createdDate, updatedDate) VALUES ((SELECT user_id FROM users WHERE user_id = '$userID'), '$username', '$password', 'Public', now(), now())";
				$result = mysqli_query($conn, $sql2);

				header('Location: ../index.php?registration=success');
				exit();
			}
		}else{
			header('Location: ../index.php?registration=failed');
			exit();
		}
	}else{
		echo ('<script language="javascript">
		window.alert("Invalid Captcha");
		window.history.go(-1);
		</script>');
	}
?>