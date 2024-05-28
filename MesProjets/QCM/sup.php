<?php
session_start();
include "connect.php";
if(!isset($_SESSION["idu"])){
    header("Location: connexion.php?erreur=1");
}
if($_SESSION["niveau"] != 2){
    header("Location: connexion.php?erreur=2");
}

$idq = $_GET["idq"];
echo $idq;
$req = "delete from questions where idq = $idq";
$req2 = "delete from reponses where idq = $idq";
$res = mysqli_query($id,$req2);
$res = mysqli_query($id,$req);
echo mysqli_error($id);

echo mysqli_error($id);
header("location:admin.php");
?>