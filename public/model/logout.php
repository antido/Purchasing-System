<?php
	include '../../db_connection/config.php';
	session_start();

	if(isset($_SESSION['user']) && $_SESSION['logged_in'] == true){
		session_unset();
		session_destroy();

		header('Location: ../../index.php?logout=success');
		exit();
	}else{
		header('Location: ../main.php?logout=failed');
		exit();
	}
?>