<?php
if (!isset($_SESSION["admin"])) {
    header('Location: index.php?c=client&a=closeSesionUser&t=Inicia%20sesion');
    exit();
} ?>

<main class="div-center card menu-adjust">
    <div class="tools" style="width: 100%;">
        <a href="" style="margin-left: 50px;">
            <div style="background-color: #D9D9D9;border-radius: 30%;width: 45px;height: 45px;">
                <img style="background-color: #D9D9D9;border-radius: 30%;width: 45px;height: 45px;" src="./assets/svg/categoria.svg" alt="">
            </div>
        </a>
        <a href="" style="margin-right: 50px;">
            <div class="circle" style="background-color: #D9D9D9;">
                <img class="circle" src="./assets/svg/plus.svg" alt="">
            </div>
        </a>
    </div>

    <div style="width: 95%">
        <?php
        if (isset($products) && $products != false) {
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