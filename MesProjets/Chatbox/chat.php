<?php
session_start();
if(!isset($_SESSION["mail"])){
    header("location:connexion.php");
}
$mail = $_SESSION["mail"];
$nom = $_SESSION["nom"];
$pseudo = $_SESSION["pseudo"];

$id = mysqli_connect("localhost:3307","root","","chat");
if(isset($_POST["bout"])){
    $destinataire = $_POST["destinataire"];
    $message = $_POST["message"];
    $req = "insert into messages values (null, '$pseudo', '$message', now(), '$destinataire')";
    mysqli_query($id, $req);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header><h1>Bonjour <?=$nom?>, Chattez'en direct, ChatBox! 
        <a href="deconnexion.php"><img src="quitter.png" width="30"></a></h1></header>
        <div class="messages">
            <ul>
                <?php
                
                $req = "select * from messages 
                        where destinataire = '$pseudo'
                        or destinataire = 'tous'
                        order by date desc";
                $res = mysqli_query($id, $req);
                while($ligne = mysqli_fetch_assoc($res)){
                    echo "<li class='message'>".
                                            $ligne["date"]." - ".
                                            $ligne["pseudo"]." - ".
                                            $ligne["message"]. 
                        "</li>";
                }
                ?>
            </ul>
        </div>
        <div class="formulaire">
            <form action="" method="post">
                
                <input type="text" name="message" placeholder="Message : " required>
                <select name="destinataire">
                    <option value="tous"> Tous </option>
                    <?php
                        $res = mysqli_query($id, "select * from user order by pseudo");
                        while($ligne = mysqli_fetch_assoc($res)){
                            echo "<option value='".$ligne["pseudo"]."'>".$ligne["pseudo"]."</option>";
                        }
                    ?>
                </select>
                <input type="submit" value="Envoyer" name="bout">
            </form>
        </div>
    </div>
</body>
</html>