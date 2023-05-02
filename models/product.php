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
        $elementos=[];
        $sql = "SELECT * FROM 	articulos";
        $aux = $this->pdo->query($sql);
        while ($filas = $aux->FETCHALL(PDO::FETCH_ASSOC)) {
            $elementos[] = $filas;
        }
        return $elementos;
    }
    
    public function addProduct( $nombre, $imagen, $descripcion, $categoria, $propietario)
    {
        $sql = "INSERT INTO articulos(`nombre`, `imagen`, `descripcion`, `categoria`, `propietario`,`adquirido`) VALUES ('{$nombre}','{$imagen}','{$descripcion}','{$categoria}','{$propietario}',false)";
        $this->pdo->query($sql);
    }

    public function searchProductByID($id)
    {
        $elementos=[];
        $sql="SELECT * FROM articulos WHERE `id_articulo` = {$id}";
        $aux = $this->pdo->query($sql);
        while ($filas = $aux->FETCHALL(PDO::FETCH_ASSOC)) {
            $elementos[] = $filas;
        }
        return $elementos;
    }

    public function changeOwner($email,$id)
    {
        $sql = "UPDATE articulos SET propietario='{$email}', adquirido=true WHERE id_articulo = '{$id}'";
        $this->pdo->query($sql);
    }
    
    public function editProduct( $nombre, $imagen, $descripcion, $categoria,$id)
    {
        if ($imagen!="x") {
            $sql = "UPDATE articulos SET nombre='{$nombre}', imagen='{$imagen}', descripcion='{$descripcion}', categoria='{$categoria}' WHERE id_articulo = '{$id}'";
        }else{
            $sql = "UPDATE articulos SET nombre='{$nombre}', descripcion='{$descripcion}', categoria='{$categoria}' WHERE id_articulo = '{$id}'";
        }
        
        $this->pdo->query($sql);
    }

    public function filterByName($name)
    {
        $elementos=[];
        $sql="SELECT * FROM articulos WHERE nombre LIKE '%{$name}%'";
        $aux = $this->pdo->query($sql);
        while ($filas = $aux->FETCHALL(PDO::FETCH_ASSOC)) {
            $elementos[] = $filas;
        }
        return $elementos;
    }
    public function filterByCategory($name)
    {
        $elementos=[];
        $sql="SELECT * FROM articulos WHERE categoria LIKE '%{$name}%'";
        $aux = $this->pdo->query($sql);
        while ($filas = $aux->FETCHALL(PDO::FETCH_ASSOC)) {
            $elementos[] = $filas;
        }
        return $elementos;
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM articulos WHERE id_articulo = '{$id}'";
        $this->pdo->query($sql);
    }
}
