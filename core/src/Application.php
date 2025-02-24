<?php namespace Main\Core;

use Main\Core\Database\Database;

class Application
{
    public Router $router;

    public static $app;
    public static $MAIN_ROUTE;

    public Database $db;
    public Request $request;
    public Response $response;
    public Session $session;
    public View $view;

    public function __construct($mainRoute)
    {
        $this->router = new Router;
        self::$MAIN_ROUTE = $mainRoute;
        self::$app = $this;
        $this->db = Database::getInstance();
        $this->request = new Request;
        $this->response = new Response;
        $this->session = new Session;
        $this->view = new View;
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}