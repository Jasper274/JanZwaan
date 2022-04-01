<?php 

if (isset($_GET['id'])) {
	include "db_conn.php";

	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_GET['id']);

	$sql = "SELECT * FROM login WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);
    }else {
    	header("Location: read.php");
    }


}else if(isset($_POST['update'])){
    include "../db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$name = validate($_POST['name']);
	$pw = validate($_POST['pw']);
	$email = validate($_POST['email']);
	$id = validate($_POST['id']);

        

        //eror voor als de gegevens verkeerd zijn ingevud
        $dubbel = mysqli_query($conn, "select email from login where email='$email'");
	if (empty($name)) {
		header("Location: ../index.php?error=Uw naam is ongeldig&$user_data");
	}else if (empty($email)) {
		header("Location: ../index.php?error=Uw email is ongeldig&$user_data");
	}else if(mysqli_num_rows($dubbel)> 0) {
			header("Location: ../index.php?error=Dit email bestaat al&$user_data");
	}else if (empty($pw)) {
		header("Location: ../index.php?error=Uw password is ongeldig&$user_data");
	}else{


//gebruiker gegevens updaten die door een admin worden aangepast 

$hased_wachtwoord = password_hash($pw, PASSWORD_DEFAULT);


       $sql = "UPDATE login
               SET name='$name', email='$email', pw='$hased_wachtwoord'
               WHERE id=$id ";
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: ../read.php?success=successfully updated");
       }else {
          header("Location: ../update.php?id=$id&error=unknown error occurred&$user_data");
       }
	}
}else {
	header("Location: read.php");
}