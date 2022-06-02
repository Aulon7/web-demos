<?php

//konekto me db
require "includes/student_connect.php";

//studenti i kycur
$usernameID = $_SESSION['usernameID'];

//selektimi i lendeve per paraqitjen e orarit per semestrin aktual ne te cilen studenti eshte i regjistruar
        $querySql = "SELECT d.pershkrimi as dita, l.emri as lenda, CONCAT(pr.emri, ' ', pr.mbiemri) AS profesori, 
        CONCAT (k.fillimiOres, ' - ', k.mbarimiOres) AS kohezgjatja, lgj.semestri as semestri 
        FROM lenda l, studenti s, ligjerimet lgj, perdoruesi pr, kohezgjatja k, dita d 
        WHERE s.id = $usernameID AND l.kodi = lgj.lenda AND lgj.semestri = s.semestri 
        AND pr.id = lgj.profesori AND d.id = lgj.dita and k.id = lgj.kohezgjatja";
        $queryRes = mysqli_query($connect, $querySql);

echo "<table class='data'>
	<tr class ='data'>
                <th class ='data'>Dita</th>
                <th class ='data'>Lenda</th>
                <th class ='data'>Profesori</th>
                <th class ='data'>Kohezgjatja</th>
                <th class ='data'>Semestri</th>
	</tr>";
while ($row = mysqli_fetch_assoc($queryRes)) {

$dita = $row['dita'];
$lenda = $row['lenda'];
$profesori = $row['profesori'];
$kohezgjatja = $row['kohezgjatja'];
$semestri = $row['semestri'];
    echo "<tr class='data'>
            <td class='data'>$dita</td>
            <td class='data'>$lenda</td>
            <td class='data'>$profesori</td>
            <td class='data'>$kohezgjatja</td>
            <td class='data'>$semestri</td>";

    echo "</tr>";
}
    echo "</table>";
?>     
