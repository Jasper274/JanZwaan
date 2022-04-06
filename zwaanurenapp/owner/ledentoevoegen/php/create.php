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
	$hpw =  validate($_POST['hpw']);

	$user_data = 'name='.$name. '&'. 'email='.$email;

$dubbel = mysqli_query($conn, "select email from login where email='$email'");


// de errors die worden weergeven als je niks invuld bij naam, wachtwoord en email of als de mail al ingebruik is
	

	 if (empty($name)) {
		header("Location: ../index.php?error=Uw naam is ongeldig!&$user_data");
	}else if (empty($email)) {
		header("Location: ../index.php?error=Uw email is ongeldig!&$user_data");
	}else if (empty($hpw))  {
		header("location: ../index.php?error=Uw wachtwoord is ongeldig!&$user_data");
	}else if(mysqli_num_rows($dubbel)> 0) {
			header("Location: ../index.php?error=Dit email bestaat al!&$user_data");
	}else if (empty($pw)) {
		header("Location: ../index.php?error=Uw password is ongeldig!&$user_data");
	}else if ($pw != $hpw) {
		header("location:../index.php?error=Wachtwoorden komen niet over heen!&$user_data");
	}else{
// in dien geen errors dan de gegevens sturen naar de database en de wachtwoord hashen
		$hased_wachtwoord = password_hash($pw, PASSWORD_DEFAULT);
		$sql="INSERT INTO login(name, email, pw) VALUES('$name','$email','$hased_wachtwoord')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			header("Location: ../read.php?success=Account aangemaakt!");
		}else {
			header("Location: ../index.php?error=unknown error occurred&$user_data");
		}
	}

}