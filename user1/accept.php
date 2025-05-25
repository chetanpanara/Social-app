<?php 
session_start();

include 'common/connect.php';


$id = $_GET["delid"];

if (isset($_POST['submit'])) {

  $status = $_POST['status'];
  $msg = $_POST['msg'];
  $volunteer_id =  $_SESSION['volunteer_id'];

  date_default_timezone_set('Asia/Kolkata');
  $date = date('Y-m-d h:i:s');
  
  $exe = $obj->query("insert into volunteer_acceptance(user_id,datetime,status,d_id,description) values('$volunteer_id','$date','$status','$id','$msg')");

  $ext = $obj->query("update donation set status='$status' where d_id='$id'");
  if($exe && $ext){
        echo "<script>alert(' Status updated  Successfullly');document.location='home.php';</script>";

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
       
          <div class="col-lg-12 form-inner-cont">
          <div class="title-content text-left">
            <h3 class="hny-title mb-lg-5 mb-4">Update status donation post</h3>
          </div>
          <form  method="post" class="signin-form">
          <div class="col-lg-10 form-input">
            <select class="form-control"  id="status" name="status">
             <option value="">--Select Accept--</option>
                <option value="accept">Accept</option>
            </select>
            
        </div>
         
          <div class="form-input col-lg-10">
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