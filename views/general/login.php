<?php
if (isset($_SESSION["admin"])) {
    header('Location: index.php?c=client&a=showMainAdmin&t=Menu%20admin');
    exit();
} else {
    if (isset($_SESSION["usuario"])) {
        header('Location: index.php?c=client&a=showMain');
        exit();
    }
}
?>

<div class="div-center">
    <div class="card login">
        <div class="login-img div-center">
            <img src="./assets/svg/login-user.svg" style="border-radius: 50%;">
        </div>
        <div style="display: flex; justify-content: center;">
            <form action="index.php?c=client&a=loginAuth" method="post">
                <p style="font-size: 30px; margin-top: 0;">Login</p>
                <div class="form-div-stile">
                    <img src="./assets/svg/correo.svg" alt="correo">
                    <input id="email" type="text" placeholder="E-mail" name="email" required>
                </div>
                <div class="form-div-stile">
                    <img src="./assets/svg/contraseña.svg" alt="contraseña">
                    <input type="text" placeholder="Contraseña" name="contrasenha" required>
                </div>
                <div class="div-right" style="width: 100%;margin-bottom: 10px;padding: 10px;">
                    <a style="color: black;" href="index.php?log=false&c=client&a=showRetrievePasword&t=Recuperacion">Olvidaste tu contraseña</a>
                </div>
                <div class="form-div-stile" style="width: auto;">
                    <input id="submitB" type="submit" value="Ingresar" style="margin: 0px; padding: 0px 20px;">
                </div>
                <div style="width: 100%;margin-bottom: 10px; display: flex; justify-content: center;">
                    <a style="color: black;" href="index.php?c=client&a=registerClientScreen&t=Registrate">Registrarse</a>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
if (isset($_SESSION["aux"])) {
    echo ("<script> messageBox('Error al iniciar sesion','Comprueba que los credenciales sean correctos') </script>");
    unset($_SESSION['aux']);
}
?>