<aside>
    <?php if (isset($_SESSION['usuario']) || isset($_SESSION['admin'])) { ?>
        <ul>
            <li>
                <img id="home" class="menu-icon" src="./assets/svg/home.svg" alt="proximamente" width="60px">
                <a href="index.php?c=client&a=showMain" class="aside-desc hidden">Inicio</a>
            </li>
            <li>
                <img class="menu-icon" src="./assets/svg/coming-soon.svg" alt="proximamente" width="60px">
                <p class="aside-desc hidden">Proximamente</p>
            </li>
        </ul>
    <?php } ?>
</aside>

<script>
    <?php if (isset($_SESSION['usuario'])) { ?>
        document.getElementById("home").addEventListener("click", () => {
            window.location.href = 'index.php?c=client&a=showMain'
        })
        <?php } else {
        if (isset($_SESSION['admin'])) { ?>
            document.getElementById("home").addEventListener("click", () => {
                window.location.href = 'index.php?c=client&a=showMainAdmin&t=Menu%20admin'
            })
    <?php }
    } ?>
</script>