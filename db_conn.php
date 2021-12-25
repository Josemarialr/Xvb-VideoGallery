<?php  

$sname = "localhost";
$uname = "restaurant3";
$password = "restaurant3";

$db_name = "restaurant3";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection Failed!";
	exit();
}