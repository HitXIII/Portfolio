<?php
session_start();
session_destroy();
echo "Deconnexion en cours, vous allez être redirigé....";
header("refresh:3;url=connexion.php"); //redirection vers la page d'accueil après 5 secondes
//header("location:connexion.php?");
?>