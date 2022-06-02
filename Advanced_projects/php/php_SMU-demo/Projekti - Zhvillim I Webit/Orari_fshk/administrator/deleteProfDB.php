<?php

session_start();

$ID = $_GET['idProf'];

require "../includes/connect.php";

//query per fshirjen e profesorit perkates
$deleteQuery = "DELETE perdoruesi, profesori
                FROM perdoruesi
                INNER JOIN profesori ON perdoruesi.id = profesori.id
                WHERE perdoruesi.id = '$ID';";

//ekzekutimi i query-it per fshirjen
mysqli_query($connect, $deleteQuery);

header("Location: ../profList.php");
?>
