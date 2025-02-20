<?php namespace Main\Core;


use ReflectionMethod;

class Router
{
    static private array $routes = [
        "get" => [],
        "post" => []
    ];

    protected Request $request;

    protected array $routerFiles = [];

    public function __construct()
    {
        $this->request = new Request;
    }

    static public function get(string $url, $callback) : void
    {
        self::addRoutes("get", $url, $callback);
    }

        static public function view(string $url, $callback) : void
    {
        self::addRoutes("get", $url, $callback);
    }

    static public function post(string $url, $callback) : void
    {
        self::addRoutes("post", $url, $callback);
    }

    public function setRouterFile(string $path) : Router
    {
        $this->routerFiles[$path] = $path;
        return $this;
    }

    private function getCallbackFromDynamicRout() : array|bool
    {
        $method = $this->request->getMethod();
        $url = $this->request->getUrl();

        $routes = self::$routes[$method];

        foreach($routes as $route => $callback)
        {
            $routeNames = [];
            if(!$route)
                continue;
            
            if(preg_match_all("/\{(\w+)(:[^}]+)?}/",$route,$matches))
            {
                $routeNames = $matches[1];
            }
            

            $routeRegex = $this->convertRouteToRegex($route);


            if(preg_match_all($routeRegex, $url, $matches))
            {
                $values = [];
                unset($matches[0]);
                foreach($matches as $match)
                {
                    $values[] = $match[0];
                }
                
                $routeParams = array_combine($routeNames, $values);

                return[0 => $callback, 1 => $routeParams];
            }
            
        }

        return false;
    }

    public function resolve()
    {

        foreach($this->routerFiles as $file)
        {
            require_once $file;
        }


        $method = $this->request->getMethod();
        $url = $this->request->getUrl();

        $callback = self::$routes[$method][$url] ?? false;
        $params = [];
        if(!$callback)
        {
            $routCallback = $this->getCallbackFromDynamicRout();

            if(!$routCallback)
            {
                throw new \Exception("404 Not Found");
            }

            $callback = $routCallback[0];
            $params = $routCallback[1];
        }

        if(is_string($callback))
        {
            return (new View)->render("about-me");
        }

        if(is_array($callback))
        {
            $controllerMethod = new ReflectionMethod($callback[0], $callback[1]);

            $autoInjections = [];
            foreach($controllerMethod->getParameters() as $key => $value)
            {
                if($value->getType())
                {
                    $class = $value->getType()->getName();
                    if(class_exists($class))
                    {
                        $autoInjections[] = new $class;
                    }
                }
            }

            return $controllerMethod->invoke(new $callback[0], ...$autoInjections,  ...$params);
        }

        return call_user_func($callback,...array_values($params));
    }

    protected function convertRouteToRegex(string $route) : string
    {
        return "@^" . preg_replace_callback(
                "/\{\w+(:([^}]+))?}/",
              fn($matches)=> isset($matches[2]) ? "({$matches[2]})" : "([-\w]+)",
               $route) . "$@";
    }

    static private function addRoutes($method, $url, $callback)
    {
        self::$routes[$method][$url] = $callback;
    }

}