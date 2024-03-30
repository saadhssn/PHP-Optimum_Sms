<?php include 'config/guard.php'; ?>

<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      require 'config/dbc.php';

      $create_date = $_POST['create_date'];
      $fullname = $_POST['fullname'];
      $email = $_POST['email'];
      $profile = $_POST['profile'];
      $webmaster_img = 'No Image Found!';
      $meta_description = $_POST['meta_description'];
      $meta_keyword = $_POST['meta_keyword'];
      $id = $_POST['id'];

      $img_url = $_POST['img_url'];
      $fileName = $img_url;

      if ($_FILES['webmaster_img']['error'] == 0) 
      {
        $name = uniqid(time());
        $extension = pathinfo($_FILES['webmaster_img']['name'], PATHINFO_EXTENSION);
        $fileName = $name . "." .  $extension;
        $hasFileuploaded = move_uploaded_file($_FILES['webmaster_img']['tmp_name'], '../uploads/' . $fileName);
      }


      $affected = mysqli_query($connection, "UPDATE webmaster SET create_date='$create_date', fullname='$fullname', email='$email', profile='$profile', webmaster_img='$fileName', meta_description='$meta_keyword', meta_keyword='$meta_keyword' WHERE id='$id' ") or die(mysqli_error($connection));

      if ($affected) 
      {
        if ($hasFileuploaded) 
        
          unlink('../uploads/' . $img_url);
        
        header("Location:webmaster.php");
      }
    }
?>

<?php 
    require 'config/dbc.php';
    $id = $_GET['id'];
    $query = mysqli_query($connection, "SELECT * FROM webmaster WHERE id=$id")or die(mysqli_error($connection));
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
            <h2>Edit Webmaster</h2>
        </div>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PlACE PAGE CONTENT HERE -->
        <form name="formEdit" id="formEdit" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
        <input type="hidden" name="img_url" id="img_url" value="<?php echo $row['webmaster_img']; ?>">
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
                    <div class="row form-row">
                      <div class="col-md-12">
                        <textarea name="profile" id="profile" rows="8" class="form-control" placeholder="Profile | Description" ><?php echo $row['create_date']; ?></textarea>
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
        
                  <h4>Meta Information</h4>
                   <div class="row form-row">
                      <div class="col-md-12">
                       <input type="file" name="webmaster_img" id="webmaster_img"> 
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <textarea name="meta_description" id="meta_description" rows="8" class="form-control" placeholder="Meta Descriptions"><?php echo $row['meta_description']; ?></textarea>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input type="text" name="meta_keyword" id="meta_keyword" class="form-control tagsinput" data-a-sign="$" data-role="tagsinput" value="<?php echo $row['meta_keyword']; ?>">
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
       <div class="form-actions">
          <button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-save"></i> Update </button>
          <a href="webmaster.php" class="btn btn-primary btn-cons" type="button"><i class="fa fa-times"></i> Cancel </a>
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

