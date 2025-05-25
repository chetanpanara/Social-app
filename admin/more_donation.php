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






$id1=$_GET['moreid'];
$result1 = $obj->query("select * from donation where d_id='$id1'");

$row1 = $result1->fetch_object();



?>
<!DOCTYPE HTML>
<html>
<head>
<title>Donation details</title>
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

<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">


</head>
<body class="cbp-spmenu-push">
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
	
		<?php include 'common/sidebar.php' ?>
	</div>

		<?php include 'common/header.php' ?>

		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<h2 class="title1">Donation's</h2>
					<div class="panel-body widget-shadow">
						<h4>Donation details</h4>
						<table class="table" align="center">
							<thead>
								<tr>
								  <td>D_id</td>
								  <td><?php echo $row1->d_id; ?></td>

								</tr>
								<tr>
								  <td>Title</td>
								  <td><?php echo $row1->title; ?></td>

								</tr>
								<tr>
								  <td>description</td>
								  <td><?php echo $row1->description; ?></td>

								</tr>
								<tr>
									<td>Categroy Id</td>
									<td><?php echo $row1->cat_id; ?></td>
								</tr>
								<tr>
									<td>Date</td>
									<td><?php echo $row1->donation_date; ?></td>
								</tr>
									<tr>
									<td>Donation Amount</td>
									<td><?php echo $row1->d_amount; ?></td>
								</tr>
								<tr>
									<td>Address</td>
									<td><?php echo $row1->address; ?></td>
								</tr>
								<tr>
									<td>City Id</td>
									<td><?php echo $row1->city_id; ?></td>
								</tr>
								<tr>
									<td>Area Id</td>
									<td><?php echo $row1->area_id; ?></td>
								</tr>
								<tr>
									<td>status</td>
									<td><?php echo $row1->status; ?></td>
								</tr>
								<tr>
									<td>User Id</td>
									<td><?php echo $row1->user_id; ?></td>
								</tr>
								<tr>
									<td>Contact_name</td>
									<td><?php echo $row1->contact_name; ?></td>
								</tr>
								<tr>
									<td>Contact_number</td>
									<td><?php echo $row1->contact_number; ?></td>
								</tr>
							
							</thead>

						</table>
					</div>

				</div>
			</div>
		</div>

		<?php include 'common/footr.php' ?>
     
	</div>


	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;

			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>

	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	
   <script src="js/bootstrap.js"> </script>

</body>
</html>
