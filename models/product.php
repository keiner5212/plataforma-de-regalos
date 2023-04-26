<?php

class Product
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new Database)->connect();
    }

    public function getProducts()
    {
        $sql = "SELECT * FROM 	articulos";
        $aux = $this->pdo->query($sql);
        return $aux->fetch();
    }
}
