<?php

//konekto me db
require "includes/connect.php";

//profesori i kyqur 
$usernameID = $_SESSION['usernameID'];

//selektojme lendet perkatese te profesorit te kycur ne sistem
$querySql = "SELECT CONCAT(pr.emri, ' ', pr.mbiemri) AS profesori, l.emri as lenda , lgj.semestri as semestri 
                FROM perdoruesi pr, profesori p, ligjerimet lgj, lenda l 
                WHERE p.id = $usernameID AND l.kodi = lgj.lenda AND pr.id = lgj.profesori AND pr.id = p.id";
$queryRes = mysqli_query($connect, $querySql);

echo "<table class='data'>
	<tr class ='data'>
                <th class ='data'>Profesori</th>
                <th class ='data'>Lenda</th>
                <th class ='data'>Semestri</th>
	</tr>";
while ($row = mysqli_fetch_assoc($queryRes)) {

$profesori = $row['profesori'];
$lenda = $row['lenda'];
$semestri = $row['semestri'];
    echo "<tr class='data'>
            <td class='data'>$profesori</td>
            <td class='data'>$lenda</td>
            <td class='data'>$semestri</td>";
    echo "</tr>";
}
    echo "</table>";
?>     