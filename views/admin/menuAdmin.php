<?php
if (!isset($_SESSION["admin"])) {
    header('Location: index.php?c=client&a=closeSesionUser&t=Inicia%20sesion');
    exit();
} ?>

<main class="div-center card menu-adjust">
    <div class="tools" style="width: 100%;">
        <div style="display: flex;flex-direction: row; align-items: center;">
            <a href="index.php?c=client&a=addCategory&t=Añadir%20categoria" style="margin-left: 50px;">
                <div class="circle">
                    <img src="./assets/svg/categoria.svg" alt="">
                </div>
            </a>
            <p>Añadir categoria</p>
        </div>
    </div>

    <div class="tabla">
        <?php
        if (sizeof($products)) { ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Descripción</th>
                        <th>Categoria</th>
                        <th>Propietario</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($products as $value) foreach ($value as $v) { 
                        if ($v["adquirido"]==0) {
                        ?>
                        <tr>
                            <td>
                                <p><?php echo ($v["id_articulo"]) ?></p>
                            </td>
                            <td>
                                <p><?php echo ($v["nombre"]) ?></p>
                            </td>
                            <td><img src="./<?php if (isset($v["imagen"]) && $v["imagen"] != "" && $v["imagen"] != "NULL" && $v["imagen"] != "assets/img/users/") {
                                                echo ($v["imagen"]);
                                            } else {
                                                echo ("assets/svg/product.svg");
                                            } ?>" alt=""></td>
                            <td>
                                <p><?php echo ($v["descripcion"]) ?></p>
                            </td>
                            <td>
                                <p><?php
                                    require_once "models/category.php";
                                    echo ((new Category)->searchCategoryByID($v["categoria"])[0][0]["nombre"]) ?></p>
                            </td>
                            <td>
                                <p><?php echo ($v["propietario"]) ?></p>
                            </td>
                            <td>
                                <button onclick="Actualizar()" style="border-width: 0px">
                                    <img class="trash" width="50px" height="50px" src="./assets/svg/basura.svg" alt="">
                                </button>
                            </td>
                        </tr>
                    <?php  
                        }}  ?>
                </tbody>
            </table>
        <?php  } else { ?>
            <div style="padding: 10px;text-align: center; background-color: pink;border-radius: 10px; width: 50%;">
                <p>Sin productos que mostrar</p>
            </div>
        <?php  } ?>
    </div>
</main>

<script>
    function Actualizar() {
        questionBox('Eliminar', 'Estas seguro de que quieres eliminar ese producto?', () => {
            window.location.href = "index.php?c=client&a=deleteProduct&p=<?php echo ($v["id_articulo"]) ?>";
        });
    }
</script>