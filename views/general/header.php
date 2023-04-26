<script>
    function closeQuestion() {
        questionBox('Salir', 'Estas seguro de que quieres cerrar sesion?', () => {
            window.location.href = 'index.php?log=false&c=client&a=closeSesionUser';
        });
    }
</script>

<?php
require_once "models/client.php";
if (isset($_SESSION['usuario'])) {
    $informacion = (new Client)->getUserInfo($_SESSION["usuario"]);
} else {
    if (isset($_SESSION['admin'])) {
        $informacion = (new Client)->getUserInfo($_SESSION["admin"]);
    }
}
?>

<header>
    <div class="header-container">
        <?php if (isset($_SESSION['usuario'])) { ?>
            <img class="menu-icon" id="menu-button" src="./assets/svg/menu.svg" alt="donaciones">
        <?php  } ?>
        <div class="div-right">
            <img class="menu-icon" src="./assets/img/logo.png" alt="logo">
            <h2 style="margin: 0px; padding: 0px 10px;">Marketplace Luis Amigó</h2>
        </div>
        <?php if (isset($_SESSION['usuario'])) { ?>
            <div id="log-info" class="user-icon">
                <p><?php echo ($informacion["nombre"] . " " . $informacion["apellido"]) ?></p>
                <img class="menu-icon" src="./<?php if (isset($informacion["foto_perfil"]) && $informacion["foto_perfil"] != "" && $informacion["foto_perfil"] != "NULL" && $informacion["foto_perfil"] != "assets/img/users/") {
                                                    echo ($informacion["foto_perfil"]);
                                                } else {
                                                    echo ("assets/svg/login-user.svg");
                                                } ?>" alt="">
                <div id="optionss-user" class="user-menu hidden">
                    <ul>
                        <li class="user-menu-li">
                            <a href="index.php?c=client&a=showPerfil&t=Perfil" class="options-desc div-center">
                                <img class="menu-icon" src="./assets/svg/perfil.svg" alt="proximamente" width="60px">Perfil</a>
                        </li>
                        <li class="user-menu-li">
                            <button id="closeSesion" onclick="closeQuestion()" class="div-center">
                                <img class="menu-icon" src="./assets/svg/cerrar-sesion.svg" alt="proximamente" width="60px">Log out</button>
                        </li>
                    </ul>
                </div>
            </div>
            <?php } else {
            if (isset($_SESSION['admin'])) { ?>
                <div id="log-info" class="user-icon">
                    <p><?php echo ($informacion["nombre"] . " " . $informacion["apellido"]) ?></p>
                    <img class="menu-icon" src="./<?php if (isset($informacion["foto_perfil"]) && $informacion["foto_perfil"] != "" && $informacion["foto_perfil"] != "NULL" && $informacion["foto_perfil"] != "assets/img/users/") {
                                                        echo ($informacion["foto_perfil"]);
                                                    } else {
                                                        echo ("assets/svg/login-user.svg");
                                                    } ?>" alt="">
                    <div id="optionss-user" class="user-menu hidden">
                        <ul>
                            <li class="user-menu-li">
                                <button id="closeSesion" onclick="closeQuestion()" class="div-center">
                                    <img class="menu-icon" src="./assets/svg/cerrar-sesion.svg" alt="proximamente" width="60px">Log out</button>
                            </li>
                        </ul>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
</header>