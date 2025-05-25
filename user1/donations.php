<?php

session_start();
include 'common/connect.php';


use Razorpay\Api\Api;

require('vendor/autoload.php');


$apiKey = 'rzp_test_Lq2RZscJLtr4ge';
$apiSecret = 'PkOGGLoTjZfRKujYMWCxoC51';

$api = new Api($apiKey, $apiSecret);




if(!isset($_SESSION['user_id']))
{
    header('location:home.php');
}



$cat = $obj->query("select * from category");
$city = $obj->query("select * from city");
$area = $obj->query("select * from area");



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
  $title = $_POST['title'];
  $desc = $_POST['desc'];
  $cat_id = $_POST['cat_id'];
  $dob = $_POST['date'];
   $d_amount = $_POST['d_amount'];
     
  $address = $_POST['add'];
  $city_id = $_POST['city_id'];
  $area_id = $_POST['area_id'];
  $status = 'success';

  $c_name = $_POST['c_name'];
  $c_num = $_POST['c_number'];

  $user_id = $_SESSION['user_id'];
 
  $exe = $obj->query("INSERT INTO donation(title,description,cat_id,d_amount,donation_date,address,city_id,area_id,status,user_id,contact_name,contact_number)VALUES('$title','$desc',$cat_id,'$d_amount','$dob','$address',$city_id,$area_id,'$status',$user_id,'$c_name','$c_num')");
  if($exe){
        echo "<script>alert('donation request send Successfullly');</script>";
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
        <div class="col-lg-6 contact-left pr-lg-4">
           
     
        </div>
        
        <div class="col-lg-12 form-inner-cont">
          <div class="title-content text-left">
            <h3 class="hny-title mb-lg-5 mb-4">Please Donate</h3>
          </div>
          <form  method="post" class="signin-form" name="donationForm">
          <div class="container">
          <div class="col-lg-10 form-input">
            <input type="text" name="title" id="title" placeholder="title" required="" />
          
           <textarea name="desc" id="desc" placeholder="description"></textarea>

           <input type="text" name="c_name" id="c_name" placeholder="Contact Name" required="" />

           <input type="text" name="c_number" id="c_number" placeholder="Contact Number" required="" />
          
           <select class="form-control"  id="cat_id" name="cat_id">
             <option value="">--Select category--</option>
                <?php
                        while($ca = $cat->fetch_object())
                        {
                            ?>
                            <option value="<?php echo $ca->cat_id;?>"><?php echo $ca->cat_name;?></option>
                            <?php
                        }

                ?>
            </select>
          <br>

             <input type="text" name="d_amount" id="d_amount" placeholder="Donation Amount" required="" />
           
            <textarea name="add" id="add" placeholder="Address"></textarea>
          
          <select class="form-control"  id="city_id" name="city_id">
             <option value="">--Select city--</option>
                <?php
                        while($ci = $city->fetch_object())
                        {
                            ?>
                            <option value="<?php echo $ci->city_id;?>"><?php echo $ci->city_name;?></option>
                            <?php
                        }

                ?>
            </select>
          <br>
           <select class="form-control"  id="area_id" name="area_id">
             <option value="">--Select area--</option>
                <?php
                        while($a = $area->fetch_object())
                        {
                            ?>
                            <option value="<?php echo $a->area_id;?>"><?php echo $a->area_name;?></option>
                            <?php
                        }

                ?>
            </select>
          <br>
           <input type="date" name="date" id="date" placeholder="Date" required="" />
        
          </div>
         
          <div class="submit-button text-lg-center">
             <button type="submit" class="btn btn-style" name="donate_submit" id="rzp-button1">Submit</button>
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



<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    document.getElementById('rzp-button1').onclick = function (e) {
        e.preventDefault(); 

        var d_amount = document.getElementById('d_amount').value * 100; 
     
        var logo = document.getElementById("logo") ? document.getElementById("logo").src : '';

        
        if (!d_amount) {
            alert("Please fill out all required fields");
            return;
        }

        var options = {
            "key": "rzp_test_Lq2RZscJLtr4ge",
            "amount": d_amount,
            "currency": "INR",
            "name": "Social App",
            "description": "Donation Payment",
            "image": logo,
            "handler": function (response) {
                
                document.forms['donationForm'].submit();
            },
          
            "theme": {
                "color": "#3399cc"
            }
        };

        var rzp1 = new Razorpay(options);
        rzp1.open();
    };
</script>