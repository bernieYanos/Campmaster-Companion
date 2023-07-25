<?php
include 'includes/connect.inc.php';

$sql = mysqli_query(
  $con,
  "SELECT * FROM CheckIn_t"
);
$exists = mysqli_num_rows($sql);

if ($exists > 0) {
  $sql = "SELECT DISTINCT UnitID, UnitName, Council FROM CheckIn_t";
  $result = mysqli_query($con, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $unitID = $row['UnitID'];
    $unit = $row['UnitName'];
    $council = $row['Council'];
    echo '<option value="' . $unitID . '">' . $unit . ' - ' . $council . '</option>';
  }
}
