<?php 
	session_start();
	$isValid = $_SESSION['is_valid'];

	if ( ! $isValid ) {
		header("Location:index.php");
	}
?>