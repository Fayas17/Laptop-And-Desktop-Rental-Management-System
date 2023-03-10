<?php
session_start();
error_reporting(0);
include_once('includes/dbconnection.php');
if (strlen($_SESSION['ldrmsuid']==0)) {
  header('location:logout.php');
  } else{ 

 

    ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Laptop & Desktop Rental Management System-Invoice</title>
</head>
<body>

<div style="margin-left:50px;">

<?php  
$invid=$_GET['invid'];
$query=mysqli_query($con,"select tblbooking.ID as bid,DATEDIFF(tblbooking.ToDate,tblbooking.FromDate) as ddf,tblbooking.UserID,tblbooking.ProductID,tblbooking.BookingNumber,tblbooking.FromDate,tblbooking.ToDate,tblbooking.UsedFor,tblbooking.Quantity,tblbooking.DeliveryAddress,tblbooking.AddressProof,tblbooking.DateofBooking,tblbooking.Status,tblbooking.TotalCost,tblbooking.Remark,tblbooking.RemarkDate,tbluser.FirstName,tbluser.LastName,tbluser.Email,tbluser.MobileNumber,tblproduct.ProductName,tblproduct.Type,tblproduct.BrandID,tblproduct.Processor,tblproduct.Screen,tblproduct.RAM,tblproduct.Storage,tblproduct.Image,tblproduct.Charges,tblproduct.RentalPrice,tblproduct.ProductModel,tblproduct.ProductDescription from  tblbooking join  tbluser on tbluser.ID=tblbooking.UserID join tblproduct on tblproduct.ID=tblbooking.ProductID where tblbooking.BookingNumber=$invid");
$num=mysqli_num_rows($query);
$cnt=1;
?>

<table border="1"  cellpadding="10" style="border-collapse: collapse; border-spacing:0; width: 100%; text-align: center;">
  <tr align="center">
   <th colspan="8" >Invoice of #<?php echo  $invid;?></th> 
  </tr>
  <?php  
while ($row=mysqli_fetch_array($query)) {
  ?>
  <tr>
    <th colspan="3">Booking Date :</th>
<td colspan="5">  </b> <?php echo $row['DateofBooking'];?></td>
  </tr>
  
<th>#</th>
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

</table>
     
     <p >
      <input name="Submit2" type="submit" class="txtbox4" value="Close" onClick="return f2();" style="cursor: pointer;"  />   <input name="Submit2" type="submit" class="txtbox4" value="Print" onClick="return f3();" style="cursor: pointer;"  /></p>
</div>

</body>
</html>

  <?php } ?>   