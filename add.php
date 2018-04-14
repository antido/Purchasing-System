<?php
	include 'config.php';
	session_start();

	if(isset($_POST['add'])){
		
		$fromDate = new \DateTime('now');
        $fromDate->setTime(0, 0, 0);
        $toDate = clone $fromDate;
        $toDate->modify('+1 day');

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

		$sql2 = "INSERT INTO accounts (username, password, createdDate, updatedDate) VALUES ('$contactNum', '$lName', now(), now())";
		$result2 = mysqli_query($conn, $sql2);

		header('Location: main.php?add_user=success');
		exit();
	}else{
		header('Location: main.php?add_user=failed');
		exit();
	}
?>