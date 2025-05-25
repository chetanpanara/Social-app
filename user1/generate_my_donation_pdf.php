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


if (!isset($_GET['m_id'])) {
    die('Donation ID not specified.');
}

$m_id = $_GET['m_id'];


$result_donation = $obj->query("SELECT * FROM money_donation WHERE user_id='$user_id' AND m_id='$m_id'");
$result_name=$obj->query("SELECT name FROM user");

if($result_donation->num_rows == 0) {
    die('No donation record found for this ID.');
}

$dompdf = new Dompdf();

$html = '
<html>
<head>
  <style>
    body { font-family: DejaVu Sans, sans-serif; }
    table { width: 100%; border-collapse: collapse; }
    table, th, td { border: 1px solid black; padding: 8px; text-align: left; }
    th { background-color: #f2f2f2; }
  </style>
</head>
<body>
  <h2>Your Donation Details</h2>
  <table>
    <thead>
      <tr>
        <th>Money-Donation ID</th>
        <th>Description</th>
        <th>Event Title</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Payment ID</th>
      </tr>
    </thead>
    <tbody>';

while ($row = $result_donation->fetch_object()) {
    $eventQuery = $obj->query("SELECT title FROM event WHERE e_id = '$row->event_id'");
    $event = $eventQuery->fetch_object();
    $eventTitle = $event ? $event->title : 'N/A';

    $html .= '
    <tr>
      <td>' . htmlspecialchars($row->m_id) . '</td>
      <td>' . htmlspecialchars($row->description) . '</td>
      <td>' . htmlspecialchars($eventTitle) . '</td>
      <td>' . htmlspecialchars($row->amount) . '</td>
      <td>' . htmlspecialchars($row->date) . '</td>
      <td>' . htmlspecialchars($row->payment_id) . '</td>
    </tr>';
}

$html .= '
    </tbody>
  </table>
</body>
</html>';

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('donation_details.pdf', array('Attachment' => 1));
