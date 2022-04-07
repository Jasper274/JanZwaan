<?php

require '../database.php';


//ophalen gegevens database

$username = $_POST["loginUser"];
$password = $_POST["loginPassword"];


$sql = "SELECT * FROM login WHERE email='$username'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1)
{
  $row = mysqli_fetch_assoc($result);
 
  if (password_verify($password ,$row["pw"])){
  //  die('De verficatie van wachtwoord gaat goed'. $row["Rol"]);
    if($row["Rol"]=="werknemer")
    {
        header("location:../medewerker/ureninvullen/indexuren.html");
      }
      
      if($row["Rol"]=="owner")
     {
     
      header("location:../owner/owner.html");
      
      }
      
  }
  else {
    header("location:../index.html");
    //die('Het wachtwoord heb ingetyped komt niet over heen met het wachtwoord wat in de databse staat'. $row["Rol"]);
  }



}//einde number of rows

#|--------------------------------------------------------|#
#|-wanneer wachtwoord goed -|#
#|--------------------------------------------------------|#
 

// } else{
   echo "<script>location.replace('/zwaanurenapp/login/logintest.html')</script>";
   echo "<script>alert('login succesfull')</script>";
    
#|--------------------------------------------------------|#
#|-wanneer wachtwoord fout -|#
#|--------------------------------------------------------|#
//if (!$row = mysqli_fetch_assoc($result)) {
 //header("location:../index.html");
  //echo "<script>alert('gebruikersnaam of wachtwoord is fout')</script>";
  
  
  
 //$row1= mysqli_fetch_array($result);
  
   // if($row["Rol"]=="werknemer")
  //  {
       //   header("location:../medewerker/mw.html");
    //  }
  
    //  if($row["Rol"]=="owner")
   //  {
    //    header("location:../owner/owner.html");
   //   }

   //   if (!$row = mysqli_fetch_assoc($result)) {
//header("location:../index.html");
   //   echo "<script>alert('gebruikersnaam of wachtwoord is fout')</script>";
   // }
  ?>