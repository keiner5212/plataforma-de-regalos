<?php
if (!isset($_SESSION["usuario"])) {
    header('Location: index.php?c=client&a=closeSesionUser&t=Inicia%20sesion');
    exit();
} ?>

<main class="div-center card menu-adjust">
    <h1>Articulos</h1>
    <div class="tools" style="width: 100%;">
        <div class="tools" style="margin-left: 50px;">
            <select name="category">
                <option value="0">Categoria</option>
                <?php
                foreach ($categories as $key => $value) { ?>

                <?php  } ?>
            </select>
            <form action="" class="tools">
                <input type="text" placeholder="Introduce tu busqueda">
                <input type="submit" value="Buscar" class="submit-buttton">
            </form>
        </div>
        <a href="" style="margin-right: 50px;">
            <div class="circle" style="background-color: #D9D9D9;">
                <img class="circle" src="./assets/svg/plus.svg" alt="">
            </div>
        </a>
    </div>

    <div style="width: 95%">
        <?php
        if ($products) {
            foreach ($products as $key => $product) { ?>
                <div>

                </div>
            <?php  }
        } else { ?>
            <div style="padding: 10px;text-align: center; background-color: pink;border-radius: 10px; width: 100%;">
                <p>Sin productos que mostrar</p>
            </div>
        <?php  } ?>
    </div>
</main>