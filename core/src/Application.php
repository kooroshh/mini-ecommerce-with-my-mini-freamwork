<?php namespace Main\Core;

use App\Models\Views;
use Exception;
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
    public Auth $auth;

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
        $this->auth = new Auth;
    }

    public function run()
    {
        
        try{
            echo $this->router->resolve();
            (new Views)->create([
                "client_ip" => getUserIP()
            ]);
            logOutBanUsers();
            
        }catch(Exception $e)
        {
            if($e->getCode())
            {
                echo $this->view->render("errors.{$e->getCode()}", [
                    "error" => $e
                ]);
                return;
            }

            echo $this->view->render("errors.error", [
                "error" => $e
            ]);
        }
    }
}