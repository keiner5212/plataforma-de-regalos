<?php
require_once("database.php");

class Category
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new Database)->connect();
    }

}
