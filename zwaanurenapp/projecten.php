<?php

require 'database.php';

$projectnaam = $_POST["projectnaam"];
$klantnaam = $_POST["klantnaam"];

$dubbel = mysqli_query($conn, "select projectnaam from projecten where projectnaam='$projectnaam'");

if(mysqli_num_rows($dubbel)> 0) {

    echo "<script>location.replace('/JanZwaan/JanZwaan/zwaanurenapp/projectentoevoegen.html')</script>";
    echo "<script>alert('Dit project bestaat al')</script>";
}
else{

    $sql="INSERT INTO projecten(Projectnaam) VALUES('$projectnaam')";
    $run_gry=mysqli_query($conn,$sql,);
}

?>