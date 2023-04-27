<?php
require_once "models/client.php";
class ClientController
{
    public function checkClient(): void
    {
        if (!isset($_SESSION['client'])) {
            header('Location: index.php?c=client&a=loginClientScreen&t=Inicia%20sesion');
            exit();
        }
    }
    public function loginClientScreen()
    {
        require_once 'views/general/login.php';
    }

    public function registerClientScreen()
    {
        require_once 'views/general/register.php';
    }

    public function registerForm()
    {
        $res = (new Client)->userSingIn($_POST['nombre'], $_POST['apellidos'], $_POST['email'], $_POST['telefono'], $_POST['contrasenha']);
        if (!$res) {
            $_SESSION["aux"] = "Error";
            echo '<script> window.history.back(); </script>';
        } else {
            $_SESSION["usuario"] = $_POST['email'];
            header('Location: index.php');
            exit();
        }
    }
    public function showMain()
    {
        require_once "models/Category.php";
        require_once "models/Product.php";
        $categories = (new Category)->getCategories();
        if (isset($_GET["category"])) {
            $products = (new Product)->filterByCategory($_GET["category"]);
        } else {
            if (isset($_GET["search"])) {
                $products = (new Product)->filterByName($_GET["search"]);
            } else {
                $products = (new Product)->getProducts();
            }
        }
        require_once "views/client/menu.php";
    }

    public function showMainAdmin()
    {
        require_once "models/Product.php";
        $products = (new Product)->getProducts();
        require_once "views/admin/menuAdmin.php";
    }
    public function loginAuth()
    {
        $client = (new Client())->loginAuth($_POST['email'], $_POST['contrasenha']);
        if ($client) {
            if ($client["admin"]) {
                $_SESSION['admin'] = $client["correo"];
                header('Location: index.php?c=client&a=showMainAdmin&t=Menu%20admin');
                exit();
            } else {
                $_SESSION['usuario'] = $client["correo"];
                header('Location: index.php?c=client&a=showMain');
                exit();
            }
        } else {
            $_SESSION["aux"] = "Error";
            echo '<script> window.history.back(); </script>';
        }
    }
    public function showRetrievePasword()
    {
        require_once "views/general/pasword.php";
    }
    public function RetrievePasword()
    {
        if ((new Client())->emailExist(trim($_POST["email"]))) {
            $codigo = mt_rand(100000, 999999);
            $_SESSION["cod_verificacion"] = $codigo;
            $_SESSION["correo_recup"] = $_POST["email"];
            $message = 'Tu codigo de recuperacionde contraseña es el siguiente: ' . $codigo . "\n\nAsegurate de no compartirlo con nadie";
            $headers = 'From: marketplaceluisamigo@gmail.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
            mail($_POST["email"], 'Recuperacion de contraseña', $message, $headers);
            $_SESSION["aux"] = "Correcto";
            header('Location: index.php?c=client&a=showRetrievePaswordWaiting&t=Verificación');
            exit();
        } else {
            $_SESSION["aux"] = "Error";
            echo '<script> window.history.back(); </script>';
        }
    }
    public function showRetrievePaswordWaiting()
    {
        require_once "views/general/passwordWaiting.php";
    }
    public function RetrievePaswordCode()
    {
        if ($_POST["codigo"] == $_SESSION["cod_verificacion"]) {
            $_SESSION["usuario"] = $_SESSION["correo_recup"];
            unset($_SESSION["cod_verificacion"]);
            unset($_SESSION["correo_recup"]);
            header('Location: index.php?c=client&a=showNewPassword&t=Nueva%20contraseña');
            exit();
        } else {
            $_SESSION["false"] = "Error";
            echo '<script> window.history.back(); </script>';
        }
    }
    public function showNewPassword()
    {
        require_once "views/general/newPassword.php";
    }
    public function newPassword()
    {
        (new Client)->changePassword($_SESSION["usuario"], $_POST["contrasenha"]);
        header('Location: index.php');
        exit();
    }

    public function closeSesionUser()
    {
        if (isset($_SESSION['usuario'])) {
            unset($_SESSION['usuario']);
        }
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }

