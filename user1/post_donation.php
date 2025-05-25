<?php

session_start();

include 'common/connect.php';


if (!isset($_SESSION['volunteer_id'])) {
  header('location:home.php');
}



$user_id = $_SESSION['volunteer_id'];
$volunteer_data = $obj->query("select * from user where user_id='$user_id'");
$vol = $volunteer_data->fetch_object();
$v_city_id = $vol->city_id;
$v_area_id = $vol->area_id;

$result = $obj->query("select * from donation where city_id='$v_city_id' and area_id='$v_area_id' and status != 'accept'");

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
              <h3 class="hny-title mb-lg-5 mb-4">Your donation post</h3>
            </div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">D_ID</th>
                  <th scope="col">Title</th>
                
                  <th scope="col">Address</th>
                 
                  <th scope="col">Contact Name</th>
                  <th scope="col">More</th>
                
                </tr>
              </thead>
              <?php
              while ($row = $result->fetch_object()) {
              ?>
                <tbody>
                  <tr>
                    <th scope="row"><?php echo $row->d_id; ?></th>
                    <td><?php echo $row->title; ?></td>
                    <!-- <td><?php //echo $row->description; 
                              ?></td> -->
                    <td><?php echo $row->address; ?></td>
                    <!-- <td><?php //echo $row->status; 
                              ?></td> -->
                    <td><?php echo $row->contact_name; ?></td>
                    <!--  <td><?php //echo $row->contact_number; 
                              ?></td>
                <td><?php //echo $row->date; 
                    ?></td> -->
                    <th scope="row"><a href="more_postdonation.php?moreid=<?php echo $row->d_id; ?>">More details..</a></th>
                  </tr>
                  <!-- <td><a href="delete_event.php?delid=<?php //echo $row->e_id;
                                                            ?>"><button class="btn btn-danger">Reject</button></a></td>
                <td><a href="edit_event.php?eid=<?php //echo $row->e_id;
                                                ?>"><button class="btn btn-default">Accept</button></a></td>
                <td></td> -->
                  </tr>

                </tbody>
              <?php
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