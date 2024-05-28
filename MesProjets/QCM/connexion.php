<?php
session_start();
if(isset($_GET["erreur"]) && $_GET["erreur"]==1) echo "Vous devez vous connecter pour acceder au qcm"; 
if(isset($_GET["erreur"]) && $_GET["erreur"]==2) echo "Vous devez vous connecter en ADMIN pour acceder à cette page"; 
include "connect.php";
if(isset($_POST["bout"])){
    $pseudo = $_POST["pseudo"];
    $mdp = $_POST["mdp"];
    $requete = "select * from user where pseudo='$pseudo' and mdp='$mdp'";
    $resultat = mysqli_query($id, $requete);
    $lig = mysqli_fetch_assoc($resultat);
    if(mysqli_num_rows($resultat)>0){
        $_SESSION["pseudo"] = $pseudo;
        $_SESSION["idu"] = $lig["idu"];
        $_SESSION["niveau"] = $lig["niveau"];
        header("location:qcm.php");
    }else{
        $erreur = "Erreur de pseudo ou de mot de passe!!!";
    }
}
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
    <h1>Formulaire de connexion</h1><hr>
    <form action="" method="post">
        <input type="text" name="pseudo" placeholder="Entrez votre pseudo :" required><br><br>
        <input type="password" name="mdp" placeholder="Mot de passe :" required><br><br>
        <?php if(isset($erreur)) echo "<b>$erreur</b>";?><br><br>
        <input type="submit" value="Connexion" name="bout">
    </form>
</body>
</html>