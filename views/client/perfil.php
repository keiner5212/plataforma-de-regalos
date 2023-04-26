<?php
if (!isset($_SESSION["usuario"])) {
    header('Location: index.php?c=client&a=closeSesionUser&t=Inicia%20sesion');
    exit();
} ?>

<main class="div-center">
    <div class="card profile">
        <h2 style="text-align: center; margin: 0;">Perfil</h2>
        <div class="profile-img-name" style="margin: 20px;">
            <div style="margin: 0px 40px; display: flex; align-items: center;">
                <img style="border-radius: 40%;" src="./<?php if (isset($informacion["foto_perfil"]) && $informacion["foto_perfil"] != "" && $informacion["foto_perfil"] != "NULL" && $informacion["foto_perfil"] != "assets/img/users/") {
                                                                echo ($informacion["foto_perfil"]);
                                                            } else {
                                                                echo ("assets/svg/login-user.svg");
                                                            } ?>" height="100px" alt="foto de perfil">
            </div>
            <div style="display: flex; flex-direction: column; justify-content: center; width: 100%;">
                <p><?php echo ($informacion["nombre"] . " " . $informacion["apellido"]) ?></p>
            </div>
        </div>
        <div class="div-center" style="-direction: column; width: 100%; justify-content: space-evenly;">
            <div style="text-align: center;">
                <h3>E-mail</h3>
                <p><?php echo ($informacion["correo"]) ?></p>
            </div>
            <div style="text-align: center;">
                <h3>Telefono</h3>
                <p><?php echo ($informacion["telefono"]) ?></p>
            </div>
            <div style="text-align: center;">
                <h3>Contraseña</h3>
                <p><?php echo (substr($informacion["contrasenha"], 0, 3) . "*******") ?></p>
            </div>
        </div>
        <div style="width: 100%; display: flex; justify-content: space-evenly;">
            <a href="index.php?log=false&c=client&a=closeSesionUser" class="a-button">Salir</a>
            <a href="index.php?c=client&a=showEditPerfil&t=Editar%20Perfil" class="a-button">Editar perfil</a>
        </div>
    </div>
</main>