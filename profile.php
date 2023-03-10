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
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    

    $query=mysqli_query($con, "update tbluser set FirstName='$fname',LastName='$lname' where ID='$uid'");


    if ($query) {
    
    echo '<script>alert("Your profile has been updated.")</script>';
  }
  else
    {
      
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }

}

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Laptop and Desktop Rental Management System || Profile</title>
    
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
                <div class="col-md-5">
                    <div class="product-bit-title text-center">
                        <h2>Profile</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="single-sidebar">
                       <!-- <h2 class="sidebar-title">Search Products</h2>
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
                </div> -->
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">


                            <form enctype="multipart/form-data" action="#" class="checkout" method="post" >
                                 <?php
$uid=$_SESSION['ldrmsuid'];
$ret=mysqli_query($con,"select * from  tbluser where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Profile</h3>
                                          

                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="">First Name
                                                </label>
                                               
                                               <input type="text" value="<?php  echo $row['FirstName'];?>" id="fname" name="fname" required="true" class="input-text">
                                            </p>
                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="">Last Name
                                                </label>
                                               
                                               <input type="text" value="<?php  echo $row['LastName'];?>" id="lname" name="lname" required="true" class="input-text">
                                            </p>
                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="">Email
                                                </label>
                                               
                                               <input type="email" value="<?php  echo $row['Email'];?>" id="email" name="email" readonly="true" class="form-control">
                                            </p>

                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="">Mobile Number 
                                                </label>
                                                <input  type="text" value="<?php  echo $row['MobileNumber'];?>" id="mobilenumber" name="mobilenumber" readonly="true" class="form-control">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                              <div class="form-row place-order">

                                            <button type="submit" name="submit"><i class="fa fa-check-square"></i> Update</button>


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
</html><?php }  ?>