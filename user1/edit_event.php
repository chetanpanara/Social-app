<?php 

session_start();
include 'common/connect.php';



if(!isset($_SESSION['user_id']))
{
    header('location:home.php');
}




$id=$_GET['eid'];
$result = $obj->query("select * from event where e_id='$id'");

$row = $result->fetch_object();
$event_type = $row->event_type;



if (isset($_POST['submit'])) {

  $title = $_POST['title'];
  $desc = $_POST['desc'];
  $e_type = $_POST['e_type'];
  $status = $_POST['status'];
  $date = $_POST['date'];

  $exe = $obj->query("update event set title='$title',description='$desc',date = '$date',status='$status',event_type='$e_type' where e_id='$id'");
  if($exe){
        header("location:read_event.php");
        echo "<script>alert('event send Successfullly');</script>";
        
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
        <div class="col-md-4 col-lg-4 col-xl-4">
                <img src="event.jpeg"
                  class="img-fluid" style="height: 250px;">
              </div>
          <div class="col-lg-8 form-inner-cont">
          <div class="title-content text-left">
            <h3 class="hny-title mb-lg-5 mb-4">Create an event with us</h3>
          </div>
          <form  method="post" class="signin-form">
          <div class="form-input">
            <input type="text" name="title" id="title" placeholder="Title"  value="<?php echo $row->title; ?>" />
          
            <textarea placeholder="Description" name="desc" id="desc" required="" ><?php echo $row->description; ?></textarea>
          
          
         
            <input type="text" name="status" id="status" placeholder="Title"  value="<?php echo $row->status; ?>" />

             <input type="date" name="date" id="date" placeholder="date"  />
      
           
            <select class="form-control" id="e_type" name="e_type" >
              <option value="">---select event_type---</option>
              <option value="Birthday-celebration"<?php if ($event_type == 'Birthday-celebration')echo 'selected'; ?>>    Birthday-celebration   </option>
              <option value="Anniversary-celebration"<?php if ($event_type == 'Anniversary-celebration')echo 'selected'; ?>>    Anniversary-celebration   </option>
              <option value="Other -celebration" <?php if ($event_type == 'Other -celebration')echo 'selected'; ?>>    Other -celebration   </option>
              
              
            </select>
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