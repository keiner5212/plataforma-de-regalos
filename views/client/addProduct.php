<?php
if (!isset($_SESSION["usuario"])) {
    header('Location: index.php?c=client&a=closeSesionUser&t=Inicia%20sesion');
    exit();
} ?>

<main class="div-center">
    <div class="card profile">
        <form id="form-edit" action="index.php?c=client&a=addProductPost" method="post" enctype="multipart/form-data">
            <h2 style="text-align: center; margin: 0; margin-bottom: 20px;">Añadir producto</h2>

            <div class="form-div-stile">
                <label>Categoria: </label>
                <select name="category" style="width: 100%; font-size: medium; padding: 7px;" required>
                    <option value="0" disabled selected>Categoria</option>
                    <?php
                    foreach ($categories as $value) foreach ($value as $v) { ?>
                        <option value="<?php echo ($v["id_categoria"]) ?>"><?php echo ($v["nombre"]) ?></option>
                    <?php  } ?>
                </select>
            </div>
            <div class="form-div-stile">
                <label for="foto">Foto de articulo: </label>
                <input id="foto" type="file" style="width: 300px;" name="foto">
            </div>
            <div class="form-div-stile">
                <label>Nombre: </label>
                <input type="text" name="nombre" placeholder="Nombre del articulo" required>
            </div>
            <div class="form-div-stile">
                <label>Descripcion: </label>
                <input type="text" name="desc" placeholder="Descripcion del articulo" required>
            </div>
        </form>
        <div style="width: 100%; display: flex; justify-content: space-evenly;">
            <a href="index.php?c=client&a=showMain" class="a-button">Cancelar</a>
            <button onclick="Actualizar()" class="a-button">Aceptar</button>
        </div>
    </div>
</main>

<script>
    function Actualizar() {
        questionBox('Añadir', 'Estas seguro de que quieres agregar el producto?', () => {
            document.getElementById("form-edit").submit();
        });
    }
</script>