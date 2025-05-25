<?php
session_start();
include 'common/connect.php';


$result = $obj->query("SELECT * from user where role_id=2");
$row = mysqli_num_rows($result);

$result1 = $obj->query("SELECT * from user WHERE role_id=3");
$row1 = mysqli_num_rows($result1);

$result2 = $obj->query("SELECT * from event WHERE STATUS='accept'");
$events = $obj->query("SELECT * from event");

$row2 = mysqli_num_rows($result2);

$sql = $obj->query("SELECT SUM(d_amount) FROM donation WHERE  STATUS='success'");

while ($row4 = mysqli_fetch_array($sql)) {

	$sum1 = $row4['SUM(d_amount)'];
}
$sql = $obj->query("SELECT SUM(amount) FROM money_donation");
while ($row4 = mysqli_fetch_array($sql)) {

	$sum = $row4['SUM(amount)'];
}
?>
<!doctype html>
<html lang="zxx">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Social App
	</title>

	<link rel="stylesheet" href="assets/css/style-starter.css">

	<link href="//fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700&display=swap" rel="stylesheet">

</head>

<body>


	<?php include 'common/header.php' ?>


	<section class="w3l-main-slider position-relative" id="home">
		<div class="companies20-content">
			<div class="owl-one owl-carousel owl-theme">
				<div class="item">
					<li>
						<div class="slider-info banner-view bg bg2">
							<div class="banner-info">
								<div class="container">
									<div class="banner-info-bg">
										<h5>Actions speak louder than words! Give today.</h5>
										<div class="banner-buttons">

											<h6 style="color:#ff0000;">How We Works</h6>
											<a href="#small-dialog" class="popup-with-zoom-anim play-view">
												<span class="video-play-icon">
													<span class="fa fa-play"></span>
												</span>

											</a>

											<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
												<iframe src="https://player.vimeo.com/video/164890650"
													allow="autoplay; fullscreen" allowfullscreen=""></iframe>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
				</div>
				<div class="item">
					<li>
						<div class="slider-info  banner-view banner-top1 bg bg2">
							<div class="banner-info">
								<div class="container">
									<div class="banner-info-bg">
										<h5>Creative a Better Future through your Help</h5>
										<div class="banner-buttons">

											<h6 style="color:DodgerBlue;">How We Works</h6>

											<a href="#small-dialog" class="popup-with-zoom-anim play-view">
												<span class="video-play-icon">
													<span class="fa fa-play"></span>
												</span>

											</a>

											<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
												<iframe src="https://player.vimeo.com/video/164890650"
													allow="autoplay; fullscreen" allowfullscreen=""></iframe>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
				</div>
				<div class="item">
					<li>
						<div class="slider-info banner-view banner-top2 bg bg2">
							<div class="banner-info">
								<div class="container">
									<div class="banner-info-bg">
										<h5>Actions speak louder than words! Give today.</h5>
										<div class="banner-buttons">

											<h6 style="color:DodgerBlue;">How We Works</h6>
											<a href="#small-dialog1" class="popup-with-zoom-anim play-view">
												<span class="video-play-icon">
													<span class="fa fa-play"></span>
												</span>

											</a>

											<div id="small-dialog1" class="zoom-anim-dialog mfp-hide">
												<iframe src="https://player.vimeo.com/video/164890650"
													allow="autoplay; fullscreen" allowfullscreen=""></iframe>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
				</div>
				<div class="item">
					<li>
						<div class="slider-info banner-view banner-top3 bg bg2">
							<div class="banner-info">
								<div class="container">
									<div class="banner-info-bg">
										<h5>Creative a Better Future through your Help</h5>
										<div class="banner-buttons">

											<h6 style="color:DodgerBlue;">How We Works</h6>

											<a href="#small-dialog2" class="popup-with-zoom-anim play-view">
												<span class="video-play-icon">
													<span class="fa fa-play"></span>
												</span>


											</a>

											<div id="small-dialog2" class="zoom-anim-dialog mfp-hide">
												<iframe src="https://player.vimeo.com/video/164890650"
													allow="autoplay; fullscreen" allowfullscreen=""></iframe>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
				</div>
			</div>
		</div>
	</section>




	<section>
		<div class="container ">
			<div class="row mt-5">
				<div class="content-info-in row mb-5">
					<div class="col-lg-6">
						<img src="assets/images/ab1.jpg" alt="" class="img-fluid">
					</div>
					<div class="col-lg-6 mt-lg-0 mt-5 about-right-faq align-self  pl-lg-4">
						<div class="title-content text-left mb-2">
							<h6 class="sub-title">About Us</h6>
							<h3 class="hny-title"> We Have Years Of Experiences Give You Better Results.</h3>
						</div>
						<p class="mt-3"> Social App (For community Donataions) is a non-profit organization, which aims at the promotion of human rights, social inclusion through education, training and entrepreneurship, and community level development. The organization delivers education and training in a wide range of subjects aiming at up skilling, diffusion of democratic ideas and empowerment and inclusion of vulnerable groups. It implements awareness raising campaigns and develops national, and international projects in the fields of education and training, social inclusion and human rights, active citizenship, youth, and environment.</p>
						<a href="about.php" class="btn btn-style btn-primary mt-2">Read More</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="w3l-bottom-grids mt-4">
			<div class="container-fluid px-0">
				<div class="bottomhny-grids-sec">
					<div class="bottomhny-1 ">
						<div class="bottomhny-gd-ingf ">
							<h4>Charity is a simple method to prove kindness</h4>
						</div>
					</div>
					<div class="bottomhny-1 bottomhny-2 ">
						<div class="bottomhny-gd-ingf">
							<h4>By giving a little, you will help out a lot.</h4>
						</div>
					</div>
					<div class="bottomhny-1 bottomhny-1-img">
						<div class="bottomhny-gd-ingf">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="features-4">
		<div class="features4-block py-5">
			<div class="container py-lg-4">

				<div class="title-content text-center mb-lg-5 mt-4">
					<h6 class="sub-title">Why Choose Us</h6>
					<h3 class="hny-title">How Can Help?</h3>
					<p class="fea-para">Adding a charitable donation in your will</p>
				</div>
				<div class="row features4-grids text-left mt-lg-6">
					<div class="col-lg-4 col-md-6 features4-grid mt-4">
						<div class="features4-grid-inn">
							<div class="img-featured">
								<div class="ch-item ch-img-1">
									<div class="ch-info-wrap">
										<div class="ch-info">
											<div class="ch-info-front ch-img-1"></div>
											<div class="ch-info-back">
												<h4>Donate</h4>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="features4-rightinfo">
								<h5><a href="#URL">Give Donation</a></h5>
								<p>Help others and be happy ,and god will do the rest,and play your role in the constructive cause.</p>

							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 features4-grid mt-4">
						<div class="features4-grid-inn">
							<div class="img-featured">
								<div class="ch-item ch-img-2">
									<div class="ch-info-wrap">
										<div class="ch-info">
											<div class="ch-info-front ch-img-2"></div>
											<div class="ch-info-back">
												<h4>Team</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="features4-rightinfo">
								<h5><a href="register.php">
										Become A Team</a></h5>
								<p>Discover why some of the richest people in the world are not millionaires, they are team, do Small Things With Great Love,volunteering is a Work of Heart</p>

							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 features4-grid mt-4">
						<div class="features4-grid-inn">
							<div class="img-featured">
								<div class="ch-item ch-img-3">
									<div class="ch-info-wrap">
										<div class="ch-info">
											<div class="ch-info-front ch-img-3"></div>
											<div class="ch-info-back">
												<h4>Donate</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="features4-rightinfo">
								<h5><a href="#URL">
										Give Food and clothe donations..</a></h5>
								<p>Even the smallest of contributions are used to build a better future for tomorrow.</p>

							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		</div>
	</section>

	<section class="w3l-specification-6">
		<div class="specification-6-mian py-5">
			<div class="container py-lg-5">
				<div class="row story-6-grids">
					<div class="col-lg-10 story-gd pl-lg-4  text-center mx-auto">
						<div class="title-content px-lg-5">
							<h6 class="sub-title" style="color:#FF4500 ">Our Organization</h6>
							<h3 class="hny-title two">Want to get involved?</h3>
							<p class="mt-3 mb-lg-5 px-lg-5 counter-para"> Volunteering can be provided with the organisations already working in the area of your interest or the volunteers.</p>
						</div>
						<div class="skill_info mt-lg-5 mt-4 pt-lg-4">
							<div class="stats_left">
								<div class="counter_grid">
									<div class="icon_info">
										<!-- <p class="counter"><?php echo $row1; ?></p> -->


									</div>
								</div>
							</div>
							<div class="stats_left">
								<div class="counter_grid">
									<div class="icon_info">
										<p class="counter"><?php echo $row; ?></p>
										<h4>Number of supporters</h4>

									</div>
								</div>
							</div>
							<div class="stats_left">
								<div class="counter_grid">
									<div class="icon_info">
										<p class="counter"><?php echo $sum; ?></p>
										<h4>Fund raised</h4>

									</div>
								</div>
							</div>
							<div class="stats_left">
								<div class="counter_grid">
									<div class="icon_info">
										<p class="counter"><?php echo $sum1; ?></p>
										<h4>Other Doantions</h4>

									</div>
								</div>
							</div>

						</div>
						<br><br><br>
						<div class="title-content">
							<h6 class="sub-title" style="color: #FF4500;">Join Us</h6>
							<h3 class="hny-title two">Become a Humble</h3>
							<p class="counter-para">Join your hand with us for a better life and beautiful future</p>

						</div>

						<a href="contact.php" class="btn btn-style btn-primary mt-4">Inquiry </a>
					</div>
				</div>

			</div>
		</div>
		</div>
	</section>

	<div class="container my-4">

		<div class="title-content text-center mb-lg-5 mb-4">

			<h3 class="hny-title">Event's Money Donatations</h3>
			<p class="fea-para">Donate your money for helpful pepole..</p>
		</div>

		<div class="row">

			<?php
			$images = array('assets/images/ab.jpg', 'assets/images/ab1.jpg', 'assets/images/ab2.jpg', 'assets/images/ab3.jpg', 'assets/images/ab4.jpg', 'assets/images/ab5.jpg'); // store image URLs in an array
			$i = 0;
			while ($event = mysqli_fetch_assoc($result2)) {
			?>
				<div class="col-md-4 mb-4">
					<div class="card" style="height: 400px; display: flex; flex-direction: column; justify-content: space-between;border-radius:10px;"> <!-- Flexbox for card body -->
						<img src="<?php echo $images[$i]; ?>" class="card-img-top" alt="Event Image" style="height: 200px; object-fit: cover; padding: 2%;border-radius:16px;"> <!-- display each image from the array -->
						<div class="card-body d-flex flex-column">
							<div>
								<h5 class="card-title"><?php echo $event['title']; ?></h5>
								<p class="card-text"><?php echo $event['description']; ?></p>
								<?php
								$totalDonationQuery = $obj->query("SELECT SUM(amount) as total FROM money_donation WHERE event_id='$event[e_id]'");
								$totalDonation = $totalDonationQuery->fetch_object();
								$totalAmount = isset($totalDonation->total) ? $totalDonation->total : 0;
								$eventLimit = isset($event['e_limit']) ? $event['e_limit'] : 0;
								?>
								<small class="text-muted">Donataion Required: <?php echo $eventLimit - $totalAmount; ?></small>
							</div>
							<div class="mt-auto">
								<a href="donate.php?event_id=<?php echo $event['e_id']; ?>" class="btn btn-primary btn-block">Donate</a>
							</div>
						</div>
					</div>
				</div>
			<?php
				$i++;
				if ($i >= count($images)) {
					$i = 0;
				}
			}
			?>
		</div>
	</div>

	<section class="w3l-testimonials">
		<div class="testimonials py-5">
			<div class="container text-center py-lg-3">
				<div class="title-content text-center mb-lg-5 mb-4">
					<h6 class="sub-title">Testimonials</h6>
					<h3 class="hny-title">What Our
						People Says?</h3>

				</div>
				<div class="row">
					<div class="col-lg-10 mx-auto">
						<div class="owl-testimonial owl-carousel owl-theme">
							<div class="item">
								<div class="slider-info mt-lg-4 mt-3">
									<div class="img-circle">
										<img src="assets/images/f2.jpg" class="img-fluid rounded" alt="client image">
									</div>
									<div class="message">I was inspired to donate to Organization after hearing you talk so much about their work.</div>
									<div class="name">- Jemmy carter</div>

								</div>
							</div>
							<div class="item">
								<div class="slider-info mt-lg-4 mt-3">
									<div class="img-circle">
										<img src="assets/images/f4.jpg" class="img-fluid rounded" alt="client image">
									</div>
									<div class="message">Though I am unable to donate funds, I will donate my time as joining volunteer in NGO...</div>
									<div class="name">- John Balmer</div>
								</div>
							</div>
							<div class="item">
								<div class="slider-info mt-lg-4 mt-3">
									<div class="img-circle">
										<img src="assets/images/f3.jpg" class="img-fluid rounded" alt="client image">
									</div>
									<div class="message">I am feeling charitable this time of year, and I would love to make an event in your honor. can organization support us..</div>
									<div class="name">- karen gillan</div>
								</div>
							</div>
							<div class="item">
								<div class="slider-info mt-lg-4 mt-3">
									<div class="img-circle">
										<img src="assets/images/f6.jpg" class="img-fluid rounded" alt="client image">
									</div>
									<div class="message">Many Are In Need Of Your Helping Hand.</div>
									<div class="name">- Tom cruise</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



	<?php include 'common/footer.php' ?>

