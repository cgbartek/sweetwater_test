<?php
// DB Configuration

$server = "localhost";
$username = "root";
$password = "usbw";
$dbname = "sweetwater_test";

$db = new mysqli($server, $username, $password, $dbname);

if ($db->connect_error) {
    die("DB connect failed: " . $db->connect_error);
}

?>
