<?php
include 'includes/connect.inc.php';

$sql = mysqli_query(
  $con,
  "SELECT * FROM CheckIn_t"
);
$exists = mysqli_num_rows($sql);

if ($exists > 0) {
  $sql = "SELECT UnitID, UnitName, Council, Campsite FROM CheckIn_t";
  $result = mysqli_query($con, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $unitID = $row['UnitID'];
    $unit = $row['UnitName'];
    $council = $row['Council'];
    $campsite = $row['Campsite'];
    echo '<select class="form-select form-select-sm" aria-label=".form-select-sm" name="campsite" id="campsite">
            <option value="notAnOption">Select campsite</option>
            <option value="' . $campsite . '">' . $campsite . ' - ' . $unit . ' - ' . $council . '</option>
          </select>';
  }
}
