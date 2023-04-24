<?php
function autocargar($nombreClase)
{
    include_once "controllers/$nombreClase.php";
}
spl_autoload_register("autocargar");
