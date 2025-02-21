<?php namespace Main\Core\Database;

use PDO;

class Database
{
    public PDO $pdo;
    public Migrations $migration;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=mvc","root","");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->migration = new Migrations($this);
    }


}


