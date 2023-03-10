<div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="footer-about-us">
                        <h2>Laptop & Desktop Rental<span>  Management System</span></h2>
                        <?php 
 $query=mysqli_query($con,"select * from  tblpage where PageType='aboutus'");
 while ($row=mysqli_fetch_array($query)) {


 ?>
                        <p style="color:#fff !important"><?php  echo $row['PageDescription'];?></p><?php } ?>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Quick Links </h2>
                        <ul>
                           <li class="active"><a href="index.php">Home</a></li>
                        <!-- <li><a href="shop.php">Rental page</a></li>
                        <li><a href="laptop.php">Laptop</a></li>
                        <li><a href="desktop.php">Desktop</a></li>
                        <li><a href="aboutus.php">About</a></li>
                        <li><a href="contactus.php">Contact Us</a></li> -->
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-4 col-sm-6">
                    <div class="footer-menu">
                        <!-- <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <li><a href="laptop.php">Laptop</a></li>
                            <li><a href="desktop.php">Desktop</a></li>
                           
                        </ul>  -->                      
                    </div>
                </div>
                
             
            </div>
        </div>
    </div> <!-- End footer top area -->
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; Laptop & Desktop Rental Management System</p>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->