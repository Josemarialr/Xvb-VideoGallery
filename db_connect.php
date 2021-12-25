<?php
/* Database connection start */
$servername = "localhost";
$username = "restaurant3";
$password = "restaurant3";
$dbname = "restaurant3";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>