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




$id=$_GET['moreid'];
$result1 = $obj->query("select * from event where e_id='$id'");

$row1 = $result1->fetch_object();




?>
<!DOCTYPE HTML>
<html>
<head>
<title>event details</title>
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
					<h2 class="title1">Tables</h2>
					<div class="panel-body widget-shadow">
						<h4>event details</h4>
						<table class="table" align="center">
							<thead>
								<tr>
								  <td>Id</td>
								  <td><?php echo $row1->e_id; ?></td>
								</tr>
								<tr>
								  <td>Title</td>
								  <td><?php echo $row1->title; ?></td>
								</tr>
								<tr>
								  <td>escription</td>
								  <td><?php echo $row1->description; ?></td>
								</tr>
								<tr>
									<td>Date</td>
									<td><?php echo $row1->date; ?></td>
								</tr>
								<tr>
									<td>User</td>
									<td>
										<?php
											$userNameQuery = $obj->query("SELECT name FROM user WHERE user_id = '$row1->user_id'");
											$userName = $userNameQuery->fetch_object();
											echo $userName->name;
										?>
									</td>
								</tr>
								<tr>
									<td>Total Donation</td>
									<td>
										<?php
										$donation_query = $obj->query("SELECT SUM(amount) as total_donations FROM money_donation WHERE event_id = '$row1->e_id'");
										$donation_row = $donation_query->fetch_object();
										echo $donation_row->total_donations ? $donation_row->total_donations : 0;
										?>
									</td>
								</tr>
								<tr>
									<td>Status</td>
									<td><?php echo $row1->status; ?></td>
								</tr>
								<tr>
									<td>Event Type</td>
									<td><?php echo $row1->event_type; ?></td>
								</tr>
								<?php if($row1->status == 'pending'){  ?>
								<tr>
                                    <th scope="row"><a href="reject.php?delid=<?php echo $row1->e_id;?>"><button class="btn btn-danger">Reject</button></a></th>
								    <th scope="row"><a href="accept.php?eid=<?php echo $row1->e_id;?>"><button class="btn btn-default">Accept</button></a></th>
								</tr>
								<?php }?>
                                <tr>
                                    <td>Donors</td>
                                    <td>
                                        <table>
                                            <?php
                                            $donars_query = $obj->query("SELECT user_id, amount FROM money_donation WHERE event_id = '$row1->e_id'");
                                            if ($donars_query->num_rows > 0) {
                                                while ($donar_row = $donars_query->fetch_object()) {
                                                    $user_query = $obj->query("SELECT name FROM user WHERE user_id = '$donar_row->user_id'");
                                                    $user = $user_query->fetch_object();
                                                    echo '<tr>';
                                                    echo '<td>' . htmlspecialchars($user->name) . ' = ' . htmlspecialchars($donar_row->amount) . '</td>';
                                                    echo '</tr>';
                                                }
                                            } else {
                                                echo '<tr><td>No donors for this event.</td></tr>';
                                            }
                                            ?>
                                        </table>
                                    </td>
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
