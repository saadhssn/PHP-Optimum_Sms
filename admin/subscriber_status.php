<?php 
    require 'config/dbc.php';

    $id = $_GET['id'];
    
    $query = mysqli_query($connection, "SELECT status FROM subscriber WHERE id=$id")or die(mysqli_error($connection));
    $row = mysqli_fetch_array($query);

    $newStatus = ($row['status'] == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';

    mysqli_query($connection, "UPDATE subscriber SET status='$newStatus' WHERE id=$id")or die(mysqli_error($connection));
    header("Location:subscriber.php");
?>


