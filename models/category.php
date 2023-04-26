<?php
require_once("database.php");

class Category
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new Database)->connect();
    }

    public function getCategories()
    {
        $elementos=[];
        $sql = "SELECT * FROM categorias";
        $aux = $this->pdo->query($sql);
        while ($filas = $aux->FETCHALL(PDO::FETCH_ASSOC)) {
            $elementos[] = $filas;
        }
        return $elementos;
    }

    public function addCategory($nombre)
    {
        $sql = "INSERT INTO categorias (nombre) VALUES ('{$nombre}')";
        $this->pdo->query($sql);
    }
    public function searchCategoryByID($id)
    {
        $elementos=[];
        $sql="SELECT * FROM categorias WHERE `id_categoria` = {$id}";
        $aux = $this->pdo->query($sql);
        while ($filas = $aux->FETCHALL(PDO::FETCH_ASSOC)) {
            $elementos[] = $filas;
        }
        return $elementos;
    }
}
