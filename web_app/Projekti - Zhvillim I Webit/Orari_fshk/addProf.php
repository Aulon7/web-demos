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
    <h1>Regjistro Profesorin</h1>
</div>          
                <?php	
					//variablat qe shfaqin errorret e mundshme gjate regjistrimit
					$errorGen = $errorFirstname = $errorLastname = $errorEmail = $errorEmail = $errorID = $errorID = $errorID = $errorPassword = $errorPassword = "";
					
					//variablat te cilat do te ruajn vlerat e dhena ne inputs para se te insertohet ne databaze
					$firstname = $lastname = $email = $id = $password = "";
					
					if($_SERVER['REQUEST_METHOD'] == 'POST') {
						
						include 'administrator/profValidate.php';
					}
                ?>
                <div class="form-content add">
                    <img src="includes/imazhet/proficon.png" class="avatar login">
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                        <input type="text" name="id"  placeholder="Shënoni një ID" value="<?php echo $id;?>">
                        <p><?php echo "<p>$errorID</p>";?>
                        <input type="text" name="firstname"  placeholder="Shënoni një emër" value="<?php echo $firstname;?>">
                        <p><?php echo "<p>$errorFirstname</p>";?>
                        <input type="text" name="lastname"  placeholder="Shënoni një mbiemër" value="<?php echo $lastname;?>">
                        <p><?php echo "<p>$errorLastname</p>";?>
                        <input type="text" name="email"  placeholder="Shënoni një email" value="<?php echo $email;?>">
                        <p><?php echo "<p>$errorEmail</p>";?>
                        <input type="password" name="password" placeholder="Shënoni një fjalëkalim" value="<?php echo $password;?>">
                        <p><?php echo "<p>$errorPassword</p>";?>
                        <p><?php echo "<p>$errorGen</p>";?>
                        <input type="submit" name="insert" value="Shto">
                </form>
</div>
</section>
<?php include "includes/footer.php";?>
</body>
</html>
