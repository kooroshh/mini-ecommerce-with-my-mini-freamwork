<?php namespace Main\Core;

use Jenssegers\Blade\Blade;



class View
{
    protected Blade $blade;

    public function __construct()
    {
        $this->blade = new Blade(
            Application::$MAIN_ROUTE ."/resources/views",
            Application::$MAIN_ROUTE . "/storage/cache/views"
        );
    }

    public function render(string $view,array $data = []) : string
    {
        return $this->blade->render($view, $data);
    }
}