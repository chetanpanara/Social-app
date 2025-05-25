<?php
session_start();
include 'common/connect.php';

use Razorpay\Api\Api;

require('vendor/autoload.php');


$apiKey = 'rzp_test_Lq2RZscJLtr4ge';
$apiSecret = 'PkOGGLoTjZfRKujYMWCxoC51';

$api = new Api($apiKey, $apiSecret);


if (!isset($_SESSION['user_id'])) {
    header('location:home.php');
    exit;
}

$event_id = isset($_GET['event_id']) ? $_GET['event_id'] : null;

$eventQuery = $obj->query("SELECT * FROM event WHERE e_id='$event_id'");
$event = $eventQuery->fetch_object();

if (!$event) {
    echo "<script>alert('Event not found'); window.location='home.php';</script>";
    exit;
}

$totalDonationQuery = $obj->query("SELECT SUM(amount) as total FROM money_donation WHERE event_id='$event_id'");
$totalDonation = $totalDonationQuery->fetch_object();
$totalAmount = isset($totalDonation->total) ? $totalDonation->total : 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['payment_id'])) {
    // Get form data
    $d_name = $_POST['d_name'];
    $amt = $_POST['amt'];
    $desc = $_POST['desc'];
    $payment_id = $_POST['payment_id'];
    $date = date('Y-m-d');
    $user_id = $_SESSION['user_id'];

    if ($event->e_limit <= ($totalAmount + $amt)) {
        $obj->query("UPDATE event SET status='complete' WHERE e_id='$event_id'");
    }

    $exe = $obj->query("INSERT INTO money_donation(user_id, event_id, amount, description, date, d_name, payment_id) VALUES ('$user_id', '$event_id', '$amt', '$desc', '$date', '$d_name', '$payment_id')");

    if ($exe) {
        echo "<script>alert('Donated successfully');window.location='home.php';</script>";
    } else {
        echo "<script>alert('Error in donation submission');</script>";
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
                            <h3 class="hny-title mb-lg-5 mb-4">Please money Donate</h3>
                        </div>
                        <form method="post" class="signin-form" name="donationForm">
                            <div class="container">
                                <div class="col-lg-10 form-input">
                                    <input type="text" name="d_name" id="d_name" placeholder="Donor Name" required="" />
                                </div>
                                <br>
                                <div class="col-lg-10 form-input">
                                    <input type="text" name="amt" id="amt" placeholder="amount" required="" />
                                </div>
                                <br>
                                <div class="col-lg-10 form-input">
                                    <textarea name="desc" id="desc" placeholder="description"></textarea>
                                </div><br>
                                <input type="hidden" name="payment_id" id="payment_id">
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
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    document.getElementById('rzp-button1').onclick = function(e) {
        e.preventDefault(); 

        var amt = document.getElementById('amt').value * 100; 
        var donorName = document.getElementById('d_name').value;
        var logo = document.getElementById("logo") ? document.getElementById("logo").src : '';

        if (!amt || !donorName) {
            alert("Please fill out all required fields");
            return;
        }

        var options = {
            "key": "rzp_test_Lq2RZscJLtr4ge",
            "amount": amt,
            "currency": "INR",
            "name": "Social App",
            "description": "Donation Payment",
            "image": logo,
            "handler": function(response) {
           
                document.getElementById('payment_id').value = response.razorpay_payment_id;

           
                document.forms['donationForm'].submit();
            },
            "prefill": {
                "name": donorName
            },
            "theme": {
                "color": "#3399cc"
            }
        };

        var rzp1 = new Razorpay(options);
        rzp1.open();
    };
</script>