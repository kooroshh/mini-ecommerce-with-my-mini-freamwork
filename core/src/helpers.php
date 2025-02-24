<?php

// Global Functions

use Main\Core\Application;
use Main\Core\Request;

if(!function_exists("dd"))
{
    function dd(mixed $value) : void
    {
        var_dump($value);die;
    }
}

if(!function_exists("app"))
{
    function app() : Application
    {
        return Application::$app;
    }
}

if(!function_exists("request"))
{
    function request(string $key = null) : Request|string
    {
        if(is_null($key))
            return app()->request;

        return app()->request->input($key);
    }
}
