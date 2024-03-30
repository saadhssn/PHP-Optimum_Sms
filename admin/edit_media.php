<?php include 'config/guard.php'; ?>

<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      require 'config/dbc.php';

      $create_date = $_POST['create_date'];
      $media_type = ['media_type'];
      $title = $_POST['title'];
      $slug = $_POST['slug'];
      $description = $_POST['description'];
      $embed_code = $_POST['embed_code'];
      $media_img = 'No Image found!';
      $meta_description = $_POST['meta_description'];
      $meta_keyword = $_POST['meta_keyword'];
      $id = $_POST['id'];

      $img_url = $_POST['img_url'];
      $fileName = $img_url;

      if ($_FILES['media_img']['error'] == 0) 
      {
        $name = uniqid(time());
        $extension = pathinfo($_FILES['media_img']['name'], PATHINFO_EXTENSION);
        $fileName = $name . "." .  $extension;
        $hasFileuploaded = move_uploaded_file($_FILES['media_img']['tmp_name'], '../uploads/' . $fileName);
      }




      $affected = mysqli_query($connection, "UPDATE media SET create_date='$create_date', media_type='$media_type', title='$title', slug='$slug', description='$description', embed_code='$embed_code', media_img='$fileName', meta_description='$meta_description', meta_keyword='$meta_keyword' WHERE id=$id ") or die(mysqli_error($connection));

      if ($affected) 
      {
        if ($hasFileuploaded) 
        
          unlink('../uploads/' . $img_url);
        
        header("Location:media.php");
      }
    }
?>

<?php 
    require 'config/dbc.php';
    $id = $_GET['id'];
    $query = mysqli_query($connection, "SELECT * FROM media WHERE id=$id")or die(mysqli_error($connection));
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
            <h2>Edit Media</h2>
        </div>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PlACE PAGE CONTENT HERE -->
        <form name="formEdit" id="formEdit" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
        <input type="hidden" name="img_url" id="img_url" value="<?php echo $row['media_img']; ?>">
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
                        <select name="media_type" id="media_type" class="form-control">
                          <option value="0">-- Select Media --</option>
                          <option value="slideshow" <?php echo ($row['media_type'] == 'slideshow') ? 'selected' : NULL; ?>>Slideshow</option>
                          <option value="gallery" <?php echo ($row['media_type'] == 'gallery') ? 'selected' : NULL; ?>>Gallery</option>
                          <option value="video" <?php echo ($row['media_type'] == 'video') ? 'selected' : NULL; ?>>Video</option>
                          <option value="audio" <?php echo ($row['media_type'] == 'audio') ? 'selected' : NULL; ?>>Audio</option>
                        </select>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="title" id="title" type="text"  class="form-control" placeholder="Title" value="<?php echo $row['title']; ?>">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="slug" id="slug" type="text"  class="form-control" placeholder="Slug" value="<?php echo $row['slug']; ?>"readonly>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <textarea name="description" id="description" rows="8" class="form-control" placeholder="Description"><?php echo $row['description']; ?></textarea>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <textarea name="embed_code" id="embed_code" rows="8" class="form-control" placeholder="Embed Code"><?php echo $row['embed_code']; ?></textarea>
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
        
                  <h4>Meta Information</h4>
                  <div class="row form-row">
                      <div class="col-md-12">
                       <input type="file" name="media_img" id="media_img"> 
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
          <a href="media.php" class="btn btn-primary btn-cons" type="button"><i class="fa fa-times"></i> Cancel </a>
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

