<?php
require '../user1/vendor/autoload.php';

use Dompdf\Dompdf;

session_start();
include 'common/connect.php';


if(!isset($_SESSION['admin_id'])) {
    header('location:index.php');
    exit();
}

$admin_id = $_SESSION['admin_id'];


$id1 = $_GET['moreid']; 
$result1 = $obj->query("SELECT * FROM donation WHERE d_id='$id1'");

if ($result1->num_rows > 0) {
    $row1 = $result1->fetch_object();

   
    $dompdf = new Dompdf();


    $html = '
    <html>
    <head>
      <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        table, th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
      </style>
    </head>
    <body>
      <h2>Donation Details</h2>
      <table>
        <tr><th>Donation ID</th><td>' . htmlspecialchars($row1->d_id) . '</td></tr>
        <tr><th>Title</th><td>' . htmlspecialchars($row1->title) . '</td></tr>
        <tr><th>Description</th><td>' . htmlspecialchars($row1->description) . '</td></tr>
        <tr><th>Category ID</th><td>' . htmlspecialchars($row1->cat_id) . '</td></tr>
           <tr><th>Donation Amount</th><td>' . htmlspecialchars($row1->d_amount) . '</td></tr>
        <tr><th>Date</th><td>' . htmlspecialchars($row1->donation_date) . '</td></tr>
        <tr><th>Address</th><td>' . htmlspecialchars($row1->address) . '</td></tr>
        <tr><th>City ID</th><td>' . htmlspecialchars($row1->city_id) . '</td></tr>
        <tr><th>Area ID</th><td>' . htmlspecialchars($row1->area_id) . '</td></tr>
        <tr><th>Status</th><td>' . htmlspecialchars($row1->status) . '</td></tr>
        <tr><th>User ID</th><td>' . htmlspecialchars($row1->user_id) . '</td></tr>
        <tr><th>Contact Name</th><td>' . htmlspecialchars($row1->contact_name) . '</td></tr>
        <tr><th>Contact Number</th><td>' . htmlspecialchars($row1->contact_number) . '</td></tr>
       
      </table>
    </body>
    </html>';

   
    $dompdf->loadHtml($html);

  
    $dompdf->setPaper('A4', 'portrait');

   
    $dompdf->render();


    $dompdf->stream('donation_details.pdf', array('Attachment' => 1));
} else {
    echo "No donation details found.";
}
