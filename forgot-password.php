<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
{
$username=$_POST['email'];
$cnumber=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
$ret=mysqli_query($con,"SELECT id FROM tbluser WHERE Email='$username' and MobileNumber='$cnumber'");
$num=mysqli_num_rows($ret);
if($num>0)
{
$query=mysqli_query($con,"update tbluser set Password='$newpassword' WHERE Email='$username' and MobileNumber='$cnumber'");

echo "<script>alert('Password reset successfully.');</script>";
echo "<script type='text/javascript'> document.location ='login.php'; </script>";
}else{
echo "<script>alert('Invalid Email or Reg Contact Number');</script>";
echo "<script type='text/javascript'> document.location ='password-recovery.php'; </script>";
}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Laptop and Desktop Rental Management System || Password Recovery</title>
    
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
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
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
                        <h2>Forgot Password</h2>
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
                       <form action="search-result.php" method="post" >
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


                            <form method="post" name="chngpwd" onSubmit="return valid();">

                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Forgot Password</h3>
                                          

                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="">Email <abbr title="required" class="required">*</abbr>
                                                </label>
                                               
                                               <input type="email" class="form-control" required="true" name="email">
                                            </p>

                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="">Mobile Number <abbr title="required" class="required">*</abbr>
                                                </label>
                                                
                                                <input type="text" class="input-text"  name="mobile" required="true" maxlength="10" pattern="[0-9]+">
                                            </p>
                                            

                                             <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="">New Password <abbr title="required" class="required">*</abbr>
                                                </label>
                                                
                                                <input class="form-control" type="password" name="newpassword" required="true"/>
                                            </p>

                                             <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="">Confirm Password <abbr title="required" class="required">*</abbr>
                                                </label>
                                                
                                                <input class="form-control" type="password" name="confirmpassword" required="true"/>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                              <div class="form-row place-order">

                                            <button type="submit" name="submit"><i class="fa fa-check-square"></i> Reset</button>
<a href="login.php" class="pull-right" style="font-size:15px">Signin</a>

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
</html>