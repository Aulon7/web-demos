<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="forma.css">
    <title>FSHK - Orari</title>
</head>
<body>
<?php include "includes/navbar.php";?>
<?php include "includes/header.php";?>
<section class="main-section">
<div> 
    <h1>Regjistro Lëndën</h1>
</div>          
                <?php	
					//variablat qe shfaqin errorret e mundshme gjate regjistrimit
					$errorGen = $errorSubname = $errorSubname = $errorLigj = $errorUsht = $errorNrStd = $errorNrStd =$errorID = $errorID = $errorID = "";
					
					//variablat te cilat do te ruajn vlerat e dhena ne fushat e inputeve para se te insertohet ne databaze 
					$kodi = $subname = $grligj = $grusht = $nrstd = "";
					
					if($_SERVER['REQUEST_METHOD'] == 'POST') {
						
						include 'administrator/subjectValidate.php';
					}
                ?>
                <div class="form-content add">
                    <img src="includes/imazhet/bookicon.png" class="avatar login">
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                        <input type="text" name="kodi"  placeholder="Shënoni ID e lëndës" value="<?php echo $kodi;?>">
                        <p><?php echo "<p>$errorID</p>";?>
                        <input type="text" name="subname" placeholder="Shënoni emrin e lëndës" value="<?php echo $subname;?>">
                        <p><?php echo "<p>$errorSubname</p>";?>
                        <input type="number" name="grligj" min="1" max="4" placeholder="Shënoni numrin e grupeve të ligj." value="<?php echo $grligj;?>">
                        <p><?php echo "<p>$errorLigj</p>";?>
                        <input type="number" name="grusht"min="1" max="4" placeholder="Shënoni numrin e grupeve të usht." value="<?php echo $grusht;?>">
                        <p><?php echo "<p>$errorUsht</p>";?>
                        <input type="number" name="nrstd" min="1" max="60" placeholder="Shënoni numrin e studenteve" value="<?php echo $nrstd;?>">
                        <p><?php echo "<p>$errorNrStd</p>";?>
                        <p><?php echo "<p>$errorGen</p>";?>
                        <input type="submit" name="insert" value="Shto">
                </form>
</div>
</section>
<?php include "includes/footer.php";?>
</body>
</html>