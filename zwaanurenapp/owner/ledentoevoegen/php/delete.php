<?php  

if(isset($_GET['id'])){
   include "../db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_GET['id']);


// de gegevens uit de database verwijderen van de login die door een admin verwijderd worden

   
   


	$sql = "DELETE FROM login
	        WHERE id=$id";
   $result = mysqli_query($conn, $sql);
   if ($result) {
   	  header("Location: ../read.php?success=verwijderen gelukt!");
   }else {
      header("Location: ../read.php?error=unknown error occurred&$user_data");
   }

}else {
	header("Location: ../read.php");
}