<?php

session_start();

//shkaterrimi i sesionit nese eshte klikuar butoni Dil
session_destroy();

header("Location: ../login.php");
?>