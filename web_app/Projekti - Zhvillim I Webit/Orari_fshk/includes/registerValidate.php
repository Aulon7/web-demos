<?php

//konektimi me db - i nevojshem per te vazhduar me manipulimin e te dhenave ne db
require "includes/connect.php";

//marrja e te dhenave te formes me POST
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$id = $_POST['id'];
$password = $_POST['password'];

//deshirojme te shikojme nese ekziston nje perdorues me email-in dhe id-ne e shenuar ne HTML formen
$queryID = mysqli_query($connect, "SELECT id FROM perdoruesi WHERE id='$id'");
$countID = @mysqli_num_rows($queryID);
$queryEmail = mysqli_query($connect, "SELECT email FROM perdoruesi WHERE email='$email'");
$countEmail = @mysqli_num_rows($queryEmail);
$register = true;


//nese asnjera nga fushat e formes nuk eshte e plotesuar
if(empty($firstname) && empty($lastname) && empty($email) && empty($id) && empty($password)) {
	$errorGen = "Të gjitha fushat duhet plotësuar!";
	$register = false;
}

else {
	//nese fusha e emrit eshte e zbrazet
	if(empty($firstname)) {
		$errorFirstname = "Ju lutem plotësojeni fushën e emrit";
		$register = false;
	}
	
	
	//nese fusha e mbiemrit eshte e zbrazet
	if(empty($lastname)) {
		$errorLastname = "Ju lutem plotësojeni fushën e mbiemrit";
		$register = false;
	}
	
	//nese fusha e email adreses eshte e zbrazet
	if(empty($email)) {
		$errorEmail = "Ju lutem plotësojeni fushën e emailit";
		$register = false;
	}
	
	//nese perdoruesi me kete email eshte i regjistruar akutalisht atehere
	else {
               //nese formati i emailit nuk eshte valid p.sh @uni-prizren.com
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errorEmail = "Formati i email duhet të jetë valid!";
			$register = false;
		}
		    else if ($countEmail != 0) {
			$errorEmail = "Ky email tashmë ekziston!";
			$register = false;
            }
        }
	
	//nese fusha e id-se eshte e zbrazet
	if(empty($id)) {
		$errorID = "Ju lutem plotësojeni fushën e ID-së";
		$register = false;
	}
	
	else {
		//nese id permban edhe karaktere tjera jo-numra
		if(!is_numeric($id)) {
			$errorID = "Numri i ID-së duhet të përmbajë vetëm numra!";
			$register = false;
		}
	
		//nese ekziston nje perdorues qe e ka kete id 
		else if($countID != 0) {
			$errorID = "Përdoruesi egziston!";
			$register = false;
		}
	}
	
	//nese fusha e fjalekalimit eshte e zbrazet
	if(empty($password)) {
		$errorPassword = "Ju lutem plotësojeni fushën e fjalëkalimit";
		$register = false;
	}
	
	//nese fusha e fjalekalimit permban me pak se 8 karaktere
	else {
		if(strlen($password) < 8) {
			$errorPassword = "Fjalëkalim është i dobët";
			$register = false;
	}
}
	//nese asnje gabim nuk ka ndodh gjate validimit pra nuk eshte shfaqe asnje error ateher fillon insertimi i vlerave ne databaze
	if($register == true) {
		
		//dataReg variabla me funksionin e gatshem date(), vendos daten ne momentin kur nje student tenton te regjistrohet
		$dataReg = date("Y-m-d");

		//insertimi ne db	
		$querysql = "INSERT INTO perdoruesi 
			(id, emri, mbiemri, email, fjalekalimi, roli) 
			VALUES ('$id', '$firstname', '$lastname', '$email', md5('$password'), 3);";
		$querysql .= "INSERT INTO studenti
			(id, vitiRegjistrimit,semestri)
			VALUES ('$id', '$dataReg', 1);";
		
		if (mysqli_multi_query($connect, $querysql)) {
			echo '<script type="text/javascript">
			alert("Jeni regjistruar me sukses!");
			   location="login.php";
				 </script>';  
            }
		else {
			echo '<script>alert("Ka ndodh një gabim në insertim")</script>';
		}
	}
}
?>