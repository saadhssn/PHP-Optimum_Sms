<aside class="sidebar">
	
            <ul>	
               <li>
                    <h4>Categories</h4>
                    <ul>
                        <?php
                            require_once 'config/dbc.php';
                            $getAllCategories = mysqli_query($connection, "SELECT * FROM category WHERE status='ACTIVE'")or die(mysqli_error($connection));
                            while ($viewAllCategories = mysqli_fetch_array($getAllCategories)) {
                        ?>
                                <li><a href="category.php?id=<?php echo $viewAllCategories['id']; ?>"><?php echo $viewAllCategories['title']; ?></a></li>
                    <?php } ?>
                    </ul>
                </li>
                
                <li>
                    <h4>Latest SMS</h4>
                    <ul>
                        <?php
                            require_once 'config/dbc.php';
                            $getLatestSMS = mysqli_query($connection, "SELECT * FROM message WHERE status='ACTIVE' ORDER BY id DESC LIMIT 5")or die(mysqli_error($connection));
                            while ($viewLatestSMS = mysqli_fetch_array($getLatestSMS)) {
                        ?>
                                <li><a href="sms.php?id=<?php echo $viewLatestSMS['id']; ?>"><?php echo $viewLatestSMS['title']; ?></a></li>
                    <?php } ?>
                    </ul>
                </li>
                
                <li>
                	<h4>Search site</h4>
                    <ul>
                    	<li class="text">
                            <form method="get" class="searchform" action="#" >
                                <p><input type="text" size="22" value="" name="s" class="s" /></p>
                               	<p><input type="submit" value="Search"></p>
                            </form>	
						</li>
					</ul>
                </li>
                
                <li>
                    <h4>SMS of the Day</h4>
                    <ul>
                    	<?php 
                            require_once 'config/dbc.php';
                            $getRandomSMS = mysqli_query($connection, "SELECT * FROM message WHERE status='ACTIVE' ORDER BY rand() LIMIT 1") or die(mysqli_error($connection));
                            $viewRandomSMS = mysqli_fetch_array($getRandomSMS);
                        ?>
                        <li><p><?php echo $viewRandomSMS['content']; ?></p></li>  
                    </ul>
                </li>
                
            </ul>
		
        </aside>
    	<div class="clear"></div>