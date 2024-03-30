<!-- BEGIN HEADER HERE -->
    <?php include 'partials/header.php'; ?>
<!-- END HEADER HERE -->
    <div id="body">
		<section id="content">
    	    <article>
    			<h2>Team</h2>		
                <p>Welcome to flame, a free premium valid CSS3 &amp; HTML5 web template from <a href="http://zypopwebtemplates.com/" title="ZyPOP">ZyPOP</a>. This template is completely <strong>free</strong> to use permitting a link remains back to  <a href="http://zypopwebtemplates.com/" title="ZyPOP">http://zypopwebtemplates.com/</a>. Should you wish to use this template unbranded you can buy a template license from our website for 8.00 GBP, this will allow you remove all branding related to our site, for more information about this see below.</p>			
    		</article>
            <article>
                <ul class="list-unstyled list-inline">
                    <?php 
                            require_once 'config/dbc.php';
                            $getLatestImage = mysqli_query($connection, "SELECT * FROM webmaster WHERE status='ACTIVE' ORDER BY id DESC LIMIT 8") or die(mysqli_error($connection));
                            while ($viewLatestImage = mysqli_fetch_array($getLatestImage)) {
                        ?>
                        
                                <li><img src="uploads/<?php echo $viewLatestImage['webmaster_img']; ?>" width="120" class="img-thumbnail" alt="<?php echo $viewLatestImage['fullname']; ?>"></li>
                        <?php } ?>
                </ul>
            </article>
        </section>
        <!-- BEGIN SIDEBAR HERE  -->
        <?php include 'partials/sidebar.php'; ?>
        <!-- END SIDEBAR HERE  -->
    </div>
    <!-- BEGIN FOOTER HERE -->
    <?php include 'partials/footer.php'; ?>
    <!-- END FOOTER HERE -->