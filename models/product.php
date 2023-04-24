<?php

class Product
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = (new Database)->connect();
    }

}
