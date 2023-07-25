<?php
include 'includes/connect.inc.php';

$choices = array("8:00", "8:00", "8:15", "8:15", "8:30", "8:30", "8:45", "8:45", "9:00", "9:00", "9:15", "9:15", "9:30", "9:30", "9:45", "9:45", "10:00", "10:00", "10:15", "10:15", "10:30", "10:30", "10:45", "10:45", "11:00", "11:00", "11:15", "11:15", "11:30", "11:30", "11:45", "11:45", "12:00", "12:00");

$sql = "SELECT DATE_FORMAT(`Checkout`, '%l:%i') AS `choice` FROM CheckIn_t WHERE Checkout IS NOT NULL";
$result = mysqli_query($con, $sql);

$pickedChoices = array();
while ($row = mysqli_fetch_assoc($result)) {
  $pickedChoices[] = $row['choice'];
}

$countedPickedChoices = array_count_values($pickedChoices);

foreach ($choices as $key => $value) {
  if (isset($countedPickedChoices[$value]) && $countedPickedChoices[$value] > 0) {
    $choices[$key] = null;
    $countedPickedChoices[$value]--;
  }
}

// Filter out null values
$filteredChoices = array_values(array_filter($choices, function ($value) {
  return $value !== null;
}));

// Return the data as a JSON string
header('Content-Type: application/json');
echo json_encode($filteredChoices);
