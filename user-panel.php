<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION["username"]) || $_SESSION["usertype"] != "user") {
        header("Location: index.php");
    }
    ?>
    <h1>Hello <?= $_SESSION["username"]?>!</h1>
    <a href="logout.php">Salir</a>
</body>

</html>