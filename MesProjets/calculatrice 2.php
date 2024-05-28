<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Calculatrice</h1><hr>
    <form action="" method="post">
        <p><input type="number" name="nb1" placeholder="Entrez un nombre :" required>
        <select name="op">
            <option value="+"> + </option>
            <option value="-"> - </option>
            <option value="*"> * </option>
            <option value="/"> / </option>
        </select>
        <input type="number" name="nb2" placeholder="Entrez un nombre :" required></p>
        <input type="submit" value="Calculer" name="bout">
    </form><hr>

    <?php
    if(isset($_POST["bout"])){
        $nb1 = $_POST["nb1"];
        $op = $_POST["op"];
        $nb2 = $_POST["nb2"];
        if($op == "+"){
            $res = $nb1 + $nb2;
        }else if($op == "-"){
            $res = $nb1 - $nb2;
        }else if($op == "*"){
            $res = $nb1 * $nb2;
        }else {
            if($nb2 == 0) $res = "Division par zéro, impossible!!!";
            else $res = $nb1 / $nb2;
        }
        echo "<h3>$nb1 $op $nb2 = $res</h3>";
    }
    ?>

</body>
</html>