</body>

</html>

<script src="assets/js/jquery-3.3.1.min.js"></script>


<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script>
	$(document).ready(function() {
		$('.popup-with-zoom-anim').magnificPopup({
			type: 'inline',

			fixedContentPos: false,
			fixedBgPos: true,

			overflowY: 'auto',

			closeBtnInside: true,
			preloader: false,

			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});

		$('.popup-with-move-anim').magnificPopup({
			type: 'inline',

			fixedContentPos: false,
			fixedBgPos: true,

			overflowY: 'auto',

			closeBtnInside: true,
			preloader: false,

			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-slide-bottom'
		});
	});
</script>

<script src="assets/js/jquery.waypoints.min.js"></script>
<script src="assets/js/jquery.countup.js"></script>
<script>
	$('.counter').countUp();
</script>

<script src="assets/js/owl.carousel.js"></script>

<script>
	$(document).ready(function() {
		$('.owl-one').owlCarousel({
			loop: true,
			margin: 0,
			nav: false,
			responsiveClass: true,
			autoplay: false,
			autoplayTimeout: 5000,
			autoplaySpeed: 1000,
			autoplayHoverPause: false,
			responsive: {
				0: {
					items: 1,
					nav: false
				},
				480: {
					items: 1,
					nav: false
				},
				667: {
					items: 1,
					nav: true
				},
				1000: {
					items: 1,
					nav: true
				}
			}
		})
	})
</script>

<script>
	$(document).ready(function() {
		$('.owl-testimonial').owlCarousel({
			loop: true,
			margin: 0,
			nav: false,
			responsiveClass: true,
			autoplay: false,
			autoplayTimeout: 5000,
			autoplaySpeed: 1000,
			autoplayHoverPause: false,
			responsive: {
				0: {
					items: 1,
					nav: false
				},
				480: {
					items: 1,
					nav: false
				},
				667: {
					items: 1,
					nav: false
				},
				1000: {
					items: 1,
					nav: false
				}
			}
		})
	})
</script>

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