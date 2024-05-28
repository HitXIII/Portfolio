<?php
session_start();
$id = mysqli_connect("localhost:3307","root","","chat");
if(isset($_POST["bouton"])){
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];
    $req = "select * from user where mail='$mail' and mdp = '$mdp'";
    $res = mysqli_query($id, $req);
    if(mysqli_num_rows($res) == 1){
        $ligne = mysqli_fetch_assoc($res);
        $_SESSION["idu"] = $ligne["idu"];
        $_SESSION["mail"] = $mail;
        $_SESSION["nom"] = $ligne["nom"];
        $_SESSION["pseudo"] = $ligne["pseudo"];
        $_SESSION["niveau"] = $ligne["niveau"];
        header("location:chat.php");
    }else{
        $erreur = "Erreur de login ou de mot de passe...";
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
        <p><input type="email" name="mail" placeholder="Mail :" required></p>
        <p><input type="password" name="mdp" placeholder="Mot de passe :" required></p>
        <?php if(isset($erreur)) echo "<b>$erreur</b>";?>
        <p><input type="submit" value="Connexion" name="bouton"></p>
    </form><hr>

</body>
</html>