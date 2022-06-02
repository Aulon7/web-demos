<?php

//adminstratori i kyqur
$usernameID = $_SESSION['usernameID'];

//konektimi me db
require "includes/connect.php";

//query per selektimin e profesoreve per fshirje
$selectQuery = "SELECT CONCAT(pr.emri, ' ', pr.mbiemri) AS profesori, email, id
                FROM perdoruesi pr
                WHERE roli = 2";
//ekzekutimi i query-it
$selectQueryRes = mysqli_query($connect, $selectQuery);

//krijimi i tabeles per vendosjen e te dhenave rezultat
        echo "<table class='data'>
        <tr class ='data'>
                    <th class ='data'>ID</th>
                    <th class ='data'>Profesori</th>
                    <th class ='data'>E-mail</th>
                    <th class ='data'>Aksion</th>
        </tr>";

if(mysqli_num_rows($selectQueryRes) == 0) {
	echo "<tr class ='data'>
			<td class ='data' colspan = '5'>Nuk ka te dhena</td>
		</tr>";
}

while($rreshti = mysqli_fetch_array($selectQueryRes)) {
    $ID = $rreshti['id'];
	$profesori = $rreshti['profesori'];
	$email = $rreshti['email'];
	
    echo "<tr class='data'>
            <td class='data'>$ID</td>
			<td class='data'>$profesori</td>
			<td class='data'>$email</td>
			<td class='data'><a href = 'administrator/deleteProfDB.php?idProf=$ID' class='btn_reg'>Shlyej</a></td>
		</tr>";
}

echo "</table>";
?>