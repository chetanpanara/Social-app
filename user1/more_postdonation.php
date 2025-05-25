<?php

session_start();

include 'common/connect.php';


if (!isset($_SESSION['volunteer_id'])) {
	header('location:home.php');
}

$city = $obj->query("select donation.d_id,donation.title,donation.description,donation.address,donation.city_id,city.city_name from donation inner join city on donation.city_id = city.city_id");
$v_city = $city->fetch_object();

$area = $obj->query("select donation.d_id,donation.title,donation.description,donation.address,donation.area_id,.area.area_name from donation inner join area on donation.area_id = area.area_id");
$v_area = $area->fetch_object();


$user_id = $_SESSION['volunteer_id'];
$volunteer_data = $obj->query("select * from user where user_id='$user_id'");
$vol = $volunteer_data->fetch_object();
$v_city_id = $vol->city_id;
$v_area_id = $vol->area_id;



$id = $_GET['moreid'];
$result1 = $obj->query("select * from donation where d_id='$id'");
$row1 = $result1->fetch_object();
?>

<!doctype html>
<html lang="zxx">


<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Social app</title>

	<link rel="stylesheet" href="assets/css/style-starter.css">

	<link href="//fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700&display=swap" rel="stylesheet">

</head>

<body>



	<?php include 'common/header.php'; ?>
	
	<div class="inner-banner">
	</div>

	<section class="w3l-contact-11">
		<div class="form-41-mian py-5">
			<div class="container py-lg-4">
				<div class="row align-form-map">

					<div class="col-lg-12 form-inner-cont">
						<div class="title-content text-left">
							<h3 class="hny-title mb-lg-5 mb-4">Your Donation Post</h3>
						</div>
						<table class="table" align="center">
							<thead>
								<tr>
									<td>D_Id</td>
									<td><?php echo $row1->d_id; ?></td>

								</tr>
								<tr>
									<td>Title</td>
									<td><?php echo $row1->title; ?></td>

								</tr>
								<tr>
									<td>Description</td>
									<td><?php echo $row1->description; ?></td>

								</tr>
								<!--	<tr>
									<td>Cat_Id</td>
									<td><?php echo $row1->cat_id; ?></td>
								</tr> -->
								<tr>
									<td>Date</td>
									<td><?php echo $row1->date; ?></td>
								</tr>
								<tr>
									<td>Address</td>
									<td><?php echo $row1->address; ?></td>
								</tr>
								<tr>
									<td>City name</td>
									<td><?php echo $v_city->city_name; ?></td>
								</tr>
								<tr>
									<td>Area name</td>
									<td><?php echo $v_area->area_name; ?></td>
								</tr>
								<tr>
									<td>Status</td>
									<td><?php echo $row1->status; ?></td>
								</tr>
								<!--	<tr>
									<td>User_id</td>
									<td><?php echo $row1->user_id; ?></td>
								</tr> -->
								<tr>
									<td>Contact_name</td>
									<td><?php echo $row1->contact_name; ?></td>
								</tr>
								<tr>
									<td>Contact_number</td>
									<td><?php echo $row1->contact_number; ?></td>
								</tr>
								<tr>
									<td>From Time</td>
									<td><?php echo $row1->fromtime; ?></td>
								</tr>
								<tr>
									<td>To Time</td>
									<td><?php echo $row1->totime; ?></td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<a href="accept.php?delid=<?php echo $row1->d_id; ?>"><button class="btn btn-success">Accept</button></a>
									</td>

								</tr>
							</thead>

						</table>
					</div>
				</div>
			</div>
		</div>

	</section>


	<?php include 'common/footer.php'; ?>
	
</body>

</html>

<script src="assets/js/jquery-3.3.1.min.js"></script>

<script>
	$(function() {
		$('.navbar-toggler').click(function() {
			$('body').toggleClass('noscroll');
		})
	});
</script>

<script>
	$(window).on("scroll", function() {
		var scroll = $(window).scrollTop();

		if (scroll >= 80) {
			$("#site-header").addClass("nav-fixed");
		} else {
			$("#site-header").removeClass("nav-fixed");
		}
	});

	$(".navbar-toggler").on("click", function() {
		$("header").toggleClass("active");
	});
	$(document).on("ready", function() {
		if ($(window).width() > 991) {
			$("header").removeClass("active");
		}
		$(window).on("resize", function() {
			if ($(window).width() > 991) {
				$("header").removeClass("active");
			}
		});
	});
</script>

<script src="assets/js/bootstrap.min.js"></script>