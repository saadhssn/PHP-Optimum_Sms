<!-- BEGIN HEADER HERE -->
    <?php include 'partials/header.php'; ?>
<!-- END HEADER HERE -->
    <div id="body">
		<section id="content">
	       <?php 
                require_once 'config/dbc.php';
                $id = $_GET['id'];
                $getSMSByCategoryId = mysqli_query($connection, "SELECT * FROM message WHERE category_id=$id ") or die(mysqli_error($connection));
                while ($viewSMSByCategoryId = mysqli_fetch_array($getSMSByCategoryId)) {
                ?>
        		<article class="expanded">
                	<h2><?php echo $viewSMSByCategoryId['title']; ?></h2>
        			<div class="article-info">
                    Posted on <time datetime="2013-05-14"><?php echo $viewSMSByCategoryId['create_date']; ?></time> 
                    by <a href="#" rel="author">
                        <?php
                            $member_id = $viewSMSByCategoryId['member_id'];
                            $getMemberById = mysqli_query($connection, "SELECT * FROM member WHERE id=$member_id")or die(mysqli_error($connection));
                            $viewMemberById = mysqli_fetch_array($getMemberById);
                            echo $viewMemberById['fullname'];
                        ?>
                            
                        </a>
                    in <a href="#" rel="author">
                        <?php 
                            $category_id = $viewSMSByCategoryId['category_id'];
                            $getCategoryById = mysqli_query($connection, "SELECT * FROM category WHERE id=$category_id")or die(mysqli_error($connection));
                            $viewCategoryById = mysqli_fetch_array($getCategoryById);
                            echo $viewCategoryById['title'];
                        ?>
                        </a></div>
                    <p><?php echo substr($viewSMSByCategoryId['content'], 0, 100); ?>...</p>
        		<a href="sms.php?id=<?php echo $viewSMSByCategoryId['id']; ?>" class="button">Read more</a>
        		</article>
        <?php } ?>
        
        
        
        
        
        
        
        
        
        
        </section>
        <!-- BEGIN SIDEBAR HERE  -->
        <?php include 'partials/sidebar.php'; ?>
        <!-- END SIDEBAR HERE  -->
    </div>
    <!-- BEGIN FOOTER HERE -->
    <?php include 'partials/footer.php'; ?>
    <!-- END FOOTER HERE -->