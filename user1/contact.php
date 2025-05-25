<?php 

session_start();
include 'common/connect.php';

if (isset($_POST['submit'])) {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$message = $_POST['msg'];
	$reg_date    = date('Y-m-d');

	$exe = $obj->query("insert into inquiry(name,email,contact,message,date) values('$name','$email','$contact','$message','$reg_date')");
	if($exe){
        echo "<script>alert('inquiry send Successfullly');</script>";
    }
    else {
        echo "<script>alert(' error');</script>";
    }
}


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
				<div class="col-md-4 col-lg-4 col-xl-4"><br><br><br>
				        <img src="inquriy.png" class="img-fluid" style="height: 340px;">
				      </div>
		      <div class="col-lg-8 form-inner-cont">
					<div class="title-content text-left">
						<h3 class="hny-title mb-lg-5 mb-4">Send Us A Message</h3>
					</div>
				  <form  method="post" class="signin-form">
					<div class="form-input">
					  <input type="text" name="name" id="name" placeholder="Name" />
					</div>
					<div class="row con-two">
					<div class="col-lg-6 form-input">
					  <input type="email" name="email" id="email" placeholder="Email" required="" />
					</div>
					<div class="col-lg-6 form-input">
						<input type="text" name="contact" id="contact" placeholder="Contact" class="contact-input" />
					</div>
					</div>
					<div class="form-input">
					  <textarea placeholder="Message" name="msg" id="msg" required=""></textarea>
					</div>
					<div class="submit-button text-lg-center">
					   <button type="submit" class="btn btn-style" name="submit" id="submit">Submit</button>
				    </div>
				  </form>
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
  $(function () {
    $('.navbar-toggler').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>

<script>
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 80) {
      $("#site-header").addClass("nav-fixed");
    } else {
      $("#site-header").removeClass("nav-fixed");
    }
  });

 
  $(".navbar-toggler").on("click", function () {
    $("header").toggleClass("active");
  });
  $(document).on("ready", function () {
    if ($(window).width() > 991) {
      $("header").removeClass("active");
    }
    $(window).on("resize", function () {
      if ($(window).width() > 991) {
        $("header").removeClass("active");
      }
    });
  });
</script>

<script src="assets/js/bootstrap.min.js"></script>