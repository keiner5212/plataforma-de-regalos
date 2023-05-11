<?php
require_once("database.php");
class DonationHistory
{

    private $pdo;


    //Constructor
    public function __construct()
    {
        $this->pdo = (new Database())->connect();
    }

    public function addProductToHistory($producto, $ExPropietario)
    {
        $sql = "INSERT INTO historialdonaciones(`id_usuario`, `id_articulo`) VALUES ('{$ExPropietario}','{$producto}')";
        $this->pdo->query($sql);
    }

    public function getProductHistory($user)
    {
        $elementos = [];
        $sql = "SELECT * FROM historialdonaciones WHERE id_usuario = '{$user}'";
        $aux = $this->pdo->query($sql);
        while ($filas = $aux->FETCHALL(PDO::FETCH_ASSOC)) {
            $elementos[] = $filas;
        }
        return $elementos;
    }
}
