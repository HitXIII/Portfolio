<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>2eme Page</h1>
    <?php
    echo "Bonjour ".$_GET["nom"]." ".$_GET["prenom"]." vous avez ".$_GET["age"]." ans";
    ?>
</body>
</html>