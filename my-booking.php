<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ldrmsuid']==0)) {
  header('location:logout.php');
  } else{




 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Laptop and Desktop Rental Management System || My Booking</title>
    
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
                        <h2>My Booking</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                               
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">


                            <table cellspacing="0" class="shop_table cart">
    <tr>
<th>ID</th>
<th>Booked By</th>
<th>Booking Number</th>
<th>Product Name</th>  
<th>Booking Date</th>
<th>Booking Status</th>
<th>View Details</th>
</tr>
        <?php 
                    $userid= $_SESSION['ldrmsuid'];
 $query=mysqli_query($con,"select tblbooking.ID as bid,tblbooking.UserID,tblbooking.ProductID,tblbooking.BookingNumber,tblbooking.FromDate,tblbooking.ToDate,tblbooking.UsedFor,tblbooking.Quantity,tblbooking.DeliveryAddress,tblbooking.AddressProof,tblbooking.DateofBooking,tblbooking.Status,tbluser.FirstName,tbluser.LastName,tbluser.Email,tbluser.MobileNumber,tblproduct.ProductName from  tblbooking join  tbluser on tbluser.ID=tblbooking.UserID join tblproduct on tblproduct.ID=tblbooking.ProductID  where tblbooking.UserID='$userid'");
$cnt=1;
              while($row=mysqli_fetch_array($query))
              { ?>

<tr>
    <td><?php echo $cnt;?></td>
<td><?php echo $row['FirstName'];?> <?php echo $row['LastName'];?></td>
<td><?php echo $row['BookingNumber']?></td>
<td><?php echo $row['ProductName']?></td>
<td><?php echo $row['DateofBooking']?></td>
<td><?php $status=$row['Status'];
if($status==''){
 echo "Waiting for confirmation";   
} else{
echo $status;
}

?>  
<td><a href="booking-detail.php?bookingid=<?php echo $row['BookingNumber'];?>" class="btn theme-btn-dash">View Details</a></td>       
</tr>
<?php $cnt=$cnt+1; } ?>
</table>

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