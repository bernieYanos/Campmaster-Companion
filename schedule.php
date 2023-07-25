<!DOCTYPE html>
<html lang="en">

<head>
  <title>Check-Out Schedule | RSR Campmaster</title>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php include 'includes/head.inc.php' ?>
  <script src="js/schedule.js" defer></script>
  <script src="js/multiselect.min.js" defer></script>
  <script src="js/clearButton.js" defer></script>
  <script src="js/checkoutSubmit.js" defer></script>
</head>

<header>
  <?php
  include 'includes/header.inc.php';
  include 'includes/connect.inc.php';
  ?>
</header>

<body class="bg">
  <div class="bg_top_left">
    <img src="img/rsr_sunset.jpg" alt="">
  </div>
  <form action="process-schedule.php" method="POST" id="modifyForm">
    <div class="row m-3">
      <div class="col-md-5" id="schedule-full-list">
        <select name="checkouts" id="multi_d" class="form-select card text-white" size="26" multiple="multiple">
          <?php
          $sql = mysqli_query($con, "SELECT UnitName, Campsite, Checkout FROM CheckIn_t WHERE Checkout IS NOT NULL ORDER BY Checkout ASC");
          while ($row = mysqli_fetch_assoc($sql)) {
            $unitName = $row['UnitName'];
            $campsite = $row['Campsite'];
            $checkout = $row['Checkout'];
            $checkout = date_create($checkout);
            echo '
                  <option value="' . $campsite . '">' . date_format($checkout, "h:i") . ' - ' . $campsite . ' - ' . $unitName . '</option>';
          }
          ?>
        </select>
      </div>

      <div class="col-md-2 d-grid gap-2">
        <button type="button" id="multi_d_rightAll" class="btn btn-primary"><i class="fa-solid fa-angles-right"></i></button>
        <button type="button" id="multi_d_rightSelected" class="btn btn-primary"><i class="fa-solid fa-angle-right"></i></button>
        <button type="button" id="multi_d_leftSelected" class="btn btn-primary"><i class="fa-solid fa-angle-left"></i></button>
        <button type="button" id="multi_d_leftAll" class="btn btn-primary"><i class="fa-solid fa-angles-left"></i></button>

        <hr />

        <button type="button" id="multi_d_rightAll_2" class="btn btn-primary"><i class="fa-solid fa-angles-right"></i></button>
        <button type="button" id="multi_d_rightSelected_2" class="btn btn-primary"><i class="fa-solid fa-angle-right"></i></button>
        <button type="button" id="multi_d_leftSelected_2" class="btn btn-primary"><i class="fa-solid fa-angle-left"></i></button>
        <button type="button" id="multi_d_leftAll_2" class="btn btn-primary"><i class="fa-solid fa-angles-left"></i></button>
      </div>

      <div class="col-md-5 d-grid gap-5">
        <h2 class="text-white">Group 1</h2>
        <select name="group1[]" id="multi_d_to" class="form-select card text-white" size="8" multiple="multiple"></select>
        <hr />
        <h2 class="text-white">Group 2</h2>
        <select name="group2[]" id="multi_d_to_2" class="form-select card text-white" size="8" multiple="multiple"></select>
      </div>
      <div class="form-group formbtns">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button id="clear-button" class="btn btn-primary">Clear</button>
      </div>
    </div>
  </form>

</body>