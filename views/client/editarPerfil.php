<?php
if (!isset($_SESSION["usuario"])) {
    header('Location: index.php?c=client&a=closeSesionUser&t=Inicia%20sesion');
    exit();
} ?>

<main class="div-center">
    <div class="card profile">
        <form id="form-edit" action="index.php?c=client&a=editUser" method="post" enctype="multipart/form-data">
            <h2 style="text-align: center; margin: 0; margin-bottom: 20px;">Editar perfil</h2>
            <div class="form-div-stile">
                <label for="foto">Foto de perfil: </label>
                <img style="border-radius: 30%;" src="../../<?php if (isset($informacion["foto_perfil"]) && $informacion["foto_perfil"] != "" && $informacion["foto_perfil"] != "NULL") {
                                                                echo ($informacion["foto_perfil"]);
                                                            } else {
                                                                echo ("assets/svg/login-user.svg");
                                                            } ?>" alt="foto de perfil">
                <input id="foto" type="file" style="width: 300px;" name="foto">
            </div>
            <div class="form-div-stile">
                <label>Nombre: </label>
                <input type="text" name="nombre" value="<?php echo ($informacion["nombre"]) ?>" required>
            </div>
            <div class="form-div-stile">
                <label>Apellidos: </label>
                <input type="text" name="apellidos" value="<?php echo ($informacion["apellido"]) ?>" required>
            </div>
            <div class="form-div-stile">
                <label>Teléfono: </label>
                <input type="text" name="telefono" value="<?php echo ($informacion["telefono"]) ?>" required>
            </div>
            <div class="form-div-stile">
                <label>Contraseña: </label>
                <input type="text" name="contrasenha" value="<?php echo ($informacion["contrasenha"]) ?>" required>
            </div>
        </form>
        <div style="width: 100%; display: flex; justify-content: space-evenly;">
            <a href="index.php?c=client&a=showPerfil&t=Perfil" class="a-button">Cancelar</a>
            <button onclick="Actualizar()" class="a-button">Actualizar</button>
        </div>
    </div>
</main>

<script>
    function Actualizar() {
        questionBox('Actualizar', 'Estas seguro de que quieres actualizar tu informacion?', () => {
            document.getElementById("form-edit").submit();
        });
    }
</script>