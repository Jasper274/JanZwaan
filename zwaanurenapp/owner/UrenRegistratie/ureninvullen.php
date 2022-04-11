<?php
$dbhost = "localhost";
$dbuser = "root";
$dbwachtwoord = "";
$dbnaam = "zwaanwerken";

$conn = new mysqli ($dbhost, $dbuser, $dbwachtwoord, $dbnaam,);


        $begintijd=$_POST['timeStart'];
        $eindtijd=$_POST['timeEnd'];
        $pauze=$_POST['timeBreak'];
        $werkdag=$_POST['dagen'];
        $projecten=$_POST['project'];

        $sql="INSERT INTO uren(begintijd,eindtijd,pauze,werkdag,projecten) VALUES('$begintijd','$eindtijd','$pauze','$werkdag','$projecten')";
        $sql2="SELECT FROM projecten(projectnaam)";        

        $run_gry=mysqli_query($conn,$sql,);
     

    ?>