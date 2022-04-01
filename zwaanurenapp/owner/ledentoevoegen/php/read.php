<?php  

//leest gegevens van de database

include "db_conn.php";

$sql = "SELECT * FROM login ORDER BY id DESC";
$result = mysqli_query($conn, $sql);