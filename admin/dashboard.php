<?php

session_start();



include 'common/connect.php';

if(!isset($_SESSION['admin_id']))
{
    header('location:index.php');
}

$id = $_SESSION['admin_id'];
$result = $obj->query("select * from user where user_id='$id'");
$row = $result->fetch_object();


$result = $obj->query("SELECT * from user where role_id=2");
$row = mysqli_num_rows($result);

$result1 = $obj->query("SELECT * from user WHERE role_id=3");
$row1 = mysqli_num_rows($result1);

$result2 = $obj->query("SELECT * from event WHERE STATUS='complete'");
$allEvents = $obj->query("SELECT * from event");


$row2 = mysqli_num_rows($allEvents);



$sql = $obj->query("SELECT SUM(d_amount) FROM donation WHERE  STATUS='success'");

while ($row4 = mysqli_fetch_array($sql)) {

    $sum1 = $row4['SUM(d_amount)'];
}

$sql = $obj->query("SELECT SUM(amount) FROM money_donation");
while ($row4 = mysqli_fetch_array($sql)) {
 
    $sum = $row4['SUM(amount)'];
}



?>

<!DOCTYPE HTML>
<html>
<head>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>


<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />


<link href="css/style.css" rel='stylesheet' type='text/css' />


<link href="css/font-awesome.css" rel="stylesheet"> 

<link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>


<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">

<script src="js/Chart.js"></script>

<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">

<style>
#chartdiv {
  width: 100%;
  height: 295px;
}
</style>

<script src="js/pie-chart.js" type="text/javascript"></script>
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#2dde98',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#8e43e7',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ffc168',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });

    </script>

					<link href="css/owl.carousel.css" rel="stylesheet">
					<script src="js/owl.carousel.js"></script>
						<script>
							$(document).ready(function() {
								$("#owl-demo").owlCarousel({
									items : 3,
									lazyLoad : true,
									autoPlay : true,
									pagination : true,
									nav:true,
								});
							});
						</script>
				
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
	
		<?php include 'common/sidebar.php'; ?>
	</div>
		
		<?php include 'common/header.php'; ?>

		<div id="page-wrapper">
			<div class="main-page">
			<div class="col_3">
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-money icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $sum; ?></strong></h5>
                      <span> Money Donation</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-calendar user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $row2; ?></strong></h5>
                      <span>Total Events</span>
                    </div>
                </div>
        	</div>
        	<!-- <div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-users user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $row1; ?></strong></h5>
                      <span>Total  Volunteer</span>
                    </div>
                </div>
        	</div> -->
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $sum1; ?></strong></h5>
                      <span>Total  Donations</span>
                    </div>
                </div>
        	 </div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo($row) ?></strong></h5>
                      <span>Total Users</span>
                    </div>
                </div>
        	 </div>
        	<div class="clearfix"> </div>
		</div>
		
		
				
	

			<script src="js/amcharts.js"></script>
			<script src="js/serial.js"></script>
			<script src="js/export.min.js"></script>
			<link rel="stylesheet" href="css/export.css" type="text/css" media="all" />
			<script src="js/light.js"></script>


    <script  src="js/index1.js"></script>
	
		
		
		
				
			</div>
		</div>
	
	<?php include 'common/footr.php'; ?>
    
	</div>
		
	
   <script src="js/bootstrap.js"> </script>
	
	
</body>
</html>