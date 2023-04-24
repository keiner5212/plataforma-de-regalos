<?php if (isset($_SESSION["aux"])) {
    echo ("<script> messageBox('Correo enviado','A su correo electronico hemos enviado un código de verificación') </script>");
    unset($_SESSION['aux']);
}
if (isset($_SESSION["false"])) {
    echo ("<script> messageBox('Error','Codigo incorrecto') </script>");
    unset($_SESSION['false']);
}  ?>

<div class="div-center">
    <div class="card login">
        <div class="login-img div-center">
            <img src="../../assets/svg/login-user.svg" style="border-radius: 50%;">
        </div>
        <div style="display: flex; justify-content: center;">
            <form action="index.php?log=false&c=client&a=RetrievePaswordCode" method="post">
                <p style="font-size: 30px; margin-top: 0;">Recuperar Contraseña</p>
                <div class="form-div-stile">
                    <img src="../../assets/svg/codigo-de-acceso.svg" alt="codigo">
                    <input type="text" placeholder="Codigo de verificación" name="codigo" required>
                </div>
                <div class="form-div-stile" style="width: auto;">
                    <input type="submit" value="Aceptar" style="margin: 0px; padding: 0px 20px;">
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