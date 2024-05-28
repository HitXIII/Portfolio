
<?php
session_start();
include "connect.php";
if(!isset($_SESSION["idu"])){
    header("Location: connexion.php?erreur=1");
}
$idu = $_SESSION["idu"];
$req = "select * from resultats where idu = $idu order by idqcm desc limit 1";
$res = mysqli_query($id,$req);

if(mysqli_num_rows($res)>0){
    $row = mysqli_fetch_assoc($res);
    echo "Bonjour ".$_SESSION["pseudo"]." Votre dernier score est de ".$row["note"]."/20";
}else echo "C'est votre premier test, allons-y!!!";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="deconnexion.php">Deconnexion</a>
    <?php
    if($_SESSION["niveau"] == 2){
        echo '<a href="admin.php">Admin</a>';
    }
    ?>
    <a href="affichage.php">Affichage</a>
    <form action="reponse.php" method="post">
    <?php
    
    $req = "select * from questions order by rand() limit 10";
    $res = mysqli_query($id,$req);
    $i = 1;
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<p> $i : ".$row["libelleQ"]."</p>";
        $idq = $row["idq"];
        $req2 = "select * from reponses where idq=$idq order by rand()";
        $res2 = mysqli_query($id, $req2);
        while ($row2 = mysqli_fetch_assoc($res2)){
            $idr = $row2["idr"];
            echo "<input type='radio' name='$idq' value='$idr' checked>".$row2["libeller"]."<br/>";
            
        }
        $i++;
    }
    ?>
    <input type="submit" value="Envoyer" name="bout">
    </form>
</body>
</html>