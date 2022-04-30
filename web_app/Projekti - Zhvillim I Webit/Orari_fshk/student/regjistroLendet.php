<?php

//konektimi
require "includes/student_connect.php";

//studenti i kyqur 
$usernameID = $_SESSION['usernameID'];

//selektimi i emrit dhe mbiemrit te studentit te kyqyr
$queryEmriStd = mysqli_query($connect, "SELECT concat(emri, ' ', mbiemri) AS studenti FROM perdoruesi WHERE id = '$usernameID'");
$rreshtiEmriStd = mysqli_fetch_assoc($queryEmriStd);
$studenti = $rreshtiEmriStd['studenti'];

//selektimi i provimeve te cilat studenti qe eshte kyq mund te i regjistroje
$querySql = "SELECT l.emri AS lenda, concat(pr.emri, ' ', pr.mbiemri) AS profesori, lgj.semestri AS semestri, pr.id AS profesorID, l.kodi AS kodiLendes
			FROM lenda l, studenti s, ligjerimet lgj, perdoruesi pr
			WHERE s.id = '$usernameID' AND l.kodi = lgj.lenda AND lgj.semestri = s.semestri  AND pr.id = lgj.profesori";
//ekzekutojme query-in paraprak
$queryRes = mysqli_query($connect, $querySql);

//krijojme tabelen ku do te vendosim te dhenat
echo "<table class='data'>
	<form action = 'student/regjistroLendetDB.php' method = 'GET'>
			<tr class = 'exams'>
				<th class='data'>Student</th>
				<th class='data'>Lenda</th>
				<th class='data'>Profesor</th>
				<th class='data'>Aksion</th>
			</tr>";

if(mysqli_num_rows($queryRes) == 0) {
	echo "<tr class='data'>
			<td class='data' colspan='4'>Nuk ka te dhena</td>
		</tr>";
}
			
while($row = mysqli_fetch_assoc($queryRes)) {
	
	//i vendosim rezultatet ne tabele ne HTML
	
	$lenda = $row['lenda'];
	$profesori = $row['profesori'];
	$semestri = $row['semestri'];
	$kodiLendes = $row['kodiLendes'];
	$profesorID = $row['profesorID'];

	echo "<tr class='data'>
			<td class='data'>$studenti</td>
			<td class='data'>$lenda</td>
			<td class='data'>$profesori</td>";
				
	//nese studenti e ka regjistruar ndonjeren nga lendet atehere te mos paraqitet butoni Regjistro
	$sqlQueryReg = "SELECT * FROM rezultatet 
					WHERE studenti = '$usernameID' AND profesori = '$profesorID' 
						AND lenda = '$kodiLendes' AND semestri = '$semestri'";

	$queryReg = mysqli_query($connect, $sqlQueryReg);
	$countReg = mysqli_num_rows($queryReg);
	
	//nese nuk e ka asnje lende te regjistruar atehere mund ti paraqitet butoni Regjistro
	if($countReg == 0) {
		echo "<td class='data'><a href = 'student/regjistroLendetDB.php?idStudent=$usernameID&idProfesor=$profesorID&kodiLendes=$kodiLendes&semestri=$semestri' class='btn_reg'>Regjistro</a></td>";
	}
	
	echo "</tr>";
}

echo "</form>
	</table>";

?>