        header('Location: index.php?c=client&a=loginClientScreen&t=Inicia%20sesion');
        exit();
    }

    public function showPerfil()
    {
        require_once "models/Product.php";
        $products = (new Product)->getProducts();
        $informacion = (new Client)->getUserInfo($_SESSION["usuario"]);
        require_once "views/client/perfil.php";
    }

    public function showEditPerfil()
    {
        $informacion = (new Client)->getUserInfo($_SESSION["usuario"]);
        require_once "views/client/editarPerfil.php";
    }

    public function editUser()
    {
        if (isset($_FILES['foto'])) {
            $nombre_imagen = $_FILES['foto']['name'];
            $temp_imagen = $_FILES['foto']['tmp_name'];
            $ruta_destino = "assets/img/users/" . $nombre_imagen;
            move_uploaded_file($temp_imagen, $ruta_destino);
        } else {
            $ruta_destino = "";
        }
        (new Client)->updateUser($_SESSION["usuario"], $ruta_destino, $_POST["nombre"], $_POST["apellidos"], $_POST["telefono"], $_POST["contrasenha"]);
        header('Location: index.php');
        exit();
    }

    public function addCategory()
    {
        require_once "views/admin/addCategory.php";
    }

    public function addCategoryPost()
    {
        require_once "models/Category.php";
        (new Category)->addCategory($_POST["nombre"]);
        header('Location: index.php?c=client&a=showMainAdmin&t=Menu%20admin');
        exit();
    }

    public function addProduct()
    {
        require_once "models/Category.php";
        $categories = (new Category)->getCategories();
        require_once "views/client/addProduct.php";
    }

    public function addProductPost()
    {
        require_once "models/Product.php";
        if (isset($_FILES['foto'])) {
            $nombre_imagen = $_FILES['foto']['name'];
            $temp_imagen = $_FILES['foto']['tmp_name'];
            $ruta_destino = "assets/img/users/" . $nombre_imagen;
            move_uploaded_file($temp_imagen, $ruta_destino);
        } else {
            $ruta_destino = "";
        }
        (new Product)->addProduct($_POST["nombre"], $ruta_destino, $_POST["desc"], $_POST["category"], $_SESSION["usuario"]);
        header('Location: index.php?c=client&a=showMain');
        exit();
    }
    public function getProduct()
    {
        require_once "models/Category.php";
        require_once "models/Product.php";
        $product = (new Product)->searchProductByID($_GET["p"])[0][0];
        $categories = (new Category)->searchCategoryByID($product["categoria"])[0][0];
        require_once "views/client/getProduct.php";
    }
    public function getProductPost()
    {
        require_once "models/Product.php";
        $product = (new Product)->searchProductByID($_GET["p"])[0][0];
        $message = 'El usuario "' . $_SESSION["usuario"] . '" ahora es el propietario del articulo "' . $product["nombre"] . '"';
        $headers = 'From: marketplaceluisamigo@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($_POST["email"], 'Uno de tus productos ha sido tomado', $message, $headers);
        (new Product)->changeOwner($_SESSION["usuario"], $_GET["p"]);
        header('Location: index.php?c=client&a=showMain');
        exit();
    }

    public function deleteProduct()
    {
        require_once "models/Product.php";
        (new Product)->deleteProduct($_GET["p"]);
        header('Location: index.php?c=client&a=showMainAdmin&t=Menu%20admin');
        exit();
    }


    public function editProduct()
    {
        require_once "models/Category.php";
        require_once "models/Product.php";
        $product = (new Product)->searchProductByID($_GET["p"])[0][0];
        $categories =  (new Category)->getCategories();
        require_once "views/client/editProduct.php";
    }

    public function editProductPost()
    {
        require_once "models/Product.php";
        if (isset($_FILES['foto'])) {
            $nombre_imagen = $_FILES['foto']['name'];
            $temp_imagen = $_FILES['foto']['tmp_name'];
            $ruta_destino = "assets/img/users/" . $nombre_imagen;
            move_uploaded_file($temp_imagen, $ruta_destino);
        } else {
            $ruta_destino = "";
        }
        (new Product)->editProduct($_POST["nombre"], $ruta_destino, $_POST["desc"], $_POST["category"], $_GET["p"]);
        header('Location: index.php?c=client&a=showMain');
        exit();
    }
}
