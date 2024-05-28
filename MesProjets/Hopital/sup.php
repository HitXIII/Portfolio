<?php
$numed = $_GET["numed"];
include "connectBDD.php";
$req = "delete from medecins where numed = $numed";
mysqli_query($id, $req);
echo "Le medecin numéro $numed a été supprimé de la base.<br>Vous allez être redirigé...";
//header("location:listeMedecins.php");
header("refresh:3;url=listeMedecins.php");
?>