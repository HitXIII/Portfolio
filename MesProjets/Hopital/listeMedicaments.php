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
    <h1>Liste des medicaments</h1><hr>
    <table>
        <tr><th> REF </th><th>DESIGNATION</th>
            <th>LABORATOIRE</th><th>PRIX</th></tr>
    <?php
    $id = mysqli_connect("localhost:3307","root","","hopital");
    $req = "select * from medicaments";
    $res = mysqli_query($id, $req);
    while($ligne = mysqli_fetch_assoc($res)){
        echo "<tr>
                <td>".$ligne["refmed"]."</td>
                <td>".$ligne["designation"]."</td>
                <td>".$ligne["laboratoire"]."</td>
                <td>".$ligne["prix"]."</td>
              </tr>";
    }
    ?>
    </table>
</body>
</html>