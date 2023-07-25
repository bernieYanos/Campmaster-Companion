<?php
include 'includes/connect.inc.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $unitName = $_POST['unitname'];
  $i = 1;
  while (isset($_POST['campsite' . $i])) {
    ${'campsite' . $i} = $_POST['campsite' . $i];
    $i++;
  }
  $x = 1;
  while (isset($_POST['checkout' . $x])) {
    ${'checkout' . $x} = $_POST['checkout' . $x];
    $x++;
  }
  if (isset($_POST['inventory'])) {
    $inventory = 1;
  } else {
    $inventory = 0;
  }
  if (isset($_POST['schedule'])) {
    $schedule = 1;
  } else {
    $schedule = 0;
  }
  if (isset($_POST['roster'])) {
    $roster = 1;
  } else {
    $roster = 0;
  }
  if (isset($_POST['paid'])) {
    $paid = 1;
  } else {
    $paid = 0;
  }

  $num_campsites = $i - 1;
  for ($m = 1; $m <= $num_campsites; $m++) {
    if (${'checkout' . $m} === 'same') {
      $sql = "SELECT `Checkout` FROM `CheckIn_t` WHERE `Campsite` = ?";
      $stmt1 = $con->prepare($sql);
      $stmt1->bind_param("s", ${'campsite' . $m});
      $stmt1->execute();
      $stmt1->store_result();
      $stmt1->bind_result($result);
      if ($stmt1->fetch()) {
        ${'checkout' . $m} = $result;
      } else {
        // handle error or set a default value
      }
    }
  }

  $stmt = $con->prepare("UPDATE CheckIn_t SET 
      `Checkout` = ?,
      `Roster` = ?,
      `Sched` = ?,
      `Paid` = ?,
      `Inventory` = ?
    WHERE `UnitName` = ? AND `Campsite` = ?");
  $stmt->bind_param("siiiiis", $checkout, $roster, $schedule, $paid, $inventory, $unitName, $campsite);

  for ($j = 1; $j <= $num_campsites; $j++) {
    $campsite = ${'campsite' . $j};
    $checkout = ${'checkout' . $j};

    if ($stmt->execute()) {
      echo "Record updated successfully for $unitName";
    } else {
      echo "Error updating record for campsite $unitName: " . $stmt->error;
    }
  }
}
