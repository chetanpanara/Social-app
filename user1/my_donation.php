<?php

session_start();

include 'common/connect.php';


if (!isset($_SESSION['user_id'])) {
  header('location:home.php');
}


$user_id = $_SESSION['user_id'];

$result_donation = $obj->query("SELECT * FROM donation WHERE user_id='$user_id'");



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

          <div class="title-content text-left">
            <h3 class="hny-title mb-lg-5 mb-4">Your Donation</h3>
          </div>

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Donatino ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Address</th>
                <th scope="col">Date</th>
                <th scope="col">Amount</th>
                <th scope="col">Contact_Name</th>
                <th scope="col">Contact_Number</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <?php
            while ($row = $result_donation->fetch_object()) {
              if (!empty($row)) {
            ?>
                <tbody>
                  <td><?php echo $row->d_id; ?></td>
                  <td><?php echo $row->title; ?></td>
                  <td><?php echo $row->description; ?></td>
                  <td><?php echo $row->address; ?></td>
                  <td><?php echo $row->donation_date;  ?></td>
                  <td><?php echo $row->d_amount; ?></td>
                  <td><?php echo $row->contact_name; ?></td>
                  <td><?php echo $row->contact_number; ?></td>
                  <td><a href="my_donation_new.php?d_id=<?php echo $row->d_id; ?>" class="btn btn-primary">Details</a></td>
                </tbody>

              <?php
              } else {
              ?>
                <tbody>
                  <td>No record found</td>
                </tbody>
            <?php
              }
            }
            ?>
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