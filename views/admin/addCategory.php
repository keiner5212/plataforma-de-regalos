<?php
if (!isset($_SESSION["admin"])) {
    header('Location: index.php?c=client&a=closeSesionUser&t=Inicia%20sesion');
    exit();
} ?>

<main class="div-center">
    <div class="card profile">
        <form id="form-edit" action="index.php?c=client&a=addCategoryPost" method="post">
            <h2 style="text-align: center; margin: 0; margin-bottom: 20px;">Añadir categoria</h2>
            <div class="form-div-stile">
                <label>Nombre: </label>
                <input type="text" name="nombre" placeholder="Nombre de la categoria" required>
            </div>
        </form>
        <div style="width: 100%; display: flex; justify-content: space-evenly;">
            <a href="index.php?c=client&a=showMainAdmin&t=Menu%20admin" class="a-button">Cancelar</a>
            <button onclick="Actualizar()" class="a-button">Aceptar</button>
        </div>
    </div>
</main>

<script>
    function Actualizar() {
        questionBox('Añadir', 'Estas seguro de que quieres agregar la categoria?', () => {
            document.getElementById("form-edit").submit();
        });
    }
</script>