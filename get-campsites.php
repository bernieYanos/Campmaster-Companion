<?php
include 'includes/connect.inc.php';

// Get the UnitName parameter from the AJAX request
$unitName = $_GET['unitname'];

// Fetch the relevant data from the SQL database
$sql = mysqli_query($con, "SELECT Campsite, Council FROM CheckIn_t WHERE UnitName = '$unitName'");
$data = array();
while ($row = mysqli_fetch_assoc($sql)) {
  $data[] = $row;
}

// Return the data as a JSON string
header('Content-Type: application/json');
echo json_encode($data);
