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
    <a href="ajoutMedecin.php">Ajouter un medecin</a>
    <h1>Liste des medecins de l'hopital</h1>
    <table>
        <tr><th>NOM</th><th>PRENOM</th>
            <th>SPECIALITE</th><th>SERVICE</th>
            <th><img src="modif.png" width="25"></th>
            <th><img src="sup.png" width="25"></th>
        </tr>
    <?php
    include "connectBDD.php";
    $req = "select * from medecins";
    $res = mysqli_query($id, $req);
    while($ligne = mysqli_fetch_assoc($res)){
        $numed = $ligne["numed"];
        echo "<tr>
                <td>".$ligne["nom"]."</td>
                <td>".$ligne["prenom"]."</td>
                <td>".$ligne["specialite"]."</td>
                <td>".$ligne["service"]."</td>
                <td><a href='modif.php?numed=$numed'><img src='modif.png' width='25'></a></td>
                <td><a href='sup.php?numed=$numed'><img src='sup.png' width='25'></a></td>
              </tr>";
    }
    ?>
    </table>
</body>
</html>