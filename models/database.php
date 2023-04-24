<?php

class Database
{
    public $db;

    public function __construct()
    {
        $servername = "localhost";
        $dbname = "data";
        $username = "root";
        $password = "";
        $this->db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function connect()
    {
        return $this->db;
    }
}
