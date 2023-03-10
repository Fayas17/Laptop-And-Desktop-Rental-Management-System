<div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <?php if (strlen($_SESSION['ldrmsuid']!=0)) {?>
                            <li><a href="profile.php"><i class="fa fa-user"></i> My Profile</a></li>
                            <li><a href="change-password.php"><i class="fa fa-heart"></i> Change Password</a></li>
                            <li><a href="logout.php"><i class="fa fa-user"></i> Logout</a></li>
                            <li><a href="my-booking.php"><i class="fa fa-lock"></i> My Booking</a></li> <?php } ?>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                           
 <?php if (strlen($_SESSION['ldrmsuid']==0)) {?>
<li><a href="login.php"><i class="fa fa-user"></i> Login</a></li>
                            <li><a href="register.php"><i class="fa fa-user"></i> Signup</a></li>
                            <li><a href="admin/login.php"><i class="fa fa-user"></i> Admin</a></li>
                          <?php } ?> 
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="index.php">Laptop & Desktop Rental<span>  Management System</span></a></h1>
                    </div>
                </div>
                
              
            </div>
        </div>
    </div> <!-- End site branding area -->
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                       <!-- <li><a href="shop.php">Rental page</a></li>
                        <li><a href="laptop.php">Laptop</a></li>
                        <li><a href="desktop.php">Desktop</a></li> -->
                        <li><a href="aboutus.php">About Us</a></li>
                        <li><a href="contactus.php">Contact Us</a></li>
                        
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->