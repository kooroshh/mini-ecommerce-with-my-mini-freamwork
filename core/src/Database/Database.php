<?php namespace Main\Core\Database;

use Exception;
use PDO;

class Database
{
    public PDO $pdo;
    public Migrations $migration;

    public function __construct()
    {
        try{
            $this->pdo = new PDO("mysql:host=localhost;dbname=mvc","root","");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->migration = new Migrations($this);
        }catch(Exception $e){
            throw new Exception("404 Not Found");
        }

    }


}


