<?php

//adminstratori i kyqur
$usernameID = $_SESSION['usernameID'];

//konektimi me db
require "includes/connect.php";

//query per selektimin e lendeve per fshirjen
$selectQuery = "SELECT kodi, emri, grupetEligjeratave, grupetEushtrimeve FROM lenda";
//ekzekutimi i query-it
$selectQueryRes = mysqli_query($connect, $selectQuery);

//krijimi i tabeles per vendosjen e te dhenave rezultat
        echo "<table class='data'>
        <tr class ='data'>
                    <th class ='data'>ID</th>
                    <th class ='data'>Lenda</th>
                    <th class ='data'>Gr. e ligjeratave</th>
                    <th class ='data'>Gr. e ushtrimeve</th>
                    <th class ='data'>Aksion</th>
        </tr>";

if(mysqli_num_rows($selectQueryRes) == 0) {
	echo "<tr class ='data'>
			<td class ='data' colspan = '5'>Nuk ka te dhena</td>
		</tr>";
}

while($rreshti = mysqli_fetch_array($selectQueryRes)) {
    $Kodi = $rreshti['kodi'];
    $Lenda = $rreshti['emri'];
    $grLigj = $rreshti['grupetEligjeratave'];
    $grUsht = $rreshti['grupetEushtrimeve'];
	
    echo "<tr class='data'>
            <td class='data'>$Kodi</td>
            <td class='data'>$Lenda</td>
            <td class='data'>$grLigj</td>
			<td class='data'>$grUsht</td>
			<td class='data'><a href = 'administrator/deleteSubjectDB.php?kodiLnd=$Kodi' class='btn_reg'>Shlyej</a></td>
		</tr>";
}

echo "</table>";
?>