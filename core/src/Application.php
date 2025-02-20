<?php namespace Main\Core;

class Application
{
    public Router $router;

    public static $MAIN_ROUTE;

    public function __construct($mainRoute)
    {
        $this->router = new Router;
        self::$MAIN_ROUTE = $mainRoute;
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}