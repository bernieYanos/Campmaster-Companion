<!DOCTYPE html>
<html lang="en" class="bg-dark bg-gradient">

<head>
  <title>Check-In | RSR Campmaster</title>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php include 'includes/head.inc.php' ?>
  <script src="js/clearForms.js" defer></script>
  <script src="js/checkIn.js" defer></script>
  <script src="js/checkInSubmit.js" defer></script>
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
  <div class="container content_right card">
    <div class="row justify-content-center">
      <div class="col-lg-4">
        <?php // Generate the initial form with UnitName select field and container div
        echo '
          <form method="POST" action="modify.php" class="clearForms" id="modifyForm">
            <div class="form-group">
              <label class="form-label" for="unit">Unit:</label>
              <select class="form-select form-select-sm" aria-label=".form-select-sm" name="unitname" id="unitname">
                <option value="notAnOption">Select unit name</option>';
        $sql = mysqli_query($con, "SELECT DISTINCT UnitName FROM CheckIn_t");
        while ($row = mysqli_fetch_assoc($sql)) {
          $unitName = $row['UnitName'];
          echo '
                <option value="' . $unitName . '">' . $unitName . '</option>';
        }
        echo '
              </select>
            </div>
            <div class="form-group" id="campsite-container">
            </div>
            <div class="form-group formbtns">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button id="clear-button" class="btn btn-primary">Clear</button>
            </div>
          </form>';
        ?>
      </div>
    </div>
  </div>
</body>