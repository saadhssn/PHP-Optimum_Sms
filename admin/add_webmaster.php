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
      $status = 'DEACTIVE';
      $meta_description = $_POST['meta_description'];
      $meta_keyword = $_POST['meta_keyword'];

      if (isset($_FILES['webmaster_img']))
      {
        $name = uniqid(time());
        $extension = pathinfo($_FILES['webmaster_img']['name'], PATHINFO_EXTENSION);
        $fileName = $name . "." .  $extension;
        $hasFileuploaded = move_uploaded_file($_FILES['webmaster_img']['tmp_name'], '../uploads/' . $fileName);
      }

      if ($hasFileuploaded)
      {
        mysqli_query($connection, "INSERT INTO webmaster(create_date, fullname, email, profile, webmaster_img, status, meta_description, meta_keyword)
            VALUES('$create_date', '$fullname', '$email', '$profile', '$fileName', '$status', '$meta_description', '$meta_keyword')") or die(mysqli_error($connection));

      header("Location:webmaster.php");
      }
    }
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
            <h2>Add Webmaster</h2>
        </div>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PlACE PAGE CONTENT HERE -->
        <form name="formAdd" id="formAdd" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
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
                        <input name="create_date" id="create_date" type="text"  class="form-control" placeholder="Create Date">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="fullname" id="fullname" type="text"  class="form-control" placeholder="Fullname" >
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="email" id="email" type="text"  class="form-control" placeholder="Email">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <textarea name="profile" id="profile" rows="8" class="form-control" placeholder="Profile | Description" ></textarea>
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
                        <textarea name="meta_description" id="meta_description" rows="8" class="form-control" placeholder="Meta Descriptions"></textarea>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input type="text" name="meta_keyword" id="meta_keyword" class="form-control tagsinput" data-a-sign="$" data-role="tagsinput">
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
       <div class="form-actions">
          <button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-save"></i> Save </button>
          <a href="webmaster.php" class="btn btn-primary btn-cons" type="button"><i class="fa fa-times"></i> Cancel </a>
        </div>
        </div>
      </div>
                </div>
            </div>
        </div>
        </form>
        <script type="text/javascript">
            var frmvalidator  = new Validator("formAdd");
            frmvalidator.addValidation("create_date","req","Date Should't be empty");
            frmvalidator.addValidation("fullname","req","Full Name Should't be empty");
            frmvalidator.addValidation("email","req","Email Should't be empty");
            frmvalidator.addValidation("webmaster_img","req","Atachment Should't be empty");
        </script>
        <!-- END PLACE PAGE CONTENT HERE -->
    </div>
</div>

        <!-- END PLACE PAGE CONTENT HERE -->
    </div>
</div>
     <!-- END PAGE CONTAINER -->
</div>
<!-- END CONTENT --> 
</body>
</html>