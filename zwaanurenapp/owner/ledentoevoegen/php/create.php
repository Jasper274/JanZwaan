<?php 

if (isset($_POST['create'])) {
	include "../db_conn.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$name = validate($_POST['name']);
	$email = validate($_POST['email']);
	$pw = validate($_POST['pw']);

	$user_data = 'name='.$name. 'email='.$email;


// de errors die worden weergeven als je niks invuld bij naam, wachtwoord en email


	if (empty($name)) {
		header("Location: ../index.php?error=uw naam is ongeldig&$user_data");
	}else if (empty($email)) {
		header("Location: ../index.php?error=uw email is ongeldig&$user_data");
	}else if (empty($pw)) {
		header("Location: ../index.php?error=uw password is ongeldig&$user_data");
	}else {


// de gegevens sturen naar de database


$hased_wachtwoord = password_hash($pw, PASSWORD_DEFAULT);

$sql="INSERT INTO login(name, email, pw) VALUES('$name','$email','$hased_wachtwoord')";

       //$sql = "INSERT INTO login(name, email, pw) 
               //VALUES('$name', '$email', '$pw')";
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: ../read.php?success=account aangemaakt!");
       }else {
          header("Location: ../index.php?error=unknown error occurred&$user_data");
       }
	}

}