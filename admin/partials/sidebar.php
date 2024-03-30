<!-- BEGIN CONTENT -->
<div class="page-container row-fluid">
    <!-- BEGIN SIDEBAR -->
    <!-- BEGIN MENU -->
    <div class="page-sidebar" id="main-menu"> 
          <div class="page-sidebar-wrapper" id="main-menu-wrapper">
        <!-- BEGIN MINI-PROFILE -->
        <div class="user-info-wrapper">
            <div class="user-info">
                <div class="greeting">Welcome</div>
                <div class="username"><span class="semi-bold"><?php echo $_SESSION['fullname']; ?></span></div> &nbsp; &nbsp;
            </div>
        </div>
        <!-- END MINI-PROFILE -->
        <!-- BEGIN SIDEBAR MENU --> 
        <p class="menu-title"></p>
        <?php $uri = $_SERVER['REQUEST_URI']; ?>
        <ul>
            <li class="start <?php echo ($uri == '/optimumsms/admin/member.php') ? 'active' : null; ?>"><a href="member.php"><i class="fa fa-users"></i><span class="title">Member</span><span class="selected"></span></a></li>
            <li class="start <?php echo ($uri == '/optimumsms/admin/category.php') ? 'active' : null; ?>"><a href="category.php"><i class="fa fa-tasks"></i><span class="title">Category</span><span class="selected"></span></a></li>
            <li class="start <?php echo ($uri == '/optimumsms/admin/sms.php') ? 'active' : null; ?>"><a href="sms.php"><i class="fa fa-briefcase"></i><span class="title">SMS</span><span class="selected"></span></a></li>
            <li class="start <?php echo ($uri == '/optimumsms/admin/media.php') ? 'active' : null; ?>"><a href="media.php"><i class="fa fa-film"></i><span class="title">Media</span><span class="selected"></span></a></li>
            <li class="start <?php echo ($uri == '/optimumsms/admin/subscriber.php') ? 'active' : null; ?>"><a href="subscriber.php"><i class="fa fa-check-square-o"></i><span class="title">Subscriber</span><span class="selected"></span></a></li>
            <li class="start <?php echo ($uri == '/optimumsms/admin/webmaster.php') ? 'active' : null; ?>"><a href="webmaster.php"><i class="fa fa-user"></i><span class="title">Webmaster</span><span class="selected"></span></a></li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    </div>
    <!-- END MENU -->
    <!-- BEGIN SIDEBAR FOOTER WIDGET -->
    <div class="footer-widget">     
       <a href="http://www.alfateemacademy.com" target="_blank"> Al-Fateem Academy  <small>&reg;</small> </a>
    </div>
    <!-- END SIDEBAR FOOTER WIDGET -->
    <!-- END SIDEBAR -->