<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ldrmsuid']==0)) {
  header('location:logout.php');
  } else{


if(isset($_POST['submit']))
  {
$uid=$_SESSION['ldrmsuid'];
$pid=$_GET['bookid'];
    $todate=$_POST['todate'];
    
{


  
    $query=mysqli_query($con,"update tblbooking set ToDate='$todate' where BookingNumber='$BookingNumber' ");
    if ($query) {
        echo "<script>alert('Date has $BookingNumber been Updated.');</script>";
echo "<script>window.location.href ='index - Copy.php'</script>";
  }
  else
    {
     echo "<script>alert('Something Went Wrong. Please try again.');</script>"; 
    }

  
}
}

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Laptop and Desktop Rental Management System || Book Your Product</title>
    
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
   
    <?php include_once('includes/header - Copy.php');?>
    
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Book Your Laptop or Desktop</h2>
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
                        <!-- <h2 class="sidebar-title">Search Products</h2>
                        <form action="">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="single-product.html">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>                             
                        </div>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                            <li><a href="single-product.html">Sony Smart TV - 2015</a></li>
                        </ul>
                    </div>
                </div> -->
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">


                            <form enctype="multipart/form-data" class="checkout" method="post" >

                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Book Your Laptop or Desktop</h3>
                                          

                                           <!-- <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="">From Date <abbr title="required" class="required">*</abbr>
                                                </label>
                                               <input type="date" name="fromdate" required="true" class="form-control">
                                            </p> -->

                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="">extend to Date <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="date" name="todate" required="true" class="form-control">
                                            </p>
                                           <!-- <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="">Used For<abbr title="required" class="required">*</abbr>
                                                </label>
                                                <select name="usedfor" required="true" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="Individual">Individual</option>
                                                    <option value="Corporate">Corporate</option>
                                                </select>
                                            </p>
                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="">Quantity<abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" name="quantity" required="true" class="form-control">
                                            </p>
                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class=""> Address <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <textarea name="deladdress" required="true"  class="form-control"></textarea>
                                                
                                            </p>
                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class=""> Address Proof<abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="file" name="image" required="true" class="form-control">
                                                
                                            </p> -->
                                        </div>
                                    </div>
                                </div>
                              <div class="form-row place-order">

                                            <button type="submit" name="submit" id="submit"><i class="fa fa-check-square"></i> Submit</button>


                                        </div>
                            </form>

                        </div>                       
                    </div>                    
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
</html><?php } ?>