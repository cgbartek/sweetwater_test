<?php
// Task 2 - Populate the shipdate_expected field in this table with the date found in the `comments` field (where applicable)

require "config.php";

$sql = "SELECT orderid, comments, shipdate_expected FROM sweetwater_test";
$result = $db->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $datepos = strpos($row['comments'], 'Expected Ship Date: ');
    $shipdate = substr($row['comments'], $datepos + 20, 9);
    if($datepos !== false) {
      echo "Found Ship Date $shipdate on id $row[orderid]... ";
      $sqldate = date("Y-m-d",strtotime($shipdate));
      $sql_update = "UPDATE sweetwater_test SET shipdate_expected='$sqldate' WHERE orderid='$row[orderid]'";
      if ($db->query($sql_update) === TRUE) {
        echo "Record updated.<br>";
      } else {
        echo "ERROR: " . $db->error . "<br>";
      }
    }
  }
} else {
  echo "No results.";
}

$db->close();
?>
