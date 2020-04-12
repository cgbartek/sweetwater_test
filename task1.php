<?php
// Task 1 - Write a report that will display the comments from the table

require "config.php";

$sql = "SELECT orderid, comments FROM sweetwater_test";
$result = $db->query($sql);

$table = [];
$table['candy'] = [];
$table['call'] = [];
$table['referred'] = [];
$table['signature'] = [];
$table['misc'] = [];

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if(stripos($row['comments'], 'candy') !== false
    || stripos($row['comments'], 'smarties') !== false) {
      $table['candy'][] = $row;
    } else if(stripos($row['comments'], 'call') !== false) {
      $table['call'][] = $row;
    } else if(stripos($row['comments'], 'referred') !== false) {
      $table['referred'][] = $row;
    } else if(stripos($row['comments'], 'signature') !== false) {
      $table['signature'][] = $row;
    } else {
      $table['misc'][] = $row;
    }
  }
} else {
  echo "No results.";
}

// Generate grouped table
?><table border="1" cellpadding="4" cellspacing="0"><?php
foreach($table as $grp_k => $grp_v) {
  foreach($grp_v as $k => $v) {?>
    <tr><td><?php echo $v['orderid'];?></td>
    <td><strong><?php echo ucwords($grp_k);?></strong></td>
    <td><?php echo $v['comments'];?></td></tr>
    <?php
  }
  ?><tr><td colspan="3">&nbsp;</td></tr><?php
}?>
<table><?php

$db->close();

 ?>
