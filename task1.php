<?php
// Task 1 - Write a report that will display the comments from the table

require "config.php";

$sql = "SELECT orderid, comments FROM sweetwater_test";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row['orderid']. " - comments: " . $row['comments'] . "<br>";
    }
} else {
    echo "No results.";
}
$conn->close();

 ?>
