<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;

session_start();
include 'common/connect.php';

if (!isset($_SESSION['user_id'])) {
  header('location:home.php');
  exit();
}

$user_id = $_SESSION['user_id'];


if (!isset($_GET['e_id'])) {
  die('Donation ID not specified.');
}

$e_id = $_GET['e_id'];


$result_donation = $obj->query("SELECT * FROM event WHERE user_id='$user_id' AND e_id='$e_id'");

if ($result_donation->num_rows == 0) {
  die('No donation record found for this ID.');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Social app</title>

  <link rel="stylesheet" href="assets/css/style-starter.css">

  <link href="//fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700&display=swap" rel="stylesheet">


<style>
  .wrapper {
    border: 1px solid black;
    padding: 20px;
    margin-bottom: 5px;
    border-radius: 10px;
  }

  .bill-logo {

    color: #007bff;
  }

  #print-btn {
    background-color: var(--red);
    color: white;
    border-style: none;
  }
</style>
</head>

<body>

  <section>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-10">

          <?php

          while ($row = $result_donation->fetch_object()) {
          ?>

            <form action="">
              <div class="wrapper">
                <a class="navbar-brand" href="home.php">
                  <img src="assets/images/logonew1.png" alt="Your logo" title="Your logo" style="height:74px;" id="logo" />
                  <img src="assets/images/sp.png" alt="Your logo" title="Your logo" style="height:70px;margin-top:10px;" />
                </a>


                <h1 class="bill-logo text-center mt-4">DONATION RECEIPT</h1>

                <span class="text-center">
                  <!-- <h4 class=" mt-3"> <img src="assets/images/logonew1.png" alt="Your logo" title="Your logo" style="height:70px;" id="logo"/>SOCIAL APP</h4> -->
                  <p>Address: A- 202, Social App Services, <br> Shivam Shopping Mall,Ahmedabad</p>
                </span>


                <table class="table">
                  <tr>
                    <td><b>Date:</b> <?php echo $row->date ?></td>
                    <td><b>RECEIPT No:</b> <?php echo $row->e_id ?></td>
                  </tr>


                  <tr>
                    <td><b>Event Title:</b> <?php echo $row->title ?></td>
                  </tr>
                  <tr>
                    <td><b>Event Type:</b> <?php echo $row->event_type ?></td>
                  </tr>

                  <?php

                  $donation_query = $obj->query("SELECT SUM(amount) as total_donations FROM money_donation WHERE event_id = '$row->e_id'");
                  $donation_row = $donation_query->fetch_object();
                  $totaldonation = $donation_row ? $donation_row->total_donations : 0;
                  ?>
                  <tr>
                    <td><b>Total Donation: </b><?php echo $totaldonation ?></td>
                  </tr>

                  <tr>
                    <td><b>Total DonorName: </b>harsh,chetan</td>
                  </tr>

                  <tr>
                    <td><b>Event Description</b>: <br> <?php echo $row->description ?></td>
                  </tr>

                  <tr>
                    <th>Authorized signature: </th>
                  </tr>

                  <tr>
                    <th>Authorized signature of receiver: </th>
                  </tr>
                </table>
              </div>
            </form>

          <?php
          }
          ?>



          <button type="submit" onclick="window.print();return false;" id="print-btn" class="btn btn-primary">Print</button>


        </div>
      </div>
    </div>
  </section>

</body>

</html>