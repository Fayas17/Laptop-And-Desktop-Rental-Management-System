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
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbluser where ID='$uid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tbluser set Password='$newpassword' where ID='$uid'");

echo '<script>alert("Your password successully changed.")</script>';
} else {

echo '<script>alert("Your current password is wrong.")</script>';
}



}

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Laptop and Desktop Rental Management System || Change Password</title>
    
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
<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
  </head>
  <body>
   
    <?php include_once('includes/header - Copy.php');?>
    
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Change Password</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
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
                    <div class="product-content-right">
                        <div class="woocommerce">


                            <form name="changepassword" onsubmit="return checkpass();" action="#" class="checkout" method="post" >
                                 

                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Change Password</h3>
                                          

                                          <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="">Current Password
                                                </label>
                                               
                                               <input type="password" name="currentpassword" id="currentpassword"  required='true' placeholder="Current Password" class="form-control">
                                            </p>
                                       
                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="">New Password
                                                </label>
                                               
                                              <input type="password" name="newpassword" id="newpassword" required='true' placeholder="New Password" class="form-control">
                                            </p>

                                           <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="">Confirm Password
                                                </label>
                                               
                                               <input type="password" name="confirmpassword" id="confirmpassword" value="" required='true' placeholder="Confirm Password" class="form-control">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
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