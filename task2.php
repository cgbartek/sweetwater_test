<?php
// Task 2 - Populate the shipdate_expected field in this table with the date found in the `comments` field (where applicable)

require "config.php";

$sql = "SELECT orderid, comments, shipdate_expected FROM sweetwater_test";
$result = $db->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if(strpos($row['comments'], 'Expected Ship Date: ') !== false) {
      echo "Found Ship Date on id $row[orderid].<br>";
    }
  }
} else {
  echo "No results.";
}



$db->close();

 ?>
