<?php
include 'includes/connect.inc.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $group1Selections = $_POST['group1'];
  $group2Selections = $_POST['group2'];

  $num_group1Selections = count($group1Selections) - 1;
  $num_group2Selections = count($group2Selections) - 1;

  for ($r = 0; $r <= $num_group1Selections; $r++) {
    $sql = mysqli_query($con, "UPDATE `CheckIn_t` SET `CheckoutGroup` = 1 WHERE `Campsite` = '$group1Selections[$r]'");
  }

  for ($s = 0; $s <= $num_group2Selections; $s++) {
    $sql = mysqli_query($con, "UPDATE `CheckIn_t` SET `CheckoutGroup` = 2 WHERE `Campsite` = '$group2Selections[$s]'");
  }
}
