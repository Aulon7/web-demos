<?php

//konektimi me db - i nevojshem per te vazhduar me manipulimin e te dhenave ne db
require "includes/connect.php";

//marrja e te dhenave te formes me POST
$kodi = $_POST['kodi'];
$subname = $_POST['subname'];
$grligj = $_POST['grligj'];
$grusht = $_POST['grusht'];
$nrstd = $_POST['nrstd'];

//deshirojme te shikojme nese ekziston nje perdorues me email-in dhe id-ne e shenuar ne HTML formen
$queryID = mysqli_query($connect, "SELECT kodi FROM lenda WHERE kodi='$kodi'");
$countID = @mysqli_num_rows($queryID);
$querySubname= mysqli_query($connect, "SELECT emri FROM lenda WHERE emri='$subname'");
$countSubname = @mysqli_num_rows($querySubname);
$register = true;

//nese asnjera nga fushat e formes nuk eshte e plotesuar
if(empty($kodi) && empty($subname) && empty($grligj) && empty($grusht) && empty($nrstd)) {
	$errorGen = "Të gjitha fushat duhet plotësuar!";
	$register = false;
}

else {

    //nese fusha e id-se eshte e zbrazet
	if(empty($kodi)) {
		$errorID = "Ju lutem plotësojeni fushën e ID-së";
		$register = false;
	}
	
	else {
		//nese id permban edhe karaktere tjera jo-numra
		if(!is_numeric($kodi)) {
			$errorID = "Numri i ID-së duhet të përmbajë vetëm numra!";
			$register = false;
		}
	
		//nese ekziston nje lende qe e ka kete id 
		else if($countID != 0) {
			$errorID = "Lënda me kete ID egziston!";
			$register = false;
		}
	}
	//nese fusha e emrit eshte e zbrazet
	if(empty($subname)) {
		$errorSubname= "Ju lutem plotësojeni fushën e emrit";
		$register = false;
	}
	
	//nese ekziston nje lende qe e ka kete emer
	else {
	      if($countSubname != 0) {
		$errorSubname = "Lënda me kete emer egziston!";
		$register = false;
	   }
	}
	//nese fusha e grupit te ligjeratave eshte e zbrazt
	if(empty($grligj)) {
		$errorLigj = "Ju lutem plotësojeni fushën";
		$register = false;
	}
	
	if(empty($grusht)) {
		$errorUsht = "Ju lutem plotësojeni fushën";
		$register = false;
	}
	
    if(empty($nrstd)) {
	$errorNrStd = "Ju lutem plotësojeni fushën";
	$register = false;
    }

	//nese asnje gabim nuk ka ndodh dhe nuk eshte paraqit ndonje nga erroret atehere fillon regjistrimi ne databaze
	if($register == true) {
		
		$querysql = "INSERT INTO lenda
			(kodi, emri, grupetEligjeratave, grupetEushtrimeve, numriStudenteve) 
			VALUES ('$kodi', '$subname', '$grligj', '$grusht', '$nrstd');";
		
		if (mysqli_query($connect, $querysql)) {
			echo '<script type="text/javascript">
			alert("Lenda u regjistrua me sukses");
			   location="addSubject.php";
				 </script>';  
            }
		else {
			echo '<script>alert("Ka ndodh një gabim në insertim")</script>';
		}
	}
}
?>