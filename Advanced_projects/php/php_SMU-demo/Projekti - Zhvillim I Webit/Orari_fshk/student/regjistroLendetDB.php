<?php

session_start();

//nese eshte klikuar butoni Regjistro per ndonje lende te caktuar ekzekutohet kodi ne vazhdim
if(isset($_SESSION['usernameID']) && isset($_GET['idProfesor']) && isset($_GET['kodiLendes']) && isset($_GET['semestri'])) {
	
	//marrja e te dhenave permes metodes GET
	$idStudent = $_GET['idStudent'];
	$idProfesor = $_GET['idProfesor'];
	$kodiLendes = $_GET['kodiLendes'];
	$semestri = $_GET['semestri'];
	
	//konektimi me databaze
	require "../includes/student_connect.php";
	
	//query qe ben insertimin e nje rreshti te ri ne tabelen rezultatet
	$insertQuery = "INSERT INTO rezultatet (lenda, profesori,semestri, studenti, regjistruar)
					VALUES ('$kodiLendes', '$idProfesor', '$semestri', '$idStudent', 'Po');";
	
	//ekzekutimi i query-it per insertim ne databaze
	mysqli_query($connect, $insertQuery);
	
}

//ridrejtimi ne faqen registerSubjects.php
header("Location: ../registerSubjects.php");
?>