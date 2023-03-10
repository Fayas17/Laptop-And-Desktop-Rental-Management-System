<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['vrmsaid']==0)) {
  header('location:logout.php');
  } else{ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laptop and Desktop Rental Management Sysytem | Dashboard</title>
    
    
    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Bars Css -->
    <link rel="stylesheet" href="css/bar.css">
    <!--// Bars Css -->
    <!-- Calender Css -->
    <link rel="stylesheet" type="text/css" href="css/pignose.calender.css" />
    <!--// Calender Css -->
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
    <div class="se-pre-con"></div>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <?php include_once('includes/sidebar.php');?>

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
            <?php include_once('includes/header.php');?>
            <!--// top-bar -->
            <div class="container-fluid">
                <div class="row">
                    <!-- Stats -->

                    <div class="outer-w3-agile col-xl">
                        <h5 style="padding-bottom: 10px">Dashboard</h5>
                        <div class="stat-grid p-3 d-flex 
                        align-items-center justify-content-between bg-primary">
                        <?php $query1=mysqli_query($con,"Select * from tblproduct");
$totalpro=mysqli_num_rows($query1);
?>
                            <div class="s-l">
                                <h5>Total Product</h5>
                                <a class="text-muted text-uppercase m-b-20" href="manage-products.php" style="font-size: 20px"><h6 style="color: black;padding-top: 10px">View</h6></a>
                            </div>
                            <div class="s-r">
                                <h6><?php echo $totalpro;?>
                                    <i class="far fa-edit"></i>
                                </h6>
                            </div>
                        </div>
                        <div class="stat-grid p-3 mt-3 d-flex align-items-left justify-content-between bg-success">
                            <?php $query2=mysqli_query($con,"Select * from tblbooking where Status is null");
$newbooking=mysqli_num_rows($query2);
?>
                            <div class="s-l">
                                <h5>New Booking</h5>
                                <a class="text-muted text-uppercase m-b-20" href="new-booking.php" style="font-size: 20px"><h6 style="color: black;padding-top: 10px">View</h6></a>
                            </div>
                            <div class="s-r">
                                <h6><?php echo $newbooking;?>
                                    <i class="far fa-smile"></i>
                                </h6>
                            </div>
                        </div>
                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-danger">
                            <?php $query3=mysqli_query($con,"Select * from tblbooking where Status='Approved'");
$apprbooking=mysqli_num_rows($query3);
?>
                            <div class="s-l">
                                <h5>Approved Booking</h5>
                                <a class="text-muted text-uppercase m-b-20" href="approved-booking.php" style="font-size: 20px"><h6 style="color: black;padding-top: 10px">View</h6></a>
                            </div>
                            <div class="s-r">
                                <h6><?php echo $apprbooking;?>
                                    <i class="fas fa-tasks"></i>
                                </h6>
                            </div>
                        </div>

                        <div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-warning">
                            <?php $query4=mysqli_query($con,"Select * from tblbooking where Status='Unapproved'");
$unapprbooking=mysqli_num_rows($query4);
?>
                            <div class="s-l">
                                <h5>Rejected Booking</h5>
                                <a class="text-muted text-uppercase m-b-20" href="unapproved-booking.php" style="font-size: 20px"><h6 style="color: black;padding-top: 10px">View</h6></a>
                            </div>
                            <div class="s-r">
                                <h6><?php echo $unapprbooking;?>
                                    <i class="fas fa-users"></i>
                                </h6>
                            </div>
                        </div>
<div class="stat-grid p-3 mt-3 d-flex align-items-center justify-content-between bg-primary">
                        <?php $query5=mysqli_query($con,"Select * from tblbooking");
$totalbooking=mysqli_num_rows($query5);
?>
                            <div class="s-l">
                                <h5>Total Booking</h5>
                                <a class="text-muted text-uppercase m-b-20" href="all-booking.php" style="font-size: 20px"><h6 style="color: black;padding-top: 10px">View</h6></a>
                            </div>

                            <div class="s-r">
                                <h6><?php echo $totalbooking;?>
                                    <i class="far fa-edit"></i>
                                </h6>
                            </div>
                        </div>
                        <div class="stat-grid p-3 mt-3 d-flex align-items-left justify-content-between bg-success">
                            <?php $query2=mysqli_query($con,"Select * from tblbrand");
$totbrand=mysqli_num_rows($query2);
?>
                            <div class="s-l">
                                <h5>Total Brand</h5>
                                <a class="text-muted text-uppercase m-b-20" href="manage-brand.php" style="font-size: 20px"><h6 style="color: black;padding-top: 10px">View</h6></a>
                            </div>
                            <div class="s-r">
                                <h6><?php echo $totbrand;?>
                                    <i class="far fa-smile"></i>
                                </h6>
                            </div>
                        </div>
                    </div>

                    <!--// Stats -->
                
                </div>
            </div>


            
            <?php include_once('includes/footer.php');?>
            
        </div>
    </div>


    <!-- Required common Js -->
    <script src='js/jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->
    
    <!-- loading-gif Js -->
    <script src="js/modernizr.js"></script>
    <script>
        //paste this code under head tag or in a seperate js file.
        // Wait for window load
        $(window).load(function () {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
    <!--// loading-gif Js -->

    <!-- Sidebar-nav Js -->
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <!--// Sidebar-nav Js -->

    <!-- Graph -->
    <script src="js/SimpleChart.js"></script>

    <!--// Graph -->
    <!-- Bar-chart -->
    <script src="js/rumcaJS.js"></script>
    <script src="js/example.js"></script>
    <!--// Bar-chart -->
    <!-- Calender -->
    <script src="js/moment.min.js"></script>
    <script src="js/pignose.calender.js"></script>
    <script>
        //<![CDATA[
        $(function () {
            $('.calender').pignoseCalender({
                select: function (date, obj) {
                    obj.calender.parent().next().show().text('You selected ' +
                        (date[0] === null ? 'null' : date[0].format('YYYY-MM-DD')) +
                        '.');
                }
            });

            $('.multi-select-calender').pignoseCalender({
                multiple: true,
                select: function (date, obj) {
                    obj.calender.parent().next().show().text('You selected ' +
                        (date[0] === null ? 'null' : date[0].format('YYYY-MM-DD')) +
                        '~' +
                        (date[1] === null ? 'null' : date[1].format('YYYY-MM-DD')) +
                        '.');
                }
            });
        });
        //]]>
    </script>
    <!--// Calender -->

    <!-- profile-widget-dropdown js-->
    <script src="js/script.js"></script>
    <!--// profile-widget-dropdown js-->

    <!-- Count-down -->
    <script src="js/simplyCountdown.js"></script>
    <link href="css/simplyCountdown.css" rel='stylesheet' type='text/css' />
    <script>
        var d = new Date();
        simplyCountdown('simply-countdown-custom', {
            year: d.getFullYear(),
            month: d.getMonth() + 2,
            day: 25
        });
    </script>
    <!--// Count-down -->

    <!-- pie-chart -->
    <script src='js/amcharts.js'></script>
    <script>
        var chart;
        var legend;

        var chartData = [{
                country: "Lithuania",
                value: 260
            },
            {
                country: "Ireland",
                value: 201
            },
            {
                country: "Germany",
                value: 65
            },
            {
                country: "Australia",
                value: 39
            },
            {
                country: "UK",
                value: 19
            },
            {
                country: "Latvia",
                value: 10
            }
        ];

        AmCharts.ready(function () {
            // PIE CHART
            chart = new AmCharts.AmPieChart();
            chart.dataProvider = chartData;
            chart.titleField = "country";
            chart.valueField = "value";
            chart.outlineColor = "";
            chart.outlineAlpha = 0.8;
            chart.outlineThickness = 2;
            // this makes the chart 3D
            chart.depth3D = 20;
            chart.angle = 30;

            // WRITE
            chart.write("chartdiv");
        });
    </script>
    <!--// pie-chart -->

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
<?php } ?>