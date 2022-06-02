<?php

session_start();

if(isset($_SESSION['usernameID'])) {

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
    <div class="semestri 1">
        <h1>Orari i ligjëratave për Semestrin e parë</h1>
        <?php require "administrator/orariLigjeratave1.php";?>
    </div>
    <div class="semestri 2">
        <h1>Orari i ligjëratave për Semestrin e dytë</h1>
        <?php require "administrator/orariLigjeratave2.php";?>
     </div>
     <div class="semestri 3">
        <h1>Orari i ligjëratave për Semestrin e tretë</h1>
        <?php require "administrator/orariLigjeratave3.php";?>
     </div>
     <div class="semestri 4">
        <h1>Orari i ligjëratave për Semestrin e katërt</h1>
        <?php require "administrator/orariLigjeratave4.php";?>
     </div>
     <div class="semestri 5">
        <h1>Orari i ligjëratave për Semestrin e pestë</h1>
        <?php require "administrator/orariLigjeratave5.php";?>
     </div>
     <div class="semestri 6">
        <h1>Orari i ligjëratave për Semestrin e gjashtë</h1>
        <?php require "administrator/orariLigjeratave6.php";?>
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