<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Laptop and Desktop Rental Management System || Single Product Details</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
  </head>
  <body>
    
    <?php include_once('includes/header .php');?>
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Single Product Details</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="single-sidebar">
                       <!--  <h2 class="sidebar-title">Search Products</h2>
                        <form action="search-result.php" method="post">
                            <input type="text" name="searchtext" required placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                    
                                  
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul> 
                        <?php                           
 $query=mysqli_query($con,"select distinct * from tblproduct  order by ID desc limit 6");
 while ($row=mysqli_fetch_array($query)) {
 ?>
                            <li><a href="single-product-details.php?viewid=<?php echo $row['ID'];?>"><?php echo $row['ProductName'];?></a></li>
<?php } ?>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right"> -->
                        
                        <?php

                      $cid=$_GET['viewid'];                             
 $query=mysqli_query($con,"select * from tblproduct where ID='$cid'");
 while ($row=mysqli_fetch_array($query)) {
 ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="admin/images/<?php echo $row['Image'];?>" alt="">
                                    </div>
                                    
                                    <div class="product-gallery">
                                        <img src="admin/images/<?php echo $row['Image1'];?>" alt="">
                                        <img src="admin/images/<?php echo $row['Image2'];?>" alt="">
                                        <img src="admin/images/<?php echo $row['Image3'];?>" alt="">
                                        <img src="admin/images/<?php echo $row['Image4'];?>" alt="">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?php echo $row['ProductName'];?></h2>
                                    <div class="product-inner-price">
                                        <ins> Rent Price: ₹<?php echo $row['RentalPrice'];?>/day</del>
                                    </div> 
                                    
                                    <div role="tabpanel">
                                     
                                        <h3 class="add_to_cart_button">Product Description</h3>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                
                                                <p><?php echo $row['ProductDescription'];?>.</p>

                                                <p><strong>Type: </strong><?php echo $row['Type'];?>.</p>
                                                <p><strong>Processor: </strong><?php echo $row['Processor'];?>.</p>
                                                <p><strong>Screen: </strong><?php echo $row['Screen'];?>.</p>
                                                <p><strong>RAM: </strong><?php echo $row['RAM'];?>.</p>



                                                <p><strong>Storage: </strong><?php echo $row['Storage'];?>.</p>
                                                <p><strong>Charges: </strong><?php echo $row['Charges'];?>.</p>
                                                <p><strong>Rental Price: </strong><?php echo $row['RentalPrice'];?> (per day).</p>
                                                <p><strong>Product Model: </strong><?php echo $row['ProductModel'];?>.</p>
                                            </div>
                                           
                                        </div>
                                    </div>

                                    <?php if($_SESSION['ldrmsuid']==""){?>

<?php } else {?>


                                            <a href="book-products.php?bookid=<?php echo $row['ID'];?>" class="add_to_cart_button" style="color:#fff !important">Book Now</a>

                                         <?php }?>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>  <?php } ?>                  
                </div>
            </div>
        </div>
    </div>


    <?php include_once('includes/footer.php');?>
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
  </body>
</html>