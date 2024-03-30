<?php
	require 'config/dbc.php';


	$id = $_GET['id'];

	$query = mysqli_query($connection, "SELECT webmaster_img FROM webmaster WHERE id=$id")or die(mysqli_error($connection));
	$row = mysqli_fetch_array($query);
	$currentImage = $row['webmaster_img'];


	$affected = mysqli_query($connection, "DELETE FROM webmaster WHERE id=$id")or die(mysqli_error($connection));

	if ($affected)
	{
		unlink('../uploads/' . $currentImage);
		header("Location:webmaster.php");
	}


?>