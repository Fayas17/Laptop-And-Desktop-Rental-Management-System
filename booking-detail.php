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
<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
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
                <b>#<?php echo $bid=$_GET['bookingid'];?> Booking Details</b>
                             <div class="row">
 <div class="col-lg-12">
<?php
//Getting Url
$link = "http"; 
$link .= "://"; 
$link .= $_SERVER['HTTP_HOST']; 

// Getting order Details
$userid= $_SESSION['ldrmsuid'];
$ret=mysqli_query($con,"select DateofBooking,Status from tblbooking where UserID='$userid' and BookingNumber='$bid'");
while($result=mysqli_fetch_array($ret)) {
?>

<p style="color:#000"><b>Booking #</b><?php echo $bid?></p>
<p style="color:#000"><b>Booking Date : </b><?php echo $od=$result['DateofBooking'];?></p>
<p style="color:#000"><b>Booking Status :</b> <?php if($result['Status']==""){
    echo "Not Response Yet";
} else {
echo $result['Status'];
}?> &nbsp;
</p>

<?php } ?>
<!-- Invoice -->
<p>
 <a href="javascript:void(0);" onClick="popUpWindow('invoice.php?invid=<?php echo $bid;?>');" title="Booking Invoice" style="color:#000">  <strong style="color:red">Invoice</strong></a></p>


 </div>
 </div>   
                <div class="row" style="margin-top:1%">
 <div class="col-lg-12">

        <?php 
 $query=mysqli_query($con,"select tblbooking.ID as bid,DATEDIFF(tblbooking.ToDate,tblbooking.FromDate) as ddf,tblbooking.UserID,tblbooking.ProductID,tblbooking.BookingNumber,tblbooking.FromDate,tblbooking.ToDate,tblbooking.UsedFor,tblbooking.Quantity,tblbooking.DeliveryAddress,tblbooking.AddressProof,tblbooking.DateofBooking,tblbooking.Status,tblbooking.TotalCost,tblbooking.Remark,tblbooking.RemarkDate,tbluser.FirstName,tbluser.LastName,tbluser.Email,tbluser.MobileNumber,tblproduct.ProductName,tblproduct.Type,tblproduct.BrandID,tblproduct.Processor,tblproduct.Screen,tblproduct.RAM,tblproduct.Storage,tblproduct.Image,tblproduct.Charges,tblproduct.RentalPrice,tblproduct.ProductModel,tblproduct.ProductDescription from  tblbooking join  tbluser on tbluser.ID=tblbooking.UserID join tblproduct on tblproduct.ID=tblbooking.ProductID where tblbooking.UserID='$userid' and tblbooking.BookingNumber='$bid'");
$num=mysqli_num_rows($query);
if($num>0){
    $cnt=1;

?>
<table cellspacing="0" class="shop_table cart">
    <tr>
<th>ID</th>
<th>Booking Number</th>
<th>Booking Date</th>
<th>From  Date</th>
<th>To Date</th>
<th>Product Image</th>  
<th>Product Name</th> 
<th>Quantity</th>    
<th>Rental Price</th>   
<th>Total Price</th>  

</tr>
<?php   
while ($row=mysqli_fetch_array($query)) {
    ?>



<tr>
<td><?php echo $cnt;?></td>
<td><?php echo $row['BookingNumber'];?></td>
<td><?php echo $row['DateofBooking'];?></td>
<td><?php echo $row['FromDate'];?></td>
<td><?php echo $row['ToDate'];?></td>
<td>
<img class="b-goods-f__img img-scale" src="admin/images/<?php echo $row['Image'];?>" alt="<?php echo $row['Image'];?>" width='300' height='250'></td>
<td><?php echo $row['ProductName'];?></td> 
<td><?php echo $qty=$row['Quantity'];?></td> 
<td><?php echo $rpice=$row['RentalPrice'];?>  </td> 
<td>Rs. <?php
$d1=$row['ddf'];;

 echo $total=$d1*$rpice*$qty;?></td>
 <?php 

$cnt=$cnt+1; 
                    }        
 ?> 
</td>
    
</tr>
<?php } ?>

</table>

<!-- <p>

<p style="color:green">

        <a href="extend.php" title="extend" style="color:green"><strong style="color:green">extend</strong> </a>
    </p>

 
    <p style="color:red">
        <a href="my-booking.php" title="Back" style="color:red"><strong style="color:red">Back</strong> </a>
    </p> -->


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