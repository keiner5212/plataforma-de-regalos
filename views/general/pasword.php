<div class="div-center">
    <div class="card login">
        <div class="login-img div-center">
            <img src="./assets/svg/login-user.svg" style="border-radius: 50%;">
        </div>
        <div style="display: flex; justify-content: center;">
            <form action="index.php?log=false&c=client&a=RetrievePasword" method="post">
                <p style="font-size: 30px; margin-top: 0;">Recuperar Contraseña</p>
                <div class="form-div-stile">
                    <img src="./assets/svg/correo.svg" alt="correo">
                    <input id="email" type="text" placeholder="E-mail" name="email" required>
                </div>
                <div class="form-div-stile" style="width: auto;">
                    <input id="submitB" type="submit" value="Aceptar" style="margin: 0px; padding: 0px 20px;">
                </div>
                <div class="div-right" style="margin: 10px;">
                    <div style="margin: 0px 10px; display: flex; justify-content: center;">
                        <a style="color: black;" href="index.php?log=false&c=client&a=registerClientScreen&t=Registrate">Registrarse</a>
                    </div>
                    <div style="margin: 0px 10px; display: flex; justify-content: center;">
                        <a style="color: black;" href="index.php?log=false&c=client&a=loginClientScreen&t=Inicia%20sesion">Inicia sesion</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if (isset($_SESSION["aux"])) {
    echo ("<script> messageBox('Error al enviar correo','El correo que ingresaste no es correcto, por favor vuelve a intentarlo') </script>");
    unset($_SESSION['aux']);
}  ?>
