<?php
session_start();
include "connect.php";
if(!isset($_SESSION["idu"])){
    header("Location: connexion.php?erreur=1");
}
$idu = $_SESSION["idu"];
$niveau = $_SESSION["niveau"];
$pseudo = $_SESSION["pseudo"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Resultats de vos QCM</h1><hr>
    <table>
        <tr><th> # </th><th> Pseudo </th><th> Score </th><th> Date </th></tr>
        <?php
        $req = "SELECT u.pseudo, r.idqcm, r.note, r.date
                FROM resultats r, user u 
                where u.idu = r.idu 
                and u.idu=$idu 
                order by date desc";
        if($niveau == 2){
            $req = "SELECT u.pseudo, r.idqcm, r.note, r.date
                    FROM resultats r, user u 
                    where u.idu = r.idu
                    order by date desc";
        }
        $res = mysqli_query($id,$req);
        while ($donnees = mysqli_fetch_assoc($res)) { ?>
        <tr>
            <td> <?php echo $donnees['idqcm']; ?> </td>
            <td> <?php echo $donnees['pseudo']; ?> </td>
            <td> <?php echo $donnees['note']; ?> </td>
            <td> <?php echo $donnees['date']; ?> </td>
        </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>