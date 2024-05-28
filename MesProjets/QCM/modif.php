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
if(isset($_POST["bout"])){
    $libelleQ = $_POST["libelleQ"];
    $rep1 = $_POST["rep1"];
    $rep2 = $_POST["rep2"];
    $rep3 = $_POST["rep3"];
    $rep4 = $_POST["rep4"];
    $niveau = $_POST["niveau"];

    $req = "update questions set libelleQ='$libelleQ', 
                                 niveau='$niveau' 
    where idq=$idq";
    mysqli_query($id, $req);
    //$req = "update reponses set libeller='$rep1' "
}

$req = "SELECT * FROM questions WHERE idq = $idq";
$res = mysqli_query($id, $req);
$donnees = mysqli_fetch_array($res);

$req2 = "SELECT * FROM reponses WHERE idq = $idq";
$res2 = mysqli_query($id, $req2);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Modifier une question au QCM</h1>
    <form action="" method="post">
        <input type="radio" name="niveau" value="0" checked> Débutant
        <input type="radio" name="niveau" value="1"> Confirmé <br>
         <input type="text" name="libelleQ" placeholder="Question :" value="<?=$donnees["libelleQ"]?>" required>
        <?php
        $i = 1;
        while($donnees2 = mysqli_fetch_array($res2)){
            $rep = $donnees2["libeller"];
            if($i == 1){
            echo "<input type='text' name='rep$i' placeholder='Bonne reponse :' value='$rep' required>";
            }else{
                echo "<input type='text' name='rep$i' placeholder='Mauvaise reponse ".($i-1).":' value='$rep'>";
            }
            $i++;
        }
         ?>
        
         <input type="submit" value="Ajouter" name="bout">

    </form>
</body>
</html>