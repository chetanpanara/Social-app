<?php

session_start();

include 'common/connect.php';


if (!isset($_SESSION['user_id'])) {
  header('location:home.php');
}


$user_id = $_SESSION['user_id'];

$result1 = $obj->query("select * from event where user_id='$user_id'");


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
            <div class="col-lg-12 ">
              <p>
              <h6>If you don't have an event with us,so create one first event with us.</h6><a href="event.php"><button class="btn btn-info mt-3">Create</button></a></p>
            </div>
            <div class="title-content text-left">
              <h3 class="hny-title mb-lg-5 mb-4">Your events</h3>
            </div>

            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Title</th>
                  <th scope="col">Description</th>
                  <th scope="col">Status</th>
                  <th scope="col">Event_type</th>
                  <th scope="col">Date</th>
                  <th scope="col">Total Donation</th>
                  <th scope="col">Action</th>
                  <th scope="col">Delete</th>
                  <th scope="col">Edit</th>

                </tr>
              </thead>
              <!-- <?php
                    while ($row = $result1->fetch_object()) {
                    ?> -->
              <tbody>
                <tr>

                  <th scope="row"><?php echo $row->e_id; ?></th>
                  <td><?php echo $row->title; ?></td>
                  <td><?php echo $row->description; ?></td>
                  <td><?php echo $row->status; ?></td>
                  <td><?php echo $row->event_type; ?></td>
                  <td><?php echo $row->date; ?></td>
                  <td>
                    <?php
                      $donation_query = $obj->query("SELECT SUM(amount) as total_donations FROM money_donation WHERE event_id = '$row->e_id'");
                      $donation_row = $donation_query->fetch_object();
                      echo $donation_row->total_donations ? $donation_row->total_donations : 0;
                    ?>
                  </td>
                  <td><a href="my_event_new.php?e_id=<?php echo $row->e_id; ?>" class="btn btn-primary">Details</a></td>
                  <?php
                      if ($row->status == 'pending') {
                  ?>
                    <td><a href="delete_event.php?delid=<?php echo $row->e_id; ?>"><button class="btn btn-danger">Delete</button></a></td>
                    <td><a href="edit_event.php?eid=<?php echo $row->e_id; ?>"><button class="btn btn-success">Edit</button></a></td>
                  <?php } ?>


                </tr>

              </tbody>
              <!-- <?php
                    }
                    ?>-->
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