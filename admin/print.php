<?php
require '../user1/vendor/autoload.php';

session_start();
include 'common/connect.php';

if(!isset($_SESSION['admin_id'])) {
    header('location:index.php');
    exit();
}

$admin_id = $_SESSION['admin_id'];


if (!isset($_GET['d_id'])) {
    die('Donation ID not specified.');
}


$d_id = $_GET['d_id'];


$result_donation = $obj->query("SELECT * FROM donation WHERE  d_id='$d_id'");

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


 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700&display=swap" rel="stylesheet">

    <style>
        .wrapper {
    border: 1px solid black;
   padding: 20px;
   margin-bottom: 5px;
   border-radius: 10px;
 }
       .bill-logo
{
  color: #007bff;
}

    </style>

  </head>

<body>

  <section>
      <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-10">

                             <?php 
                              
                         while ($row = $result_donation->fetch_object()) 
                         {
                          ?>
                          
                            <form action="">
                          <div class="wrapper">

                                            	<a class="navbar-brand"  href="home.php">
            <img src="..\admin\images\logonew1.png" alt="Your logo" title="Your logo" style="height:74px;" id="logo"/>
						   <img src="..\admin\images\sp.png" alt="Your logo" title="Your logo" style="height:70px;margin-top:10px;"  />
					</a>


                              <h1 class="bill-logo text-center mt-4">DONATION RECEIPT</h1>

                            <span class="text-center">
                                <!-- <h4 class=" mt-3"> <img src="assets/images/logonew1.png" alt="Your logo" title="Your logo" style="height:70px;" id="logo"/>SOCIAL APP</h4> -->
                                <p>Address: A- 202, Social App Services, <br> Shivam Shopping Mall,Ahmedabad</p>
                            </span>
                               
                 
                              <table class="table">
                                <tr>
                                  <td><b>Date:</b> <?php  echo $row->donation_date ?></td>  
                                   <td><b>RECEIPT No:</b> <?php  echo $row->d_id ?></td>                       
                                </tr>
                           

                                <tr><td><b>Donated Title:</b> <?php  echo $row->title ?></td></tr>
                                 <tr><td><b>Donation Amount:</b> <?php  echo $row->d_amount ?></td></tr>
                                 <tr><td><b>Address:</b> <?php  echo $row->address ?></td></tr>
                                  <tr><td><b>Contact Name:</b> <?php  echo $row->contact_name ?></td></tr>
                                   <tr><td><b>Contact Number: </b><?php  echo $row->contact_number ?></td></tr>

                                   <tr>
                                    <td><b>Description</b>: <br> <?php  echo $row->description ?></td>
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