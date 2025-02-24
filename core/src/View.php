<?php namespace Main\Core;

use Jenssegers\Blade\Blade;
use Rakit\Validation\ErrorBag;



class View
{
    protected Blade $blade;

    public function __construct()
    {
        $this->blade = new Blade(
            Application::$MAIN_ROUTE ."/resources/views",
            Application::$MAIN_ROUTE . "/storage/cache/views"
        );

        $this->blade->share('errors', session()->flash('errors') ?? new ErrorBag());
        $this->blade->share('old', function($key){
            $inputs = session()->flash('old_inputs') ?? [];
            return $inputs[$key] ?? "";
        });
    }

    public function render(string $view,array $data = []) : string
    {
        return $this->blade->render($view, $data);
    }
}