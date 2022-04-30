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
<h1 style="font-size:40px;margin-top:-30px;"> Mirë se erdhët</h1>
</section>
<?php include "includes/footer.php";?>
</body>
</html>
<?php
}
else {
	header("Location: login.php");
}?>