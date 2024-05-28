<?php
session_start();
session_destroy();
echo "Vous avez été deconnecté...";
header("refresh:3;url=connexion.php");
// header("location:connexion.php");
?>