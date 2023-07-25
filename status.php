<!DOCTYPE html>
<html lang="en">

<head>
  <title>Status | RSR Campmaster</title>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php include 'includes/head.inc.php' ?>
</head>

<header>
  <?php
  include 'includes/header.inc.php';
  include 'includes/connect.inc.php';
  $sqlIn = mysqli_query(
    $con,
    "SELECT * FROM CheckIn_t WHERE Checkout IS NOT NULL"
  );
  $sqlOut = mysqli_query(
    $con,
    "SELECT * FROM CheckIn_t WHERE Checkout IS NULL"
  );
  $inExists = mysqli_num_rows($sqlIn);
  $outExists = mysqli_num_rows($sqlOut);
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
              <h4 class="text-center my-3 pb-3">Not in Camp</h4>
              <table class="table mb-4 text-white">
                <thead>
                  <tr>
                    <th class="col-4 ps-5" scope="col">Unit</th>
                    <th class="col-4" scope="col">Council</th>
                    <th class="col-4" scope="col">Campsite</th>
                  </tr>
                </thead>
                <tbody>
                  <?php include 'includes/out.inc.php' ?>
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
              <h4 class="text-center my-3 pb-3">Checked-In</h4>
              <table class="table mb-4 text-white">
                <thead>
                  <tr>
                    <th scope="col">Unit</th>
                    <th scope="col">Council</th>
                    <th scope="col">Campsite</th>
                    <th class="text-center" scope="col">Check-out Time</th>
                    <th class="text-center" scope="col">Roster</th>
                    <th class="text-center" scope="col">Schedule</th>
                    <th class="text-center" scope="col">Fee Paid</th>
                    <th class="text-center" scope="col">Inventory</th>
                    <th class="text-center" scope="col">Archery</th>
                    <th class="text-center" scope="col">Shotgun</th>
                  </tr>
                </thead>
                <tbody>
                  <?php include 'includes/in.inc.php' ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>