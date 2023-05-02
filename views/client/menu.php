<?php
if (!isset($_SESSION["usuario"])) {
    header('Location: index.php?c=client&a=closeSesionUser&t=Inicia%20sesion');
    exit();
} ?>

<main class="div-center card menu-adjust">
    <h1>Articulos</h1>
    <div class="tools" style="width: 100%;">
        <div class="tools" style="margin-left: 50px;">
            <form action="" class="tools" id="cate" method="get">
                <select name="category" id="opciones">
                    <option value="0" disabled selected>Categoria</option>
                    <?php
                    foreach ($categories as $value) foreach ($value as $v) { ?>
                        <option value="<?php echo ($v["id_categoria"]) ?>"><?php echo ($v["nombre"]) ?></option>
                    <?php  } ?>
                </select>
            </form>
            <form action="" class="tools" method="get">
                <input type="text" name="search" placeholder="Introduce tu busqueda">
                <input type="submit" value="Buscar" class="submit-buttton">
            </form>
        </div>
        <a href="index.php?c=client&a=addProduct" style="margin-right: 50px;">
            <div class="circle" style="background-color: #D9D9D9;">
                <img src="./assets/svg/plus.svg" alt="">
            </div>
        </a>
    </div>

    <div class="products">
        <?php
        if ($products) {
            foreach ($products as $value) foreach ($value as $v) {
                if (!$v["adquirido"]) { ?>
                    <div class="product-card card">
                        <p><?php echo ($v["nombre"]) ?></p>
                        <img src="./<?php if (isset($v["imagen"]) && $v["imagen"] != "" && $v["imagen"] != "NULL" && $v["imagen"] != "assets/img/users/") {
                                        echo ($v["imagen"]);
                                    } else {
                                        echo ("assets/svg/product.svg");
                                    } ?>" alt="">
                        <?php
                        if ($v["propietario"] == $_SESSION["usuario"]) {
                        ?>
                            <a class="a-button">Propietario</a>
                        <?php
                        } else {
                        ?>
                            <a class="a-button" href="index.php?c=client&a=getProduct&t=Adquirir%20articulo&p=<?php echo ($v["id_articulo"]) ?>">Lo necesito</a> <?php
                                                                                                                                                                }
                                                                                                                                                                    ?>
                    </div>
            <?php  }
            }
        } else { ?>
            <div style="padding: 10px;text-align: center; background-color: pink;border-radius: 10px; width: 50%;">
                <p>Sin productos que mostrar</p>
            </div>
        <?php  } ?>
    </div>
</main>

<script>
    document.getElementById('opciones').addEventListener('change', function() {
        document.getElementById('cate').submit();
    });
</script>