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
        $sql = "SELECT * FROM 	categorias";
        $aux = $this->pdo->query($sql);
        return $aux->fetch();
    }
}
