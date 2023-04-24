<?php if (isset($_SESSION["aux"])) {
    echo ("<script> messageBox('Error al enviar correo','El correo que ingresaste no es correcto, por favor vuelve a intentarlo') </script>");
    unset($_SESSION['aux']);
}  ?>

<div class="div-center">
    <div class="card login">
        <div class="login-img div-center">
            <img src="../../assets/svg/login-user.svg" style="border-radius: 50%;">
        </div>
        <div style="display: flex; justify-content: center;">
            <form action="index.php?log=false&c=client&a=newPassword" method="post">
                <p style="font-size: 30px; margin-top: 0;">Restaurar Contraseña</p>
                <div class="form-div-stile">
                    <img src="../../assets/svg/contraseña.svg" alt="contraseña">
                    <input id="pw1" type="text" placeholder="Nueva contraseña" name="contrasenha" required>
                </div>
                <div class="form-div-stile">
                    <img src="../../assets/svg/contraseña.svg" alt="contraseña">
                    <input id="pw2" t type="text" placeholder="Confirmar contraseña " name="x" required>
                </div>
                <div class="form-div-stile" style="width: auto;">
                    <input id="submitB" type="submit" value="Aceptar" style="margin: 0px; padding: 0px 20px;">
                </div>
            </form>
        </div>
    </div>
</div>