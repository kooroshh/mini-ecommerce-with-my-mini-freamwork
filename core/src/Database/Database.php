<?php namespace Main\Core\Database;

use Exception;
use Main\Core\Database\Migrations;
use Main\Core\Exceptions\SqlException;
use PDO;

class Database
{
    public PDO $pdo;
    public Migrations $migration;
    protected static Database $instance;

    private function __construct()
    {

        try{
            $this->pdo = new PDO("mysql:host=localhost;dbname=mvc","root","");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->migration = new Migrations($this);
        }catch(Exception $e)
        {
            echo "Connection Error";die;
        }

    }

    public static function getInstance()
    {
        if(empty(self::$instance))
            self::$instance = new Database();

        return self::$instance;
    }


}


