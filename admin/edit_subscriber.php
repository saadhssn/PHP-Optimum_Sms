<?php include 'config/guard.php'; ?>

<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      require 'config/dbc.php';

      $create_date = $_POST['create_date'];
      $fullname = $_POST['fullname'];
      $email = $_POST['email'];
      $id = $_POST['id'];

      mysqli_query($connection, "UPDATE subscriber SET create_date='$create_date', fullname='$fullname', email='$email' WHERE id=$id ") or die(mysqli_error($connection));

      header("Location:subscriber.php");
    }
?>

<?php 
    require 'config/dbc.php';
    $id = $_GET['id'];
    $query = mysqli_query($connection, "SELECT * FROM subscriber WHERE id=$id")or die(mysqli_error($connection));
    $row = mysqli_fetch_array($query);
?>

<!-- BEGIN HEADER HERE -->
    <?php include 'partials/header.php';  ?>
<!-- END HEADER HERE -->

<!-- BEGIN SIDEBAR HERE -->
    <?php include 'partials/sidebar.php'; ?>
<!-- END SIDEBAR HERE -->

    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
    <div class="content">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h2>Edit Subscriber</h2>
        </div>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PlACE PAGE CONTENT HERE -->
        <form name="formEdit" id="formEdit" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
        <div class="col-md-14">
            <div class="grid simple">
                <div class="grid-body no-border">
                    <div class="row">
        <div class="col-md-12">
          <div class="grid simple">
            <div class="grid-title no-border">
              &nbsp;
            </div>
            <div class="grid-body no-border">
              <div class="row column-seperation">
                <div class="col-md-6">
                  <h4>Basic Information</h4>            
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="create_date" id="create_date" type="text"  class="form-control" placeholder="Create Date" value="<?php echo $row['create_date']; ?>">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="fullname" id="fullname" type="text"  class="form-control" placeholder="Fullname" value="<?php echo $row['fullname']; ?>">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="email" id="email" type="text"  class="form-control" placeholder="Email" value="<?php echo $row['email']; ?>">
                      </div>
                    </div>
                </div>
                
              </div>
            </div>
          </div>
       <div class="form-actions">
          <button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-save"></i> Update </button>
          <a href="subscriber.php" class="btn btn-primary btn-cons" type="button"><i class="fa fa-times"></i> Cancel </a>
        </div>
        </div>
      </div>
                </div>
            </div>
        </div>
      </form>
        <!-- END PLACE PAGE CONTENT HERE -->
    </div>
</div>

     <!-- END PAGE CONTAINER -->
</div>
<!-- END CONTENT --> 
</body>
</html>

