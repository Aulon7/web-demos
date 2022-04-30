<?php

session_start();

$Kodi = $_GET['kodiLnd'];

require "../includes/connect.php";

//query per fshirjen e profesorit perkates
$deleteQuery = "DELETE FROM  lenda WHERE kodi = '$Kodi';";

//ekzekutimi i query-it per fshirjen
mysqli_query($connect, $deleteQuery);

header("Location: ../subjectList.php");
?>
