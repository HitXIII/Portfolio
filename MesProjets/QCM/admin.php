<?php
session_start();
include "connect.php";
if(!isset($_SESSION["idu"])){
    header("Location: connexion.php?erreur=1");
}
if($_SESSION["niveau"] != 2){
    header("Location: connexion.php?erreur=2");
}
if(isset($_POST["bout"])){
    $libelleQ = $_POST["libelleQ"];
    $rep1 = $_POST["rep1"];
    $rep2 = $_POST["rep2"];
    $rep3 = $_POST["rep3"];
    $rep4 = $_POST["rep4"];
    $niveau = $_POST["niveau"];

    $req = "insert into questions (libelleQ,niveau) values ('$libelleQ', $niveau)";
    $res = mysqli_query($id, $req);
    $req = "select max(idq) as maxi from questions";
    $res = mysqli_query($id, $req); 
    echo mysqli_error($id);
    $donnees = mysqli_fetch_assoc($res);
    $idq = $donnees["maxi"];
    $req2 = "insert into reponses (idq, libeller,verite) values ($idq,'$rep1',1),
                                                                ($idq,'$rep2',0),
                                                                ($idq,'$rep3',0),
                                                                ($idq,'$rep4',0)";
    mysqli_query($id, $req2);
    
    echo mysqli_error($id);
    //echo "<script>alert('Question ajoutee');</script>";
    //header("location: admin.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Ajouter une question au QCM</h1>
    <form action="" method="post">
        <input type="radio" name="niveau" value="0" checked> Débutant
        <input type="radio" name="niveau" value="1"> Confirmé <br>
         <input type="text" name="libelleQ" placeholder="Question :" required>

         <input type="text" name="rep1" placeholder="Bonne reponse :" required>
         <input type="text" name="rep2" placeholder="Mauvaise réponse 1 :" required>
         <input type="text" name="rep3" placeholder="Mauvaise réponse 2 :" required>
         <input type="text" name="rep4" placeholder="Mauvaise réponse 3 :" required>
         <input type="submit" value="Ajouter" name="bout">

    </form>
    <h1>Liste des questions</h1>
    <table>
        <tr>
            <th> # </th>
            <th> Libellé de la question </th>
            <th> Niveau de la question </th>
            <th> <img src="modif.png" width="30"> </th>
            <th> <img src="sup.png" width="30"> </th>
        </tr>
        <?php
        include "connect.php";
        $req = "select * from questions";
        $res = mysqli_query($id,$req);
        while ($donnees = mysqli_fetch_assoc($res)) {  ?>
        <tr>
            <td> <?php echo $donnees['idq'];?> </td>
            <td> <?php echo $donnees['libelleQ'];?> </td>
            <td> <?php echo $donnees['niveau'];?> </td>
            <td> <a href="modif.php?idq=<?=$donnees['idq']?>"><img src="modif.png" width="20"></a> </td>
            <td> <a href="sup.php?idq=<?=$donnees['idq']?>"><img src="sup.png" width="20"></a> </td>
            
        <?php
        }
        ?>
    </table>
</body>
</html>