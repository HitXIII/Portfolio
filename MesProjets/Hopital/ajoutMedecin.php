<?php
$id = mysqli_connect("localhost:3307","root","","hopital");
if(isset($_POST["bout"])){
    //var_dump($_POST);
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $specialite = $_POST["specialite"];
    $service = $_POST["service"];
    $req2 = "insert into medecins (numed, nom, prenom, specialite, service)
            values (null, '$nom', '$prenom', '$specialite', '$service')";
    $res2 = mysqli_query($id, $req2);
    echo "Le docteur $nom a bien été ajouté à la base....";
    header("refresh:3;url=listeMedecins.php");
    //header("location:listeMedecins.php");
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
    <h1>Ajouter un medecin</h1><hr>
    <form action="" method="post">
    <input type="text" name="nom" placeholder="Entrer le nom du medecin :" required><br><br>
    <input type="text" name="prenom" placeholder="Entrer le prénom du medecin :" required><br><br>
        Specialité : <br>
        <select name="specialite">
            <?php
            
            $req = "select distinct specialite from medecins
                    order by specialite";
            $res = mysqli_query($id, $req);
            while($ligne = mysqli_fetch_assoc($res)){
                echo "<option>".$ligne["specialite"]."</option>";
            }
            ?>
        </select><br><br>
        <input type="text" name="service" placeholder="Entrer le service du medecin :" required><br><br>
        <input type="submit" value="Enregistrer" name="bout">
    </form>
    <hr>

</body>
</html>