<?php
// Task 1 - Write a report that will display the comments from the table

require "config.php";

$sql = "SELECT orderid, comments FROM sweetwater_test";
$result = $db->query($sql);

$candy = [];
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if(stripos($row['comments'], 'candy') !== false || stripos($row['comments'], 'smarties') !== false) {
      $candy[] = $row;
    } else if(stripos($row['comments'], 'call') !== false) {
      $call[] = $row;
    } else if(stripos($row['comments'], 'referred') !== false) {
      $referred[] = $row;
    } else if(stripos($row['comments'], 'signature') !== false) {
      $signature[] = $row;
    } else {
      $misc[] = $row;
    }
    //echo "id: " . $row['orderid']. " - comments: " . $row['comments'] . "<br>";
  }
} else {
  echo "No results.";
}

echo '<pre>';
print_r($candy);
echo '</pre>';

$db->close();

 ?>
