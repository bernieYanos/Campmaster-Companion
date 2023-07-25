<?php
if ($outExists > 0) {
  $sql = "SELECT UnitName, Council, Campsite FROM CheckIn_t WHERE Checkout IS NULL";
  $result = mysqli_query($con, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    $unit = $row['UnitName'];
    $council = $row['Council'];
    $campsite = $row['Campsite'];
    echo '
    <tr>
      <td class="ps-5">' . $unit . '</td>
      <td>' . $council . '</td>
      <td>' . $campsite . '</td>
    </tr>';
  }
}
