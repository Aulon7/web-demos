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
    <h1>Forma për kyçje</h1>
</div>  
<?php	
        //variablat qe shfaqin errorret e mundshme gjate kycjes
		$errorGen = $errorUsername = $errorPassword = "";
		$username = "";
					
		if($_SERVER['REQUEST_METHOD'] == "POST") {
					
        include "includes/loginValidate.php";
        
		}?>
<div class="form-content login">
                <img src="includes/imazhet/user_icon.png" class="avatar login">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                    <input type="text" name="username" value="<?php echo $username;?>" placeholder="Shënoni username-in">
                    <p><?php echo "<p>$errorUsername</p>";?>
                    <input type="password" name="password" placeholder="Shënoni fjalëkalimin"> 
                    <p><?php echo "<p>$errorPassword</p>";?></p>
                    <p><?php echo "<p>$errorGen</p>";?></p>
                    <input type="submit" name="login" value="Kyçu">
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