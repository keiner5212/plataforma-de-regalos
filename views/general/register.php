<div class="div-center">
    <div class="card login">
        <div class="login-img div-center">
            <img src="./assets/svg/login-user.svg" style="border-radius: 50%;">
        </div>
        <div style="display: flex; justify-content: center;">
            <form action="index.php?c=client&a=registerForm" method="post">
                <p style="font-size: 30px; margin: 0; margin-bottom: 10px;">Registrarse</p>
                <div class="form-div-stile">
                    <input type="text" placeholder="Nombre" name="nombre" required>
                </div>
                <div class="form-div-stile">
                    <input type="text" placeholder="Apellidos" name="apellidos" required>
                </div>
                <div class="form-div-stile">
                    <input id="email" type="text" placeholder="E-mail" name="email" required>
                </div>
                <div class="form-div-stile">
                    <input type="text" placeholder="Teléfono" name="telefono" required>
                </div>
                <div class="form-div-stile">
                    <input type="text" placeholder="Contraseña" name="contrasenha" required>
                </div>
                <div class="form-div-stile" style="width: auto; margin-top: 10px;">
                    <input id="submitB" type="submit" value="Registrarse" style="margin: 0px; padding: 0px 20px;">
                </div>
                <div style="width: 100%;margin-bottom: 10px; display: flex; justify-content: center;">
                    <a style="color: black;" href="index.php?c=client&a=loginClientScreen&t=Inicia%20sesion">Inicia sesion</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if (isset($_SESSION["aux"])) {
    echo ("<script> messageBox('Error al registrar','Seguramente estas intentando registrarte con un correo que ya existe') </script>");
    unset($_SESSION['aux']);
}  ?>