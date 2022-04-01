<?php  


//maakt connectie naar de database 


$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "zwaanwerken";

$conn  = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}