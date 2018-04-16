<?php
	include '../../db_connection/config.php';
	session_start();
	
	if(isset($_POST['userId'])){

		$id = $_POST['userId'];

		$sql = "SELECT * FROM users WHERE user_id = '$id'";
		$result = mysqli_query($conn, $sql);

		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo 
				"
					<table>
						<tr>
							<td>Firstname:</td>
							<td>$row[first_name]</td>
						</tr>
						<tr>
							<td>Middlename:</td>
							<td>$row[middle_name]</td>
						</tr>
						<tr>
							<td>Lastname:</td>
							<td>$row[last_name]</td>
						</tr>
						<tr>
							<td>Age:</td>
							<td>$row[age]</td>
						</tr>
						<tr>
							<td>Gender:</td>
							<td>$row[gender]</td>
						</tr>
						<tr>
							<td>Contact Number:</td>
							<td>$row[contact_number]</td>
						</tr>
						<tr>
							<td>Home Address:</td>
							<td>$row[home_address]</td>
						</tr>
						<tr>
							<td>Profession:</td>
							<td>$row[profession]</td>
						</tr>
					<table>
				";
			}
		}
	}
	
?>



