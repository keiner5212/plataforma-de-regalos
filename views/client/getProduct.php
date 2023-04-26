<?php
if (!isset($_SESSION["usuario"])) {
    header('Location: index.php?c=client&a=closeSesionUser&t=Inicia%20sesion');
    exit();
} ?>

<main class="div-center">
    <div class="card profile">
        <form id="form-edit" action="index.php?c=client&a=getProductPost&p=<?php echo ($product["id_articulo"]) ?>" method="post" enctype="multipart/form-data">
            <h2 style="text-align: center; margin: 0; margin-bottom: 20px;">Adquirir articulo</h2>
            <div class="form-div-stile">
                <label for="foto"><?php echo ($categories["nombre"]) ?></label>
            </div>
            <div class="form-div-stile" style="display: flex; justify-content: center;height: auto;">
                <img class="product-img" src="./<?php if (isset($product["imagen"]) && $product["imagen"] != "" && $product["imagen"] != "NULL" && $product["imagen"] != "assets/img/users/") {
                                echo ($product["imagen"]);
                            } else {
                                echo ("assets/svg/product.svg");
                            } ?>" alt="" >
            </div>
            <div class="form-div-stile">
                <label><?php echo ($product["descripcion"]) ?></label>
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
        questionBox('Adquirir', 'Estas seguro de que quieres adquirir el producto?', () => {
            document.getElementById("form-edit").submit();
        });
    }
</script>