<?php
session_start();
if(!isset($_SESSION["idu"])){
    header("Location: connexion.php?erreur=1");
}
$idu = $_SESSION["idu"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="deconnexion.php">Deconnexion</a><br>
<a href="affichage.php">Affichage</a><br>
<h2>Liste des erreurs (avec les bonnes réponses)</h2>
<?php
include "connect.php";
if(isset($_POST["bout"])){
    //var_dump($_POST);
    $note = 0; 
    foreach($_POST as $cle => $val){
        if($cle != "bout"){
            //echo "Cle : $cle  Valeur : $val<br>";
            $req = "select * from reponses where idr = $val";
            $rep = mysqli_query($id,$req);
            $donnee=mysqli_fetch_assoc($rep);
            if($donnee["verite"] == 1){
                $note += 2;
            }else{
                $req2 = "select * from questions where idq = $cle";
                $rep2 = mysqli_query($id, $req2);
                $donnee2 = mysqli_fetch_assoc($rep2);
                echo "<h3>".$donnee2['libelleQ']."</h3><p>";
                $req2 = "select * from reponses where idq = $cle and verite=1";
                $rep2 = mysqli_query($id, $req2);
                $donnee2 = mysqli_fetch_assoc($rep2);
                echo "<h5>".$donnee2['libeller']."</h3>";
            }
        }
    }
    echo "<h1>Vous avez eu $note / 20</h1>";
    $req = "insert into resultats (idu, note, date) values ($idu,$note,now())";
    mysqli_query($id, $req);
}
?>
</body>
</html>