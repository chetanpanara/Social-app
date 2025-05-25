<?php
session_start();

include 'common/connect.php';



$volunteer_id =  $_SESSION['volunteer_id'];

$result = $obj->query("select * from volunteer_acceptance WHERE user_id = '$volunteer_id' ");




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
              <h3 class="hny-title mb-lg-5 mb-4">My donation post</h3>
            </div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Donation Post No.</th>
                  <th scope="col">Message</th>
                 
                  <th scope="col">Date - time</th>
                  
                  <th scope="col">Status</th>
                  <th scope="col">Receive Status</th>
                  <th scope="col">Delivery Status</th>
             
                </tr>
              </thead>
              <tbody>
                <?php
                while ($row = $result->fetch_object()) {


                ?>

                  <tr>
                    <th scope="row"><?php echo $row->d_id; ?></th>
                    <td><?php echo $row->description; ?></td>
                    <td><?php echo $row->datetime; ?></td>
                    <td><?php echo $row->status; ?></td>


                    <?php


                    if (($row->receive_message == '') and ($row->delivery_message == '')) {
                    ?>
                      <th scope="row">
                        <a href="update_donation_post.php?delid=<?php echo $row->v_id; ?>"><button class="btn btn-success">Received</button></a>
                      </th>

                      <th scope="row">
                        Wait for Receiving
                      </th>
                    <?php
                    } else if (($row->receive_message != '') and ($row->delivery_message == '')) {
                    ?>

                      <th scope="row">
                        Received
                      </th>


                      <th scope="row">
                        <a href="delivery_donation_post.php?delid=<?php echo $row->v_id; ?>"><button class="btn btn-success">Delivered</button></a>
                      </th>

                    <?php
                    } else {

                    ?>


                      <th scope="row">
                        Received
                      </th>

                      <th scope="row">
                        Delivered
                      </th>

                    <?php
                    }
                    ?>

                  </tr>

                  </tr>


                <?php
                }
                ?>
              </tbody>
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