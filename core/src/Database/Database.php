<?php namespace Main\Core\Database;

use Exception;
use Main\Core\Database\Migrations;
use Main\Core\Exceptions\NotFoundException;

use Main\Core\View;
use PDO;

class Database
{
    public PDO $pdo;
    public Migrations $migration;
    protected static Database $instance;

    private function __construct()
    {

        try
        {
            $this->pdo = new PDO("mysql:host=localhost;dbname=mvc","root","");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->migration = new Migrations($this);            
        }catch(Exception $e)
        {
            echo <<<HTML
            
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Connection Error</title>
                    <link rel="stylesheet" href="http://localhost:8080/css/main.css">
                </head>
                <body>


                    <div class="flex h-screen px-1 w-full items-center justify-center">
                        <div class="text-center -mt-14">
                            <span class="text-base font-semibold text-indigo-600">Connection</span>
                            <h1 class="md:mt-4 mt-2 md:text-5xl text-4xl font-semibold tracking-tight text-gray-900">Connection not support</h1>
                            <p class="mt-6 text-lg font-medium text-gray-500 leading-8">Sorry, we couldn’t connect to our services! Please wait.</p>
                            <div class="mt-10 flex items-center justify-center">
                                <a href="mailto:kooroshsoleymani98@gmail.com" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500">Call support</a>
                            </div>
                        </div>
                    </div>



                </body>
                </html>

            
            HTML;die;
        }


    }

    public static function getInstance()
    {
        if(empty(self::$instance))
            self::$instance = new Database();

        return self::$instance;
    }


}


