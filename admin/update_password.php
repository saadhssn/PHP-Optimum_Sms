<?php

    session_start(); 
    require 'config/dbc.php';

    $old_password = $_POST['old_password'];
    $again_password = $_POST['again_password'];
    $member_id = $_SESSION['member_id'];

    $query = mysqli_query($connection, "UPDATE member SET password='$again_password' WHERE password='$old_password' AND id = $member_id ") or die(mysqli_error($connection));

    if ($query) 
    {
      session_destroy();
      header("Location:index.php");
    }
?>