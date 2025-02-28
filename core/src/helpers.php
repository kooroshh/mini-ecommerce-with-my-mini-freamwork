<?php

// Global Functions

use Main\Core\Application;
use Main\Core\Auth;
use Main\Core\Request;
use Main\Core\Response;
use Main\Core\Session;

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

if(!function_exists("response"))
{
    function response() : Response
    {
        return app()->response;
    }
}

if(!function_exists("redirect"))
{
    function redirect(string $url) : Response
    {
        return response()->redirect($url);
    }
}

if(!function_exists("session"))
{
    function session() : Session
    {
        return app()->session;
    }
}

if(!function_exists("auth"))
{
    function auth() : Auth
    {
        return app()->auth;
    }
}

if(!function_exists("userImage"))
{
    function userImage() : string
    {
        $defaultImage = auth()->user()->image;
        $image = "/assets/images/$defaultImage";
        return $image;
    }
}

if(!function_exists("isAdmin"))
{
    function isAdmin() : bool
    {
        $user = auth()->user()->is_admin ?? false;
        return $user;
    }
}

if(!function_exists("getUserIP"))
{
    function getUserIP() {
        if (!empty($_SERVER['REMOTE_ADDR'])) {

            return $_SERVER['REMOTE_ADDR'];

        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {


            return $_SERVER['HTTP_X_FORWARDED_FOR'];

        } else {
            return $_SERVER['HTTP_CLIENT_IP'];
        }
    }
}



