<?php
if (!isset($_SESSION["usuario"])) {
    header('Location: index.php?c=client&a=closeSesionUser&t=Inicia%20sesion');
    exit();
} ?>

<main>

</main>