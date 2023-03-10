<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vrmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {


$type=$_POST['type'];
$brandid=$_POST['brand'];
$proname=$_POST['proname'];
$screen=$_POST['screen'];
$ram=$_POST['ram'];
$storage=$_POST['storage'];
$charges=$_POST['charges'];
$processor=$_POST['processor'];
$renprice=$_POST['renprice'];
$modyrs=$_POST['modyrs'];
$prodesc=$_POST['prodesc'];

//featured Image
$pic=$_FILES["image"]["name"];
$extension = substr($pic,strlen($pic)-4,strlen($pic));
//Product  Image 1
$pic1=$_FILES["image1"]["name"];
$extension1 = substr($pic1,strlen($pic1)-4,strlen($pic1));
//Product  Image 2
$pic2=$_FILES["image2"]["name"];
$extension2 = substr($pic2,strlen($pic2)-4,strlen($pic2));
//Product  Image 3
$pic3=$_FILES["image3"]["name"];
$extension3 = substr($pic3,strlen($pic3)-4,strlen($pic3));
//Product  Image 4
$pic4=$_FILES["image4"]["name"];
$extension4 = substr($pic4,strlen($pic4)-4,strlen($pic4));
//Product  Image 
$pic5=$_FILES["image5"]["name"];
$extension5 = substr($pic5,strlen($pic5)-4,strlen($pic5));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Featured image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension1,$allowed_extensions))
{
echo "<script>alert('Product image 1 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension2,$allowed_extensions))
{
echo "<script>alert('Product image 2 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension3,$allowed_extensions))
{
echo "<script>alert('Product image 3 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension4,$allowed_extensions))
{
echo "<script>alert('Product image 4 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
if(!in_array($extension5,$allowed_extensions))
{
echo "<script>alert('Product image 5 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename product images
$propic=md5($pic).time().$extension;
$propic1=md5($pic1).time().$extension1;
$propic2=md5($pic2).time().$extension2;
$propic3=md5($pic3).time().$extension3;
$propic4=md5($pic4).time().$extension4;
$propic5=md5($pic5).time().$extension5;
     move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$propic);
     move_uploaded_file($_FILES["image1"]["tmp_name"],"images/".$propic1);
     move_uploaded_file($_FILES["image2"]["tmp_name"],"images/".$propic2);
     move_uploaded_file($_FILES["image3"]["tmp_name"],"images/".$propic3);
     move_uploaded_file($_FILES["image4"]["tmp_name"],"images/".$propic4);
     move_uploaded_file($_FILES["image5"]["tmp_name"],"images/".$propic5);

 $query=mysqli_query($con,"insert into tblproduct(Type,BrandID,ProductName,Processor,Screen,RAM,Storage,Charges,RentalPrice,ProductModel,ProductDescription,Image,Image1,Image2,Image3,Image4,Image5) value('$type','$brandid','$proname','$processor','$screen','$ram','$storage','$charges','$renprice','$modyrs','$prodesc','$propic','$propic1','$propic2','$propic3','$propic4','$propic5')");

    if ($query) {
    echo '<script>alert("Product details has been added.")</script>';
echo "<script>window.location.href ='add-products.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laptop and Desktop Rental Management Sysytem | Add Product Details</title>
   

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Common Css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Nav Css -->
    <link rel="stylesheet" href="css/style4.css">
    <!--// Nav Css -->
    <!-- Fontawesome Css -->
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
       <?php include_once('includes/sidebar.php');?>

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
       <?php include_once('includes/header.php');?>
            <!--// top-bar -->

            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center"> Add Product Details</h2>
            <!--// main-heading -->

            <!-- Forms content -->
               <section class="forms-section">

               
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Add Product Details</h4>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Type</label>
                                <select class="form-control"  name="type" id="type" required="true">
                                    <option value=""> Choose Type</option>
                                    <option value="Laptop"> Laptop</option>
                                    <option value="Desktop"> Desktop</option>

                                    </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Brand</label>
                               <select class="form-control" id="brand" name="brand" required="true">
                                <option value="">Choose Brand</option>
                                        <?php $query=mysqli_query($con,"select * from tblbrand");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['ID'];?>"><?php echo $row['BrandName'];?></option>
                  <?php } ?> 
                                    </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Product Name</label>
                                <input type="text" class="form-control" id="proname" name="proname" required="true">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Processor</label>
                               <input type="text" class="form-control" id="processor" name="processor" required="true">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Screen</label>
                                <input type="text" class="form-control" id="screen" name="screen" required="true">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Ram</label>
                               <input type="text" class="form-control" id="ram" name="ram" required="true">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Storage</label>
                                <input type="text" class="form-control" id="storage" name="storage" required="true">
                            </div>
                            <!--<div class="form-group col-md-6">
                                <label for="inputPassword4">Charges</label>
                               <input type="text" class="form-control" id="charges" name="charges" required="true">
                            </div>-->
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Rental Price/Day</label>
                            <input type="text" class="form-control" id="renprice" name="renprice" required="true">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Product Model</label>
                               <input type="text" class="form-control" id="modyrs" name="modyrs" required="true">
                            </div>
                        </div>
                        
                        <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Product Description</label>
                                    <textarea class="form-control" id="prodesc" name="prodesc" rows="3" required="true"></textarea>
                                </div>
                                
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">Image</label>
                                <input type="file" class="form-control" id="image" name="image" required="true">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Image1</label>
                                <input type="file" class="form-control" id="image1" name="image1" required="true">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputZip">Image2</label>
                                <input type="file" class="form-control" id="image2" name="image2" required="true">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">Image3</label>
                                <input type="file" class="form-control" id="image3" name="image3" required="true">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Image4</label>
                                <input type="file" class="form-control" id="image4" name="image4" required="true">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputZip">Image5</label>
                                <input type="file" class="form-control" id="image5" name="image5" required="true">
                            </div>
                        </div>
                       <p style="text-align: center;"><button type="submit" class="btn btn-primary" name="submit">Submit</button></p>
                    </form>
                </div>
                <!--// Forms-3 -->
                <!-- Forms-4 -->
               
            </section>

            <!--// Forms content -->

           <?php include_once('includes/footer.php');?>

        </div>
    </div>


    <!-- Required common Js -->
    <script src='js/jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->

    <!-- Sidebar-nav Js -->
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <!--// Sidebar-nav Js -->

    <!-- Validation Script -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';

            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <!--// Validation Script -->

    <!-- dropdown nav -->
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //dropdown nav -->

    <!-- Js for bootstrap working-->
    <script src="js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->
</body>
</html>
<?php }  ?>