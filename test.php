<?php 

//maak connectie naar de database

$dbhost = "localhost";
$dbuser = "root";
$dbwachtwoord = "";
$dbnaam = "starr";

$conn = new mysqli ($dbhost, $dbuser, $dbwachtwoord, $dbnaam,);

//voegt de ingevulde gegevens naar de database

$titelvanproject =$_POST_POST['Tproduct'];
$datumstartproject = $_POST['Dstart'];
$werkproces = $_POST['Werkproces'];
$email = $_POST['Email'];
$alleenofmetmeerderegemaakt =$_POST[''];
$situatie =$_POST['Situatie'];
$taak =$_POST['Taak'];
$actie = $_POST['Actie'];
$resultaat =$_POST['Resultaat'];
$reflectie =$_POST['Reflectie'];

$sql="INSERT INTO rapportage(Titelvanproject,Datumstartproject,Werkproces,Email,Alleenofmetmeerderegemaakt,Situatie,Taak,Actie,Resultaat,Reflectie) VALUES('$titelvanproject','$datumstartproject','$werkproces','$email','$alleenofmetmeerderegemaakt','$situatie','$taak','$actie','$resultaat','$reflectie)";
$run_gry=mysqli_query($conn,$sql,);

?>