<?php namespace Main\Core;

use Main\Core\Database\Database;

class Application
{
    public Router $router;

    public static $app;
    public static $MAIN_ROUTE;

    public Database $db;

    public function __construct($mainRoute)
    {
        $this->router = new Router;
        self::$MAIN_ROUTE = $mainRoute;
        self::$app = $this;
        $this->db = new Database();
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}