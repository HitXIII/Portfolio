<?php
include "connectBDD.php";
if(isset($_POST["bout"])){
    $numed = $_POST["numed"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $specialite = $_POST["specialite"];
    $service = $_POST["service"];
    $req = "update medecins set nom='$nom',
                                prenom='$prenom',
                                specialite='$specialite',
                                service='$service'
            where numed = $numed";
    mysqli_query($id, $req);
    echo "Les infos du Docteur $nom ont été mises à jour.<br>Vous allez être redirigé...";
    //header("location:listeMedecins.php");
    header("refresh:3;url=listeMedecins.php");
}

$numed = $_GET["numed"];
$req = "select * from medecins where numed=$numed";
$res = mysqli_query($id, $req);
$ligne = mysqli_fetch_assoc($res);
$nom = $ligne["nom"];
$prenom = $ligne["prenom"];
$service = $ligne["service"];
$specialite = $ligne["specialite"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Modification des infos du Docteur <?=$nom?></h1><hr>
    <form action="" method="post">
    <input type="hidden" name="numed" value="<?=$numed?>">
    <input type="text" name="nom" value="<?=$nom?>" placeholder="Entrer le nom du medecin :" required><br><br>
    <input type="text" name="prenom" value="<?=$prenom?>" placeholder="Entrer le prénom du medecin :" required><br><br>
        Specialité : <br>
        <select name="specialite">
            <?php
            
            $req = "select distinct specialite from medecins
                    order by specialite";
            $res = mysqli_query($id, $req);
            while($ligne = mysqli_fetch_assoc($res)){
                if($ligne["specialite"] == $specialite){
                    echo "<option selected>".$ligne["specialite"]."</option>";
                }else {
                    echo "<option>".$ligne["specialite"]."</option>";
                }
            }
            ?>
        </select><br><br>
        <input type="text" name="service" value="<?=$service?>" required><br><br>
        <input type="submit" value="Enregistrer" name="bout"><br>
    </form>
    <hr>

</body>
</html>

