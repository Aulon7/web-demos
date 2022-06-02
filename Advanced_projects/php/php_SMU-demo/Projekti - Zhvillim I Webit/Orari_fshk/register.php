<?php

session_start();

if(!isset($_SESSION['usernameID'])) {

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
    <h1>Forma për regjistrim</h1>
</div>     
            <?php	
					//variablat qe shfaqin errorret e mundshme gjate regjistrimit
					$errorGen = $errorFirstname = $errorLastname = $errorEmail = $errorEmail = $errorEmail = $errorID = $errorID = $errorID = $errorPassword = $errorPassword = "";
					
					//variablat te cilat do te ruajn vlerat e dhena ne fushat e inputeve para se te behet insertimi ne databaz
					$firstname = $lastname = $email = $id = $password = "";
					
		
					if($_SERVER['REQUEST_METHOD'] == 'POST') {
						
						include 'includes/registerValidate.php';
					}
                ?>
            <div class="form-content register">
                <img src="includes/imazhet/user_icon.png" class="avatar">
                <form action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
                    <input type="text" name="firstname" placeholder="Emri juaj" value="<?php echo $firstname;?>">
                    <p><?php echo "<p>$errorFirstname</p>";?>
                    <input type="text" name="lastname" placeholder="Mbiemri juaj" value="<?php echo $lastname;?>">
                    <p><?php echo "<p>$errorLastname</p>";?>
                    <input type="text" name="email" placeholder="E-maili juaj" value="<?php echo $email;?>">
                    <p><?php echo "<p>$errorEmail</p>";?>
                    <input type="text" name="id" placeholder="ID" value="<?php echo $id;?>">
                    <p><?php echo "<p>$errorID</p>";?>
                    <input type="password" name="password" placeholder="Fjalëkalimi juaj" value="<?php echo $password;?>">
                    <p><?php echo "<p>$errorPassword</p>";?> 
                    <p><?php echo "<p>$errorGen</p>";?> 
                    <input type="submit" name="register" value="Regjistrohu">
                </form>
</div>
</section>
<?php include "includes/footer.php";?>
</body>
</html>
<?php
}
else {
	header("Location: home.php");
}?>