<!DOCTYPE html>
<html lang="en">

<head>
  <title>Check-Out Schdule | RSR Campmaster</title>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php include 'includes/head.inc.php' ?>
</head>

<header>
  <?php
  include 'includes/header.inc.php';
  include 'includes/connect.inc.php';
  $sqlGroup1 = mysqli_query(
    $con,
    "SELECT * FROM `CheckIn_t` WHERE `CheckoutGroup` = 1"
  );
  $sqlGroup2 = mysqli_query(
    $con,
    "SELECT * FROM CheckIn_t WHERE `CheckoutGroup` = 2"
  );
  $group1Exists = mysqli_num_rows($sqlGroup1);
  $group2Exists = mysqli_num_rows($sqlGroup2);
  ?>
</header>

<body class="bg">
  <div class="bg_top_left">
    <img src="img/rsr_sunset.jpg" alt="">
  </div>
  <section class="vh-100 mt-3">
    <div class="container py-3">
      <div class="row d-flex justify-content-left align-items-center h-100">
        <div class="col col-lg-12 col-xl-12">
          <div class="card rounded-3 text-white">
            <div class="card-body p-4">
              <h4 class="text-center my-3 pb-3">Matt</h4>
              <table class="table mb-4 text-white">
                <thead>
                  <tr>
                    <th class="col-4" scope="col">Check-Out Time</th>
                    <th class="col-4 ps-5" scope="col">Campsite</th>
                    <th class="col-4" scope="col">Unit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($group1Exists > 0) {
                    $sql = "SELECT Checkout, UnitName, Campsite FROM CheckIn_t WHERE CheckoutGroup = 1 ORDER BY Checkout ASC";
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                      $checkout = $row['Checkout'];
                      $unit = $row['UnitName'];
                      $campsite = $row['Campsite'];
                      $checkoutTime = date_create($checkout);
                      echo '
                      <tr>
                        <td>' . date_format($checkoutTime, "g:i") . '</td>
                        <td>' . $campsite . '</td>
                        <td>' . $unit . '</td>
                      </tr>';
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row d-flex justify-content-left align-items-center h-100">
        <div class="col col-lg-12 col-xl-12">
          <div class="card rounded-3 text-white">
            <div class="card-body p-4">
              <h4 class="text-center my-3 pb-3">Bernie & Mary</h4>
              <table class="table mb-4 text-white">
                <thead>
                  <tr>
                    <th class="col-4" scope="col">Check-Out Time</th>
                    <th class="col-4 ps-5" scope="col">Campsite</th>
                    <th class="col-4" scope="col">Unit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($group2Exists > 0) {
                    $sql = "SELECT Checkout, UnitName, Campsite FROM CheckIn_t WHERE CheckoutGroup = 2 ORDER BY Checkout ASC";
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                      $checkout = $row['Checkout'];
                      $unit = $row['UnitName'];
                      $campsite = $row['Campsite'];
                      $checkoutTime = date_create($checkout);
                      echo '
                      <tr>
                        <td>' . date_format($checkoutTime, "g:i") . '</td>
                        <td>' . $campsite . '</td>
                        <td>' . $unit . '</td>
                      </tr>';
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>