<?php

require "includes/connect.php";

//marrja e te dhenave me metoden POST
$username = $_POST['username'];
$password = $_POST['password'];

//variabla login eshte e tipit boolean dhe permes kesaj do pamundesohet kycja nese paraqitet ndonje nga erroret
$login = true;

  //nese asnje nga fushat nuk jane plotesuar
if(empty($username) && empty($password)) {
	$errorGen = "Të gjitha fushat duhet plotësuar!";
	$login = false;
}

else {
	//nese username eshte i zbrazet
	if(empty($username)) {
		$errorUsername = "Ju lutem plotësojeni fushën e username";
		$login = false;
	}

	else {
		//kontrollon nese perdoruesi ekziston paraprakisht ne databaze
		$query1 = "SELECT id FROM perdoruesi WHERE id = '$username';";
		$query1Res = mysqli_query($connect, $query1);
		$count1 = mysqli_num_rows($query1Res);
		if($count1 == 0) {
			$errorUsername = "Ky username nuk egziston";
			$login = false;
		}
	}
	
	//nese fusha passwordit eshte e zbrazet
	if(empty($password)) {
		$errorPassword = "Ju lutem plotësojeni fushën e fjalëkalimit";
		$login = false;
	}

	else {
		//kontrollon nese fjalekalimi per ate perdorues eshte i sakte
		$password1 = md5($password);
		$query2 = "SELECT fjalekalimi FROM perdoruesi WHERE id = '$username';";
		$query2Res = mysqli_query($connect, $query2);
		$passwordRow = mysqli_fetch_array($query2Res);
		$passwordDB = $passwordRow['fjalekalimi'];
		
		if($passwordDB != $password1) {
			$errorPassword = "Fjalëkalimi nuk është i saktë!";
			$login = false;
		}
	}
	
	//nese ska asnje gabim, kyce ne sistem perdoruesin
	if($login) {
		
		$_SESSION['usernameID'] = $username;
		
		$query3 = "SELECT roli FROM perdoruesi WHERE id = '$username';";
		$query3Res = mysqli_query($connect, $query3);
		$query3Row = mysqli_fetch_array($query3Res);
		$roli = $query3Row['roli'];
		
		// nese eshte kyc atehere merret parsysh edhe roli i tij dhe vendoset ne sesion
		$_SESSION['roli'] = $roli;
		
		header("Location: home.php");
	}
}
?>