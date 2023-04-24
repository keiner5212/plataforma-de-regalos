<?php
require_once("database.php");
class Client
{

    private $pdo;


    //Constructor
    public function __construct()
    {
        $this->pdo = (new Database())->connect();
    }


    public function userSingIn($nombre, $apellidos, $email, $telefono, $contrasenha)
    {
        $sql = "INSERT INTO usuarios (correo, nombre, apellido, contrasenha, admin, telefono) VALUES ('{$email}','{$nombre}','{$apellidos}','{$contrasenha}','{false}','{$telefono}')";
        try {
            $this->pdo->query($sql);
        } catch (\Throwable $th) {
            return false;
        }
        return true;
    }

    public function loginAuth($email, $contrasenha)
    {
        $sql = "SELECT * FROM usuarios WHERE correo = '{$email}' AND contrasenha = '{$contrasenha}'";
        $login = $this->pdo->query($sql);
        if ($login && $login->rowCount() == 1) {
            return $login->fetch();
        }
        return false;
    }


    public function emailExist($email)
    {
        $sql = "SELECT * FROM usuarios WHERE correo = '{$email}'";
        $login = $this->pdo->query($sql);
        if ($login && $login->rowCount() == 1) {
            return true;
        }
        return false;
    }

    public function changePassword($email,$pw)
    {
        $sql = "UPDATE usuarios SET contrasenha='{$pw}' WHERE correo = '{$email}'";
        $this->pdo->query($sql);
    }
    public function getNombre($email)
    {
        $sql = "SELECT concat(nombre,' ',apellido) as nombreC FROM usuarios WHERE correo = '{$email}'";
        $aux = $this->pdo->query($sql);
        if ($aux && $aux->rowCount() == 1) {
            return $aux->fetch();
        }
        return false;
    }

    public function getUserInfo($email)
    {
        $sql = "SELECT * FROM usuarios WHERE correo = '{$email}'";
        $aux = $this->pdo->query($sql);
        if ($aux && $aux->rowCount() == 1) {
            return $aux->fetch();
        }
        return false;
    }

    
    public function updateUser($email,$foto,$nombre,$apellido,$telefono,$contrasenha)
    {
        $sql = "UPDATE usuarios SET contrasenha='{$contrasenha}',nombre='{$nombre}',foto_perfil='{$foto}',apellido='{$apellido}',telefono='{$telefono}' WHERE correo = '{$email} '";
        $this->pdo->query($sql);
    }
}
