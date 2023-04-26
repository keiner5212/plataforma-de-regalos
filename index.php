<!doctype html>
<html lang="es" style="height: 100%;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="language" content="spanish">
    <meta name="audience" content="all">
    <meta itemprop="name" content="Book Zone">
    <title>
        <?php
        if (isset($_GET["t"])) {
            echo ($_GET["t"]);
        } else {
            echo ("Marketplace Luis Amigó");
        }
        ?>
    </title>
    <link rel="icon" href="assets/img/logo.png" />
    <script src="assets/script/main.js" defer></script>
    <script src="assets/script/message.js"></script>
    <link rel="stylesheet" href="assets/style/general.css">
</head>

<body>
    <?php
    session_start();
    require_once "autoload.php";
    require_once "views/general/header.php";
    require_once "views/general/aside.php";
    if (isset($_GET['c'])) {
        $nameController = $_GET['c'] . "Controller";
    } else {
        $nameController = "clientController";
    }
    if (class_exists($nameController)) {
        $controler = new $nameController();
        if (isset($_GET['a'])) {
            $action = $_GET['a'];
        } else {
            if (!isset($_SESSION['usuario'])) {
                $action = "checkClient";
            } else {
                $action = "showMain";
            }
        }
        $controler->$action();
    } else {
        echo "No existe el controlador";
    }
    ?>
</body>

</html>