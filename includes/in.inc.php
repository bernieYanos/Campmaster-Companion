<?php
if ($inExists > 0) {
  $sql = "SELECT UnitName, Council, Campsite, Checkout, Roster, Sched, Paid, Inventory, Archery, Shotgun FROM CheckIn_t WHERE Checkout IS NOT NULL ORDER BY Checkout ASC";
  $result = mysqli_query($con, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    $unitIn = $row['UnitName'];
    $councilIn = $row['Council'];
    $campsiteIn = $row['Campsite'];
    $checkoutIn = $row['Checkout'];
    $rosterIn = $row['Roster'] ? "Yes" : "No";
    $schedIn = $row['Sched'] ? "Yes" : "No";
    $paidIn = $row['Paid'] ? "Yes" : "No";
    $inventoryIn = $row['Inventory'] ? "Yes" : "No";
    $archeryIn = $row['Archery'];
    $shotgunIn = $row['Shotgun'];

    $checkoutIn = date_create($checkoutIn);

    echo '
    <tr>
      <td class="ps-0">' . $unitIn . '</td>
      <td>' . $councilIn . '</td>
      <td>' . $campsiteIn . '</td>
      <td class="text-center">' . date_format($checkoutIn, "g:i") . '</td>
      <td class="text-center">' . $rosterIn . '</td>
      <td class="text-center">' . $schedIn . '</td>
      <td class="text-center">' . $paidIn . '</td>
      <td class="text-center">' . $inventoryIn . '</td>
      <td class="text-center">' . $archeryIn . '</td>
      <td class="text-center">' . $shotgunIn . '</td>
    </tr>';
  }
}
