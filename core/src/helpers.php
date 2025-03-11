<?php

// Global Functions

use App\Models\User;
use Main\Core\Application;
use Main\Core\Auth;
use Main\Core\Exceptions\NotFoundException;
use Main\Core\Request;
use Main\Core\Response;
use Main\Core\Session;

if(!function_exists("dd"))
{
    function dd(mixed ...$values) : void
    {
        foreach($values as $value)
        {
            var_dump($value);
        }
        die;
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

if(!function_exists("image"))
{
    function image(string $imageName, string $path = "") : string
    {
        $image = "/assets/images/" . ($path != "" ? "$path/" : "") . "$imageName";
        return $image;
    }
}

if(!function_exists("saveImage"))
{
    function saveImage(array $image, string $path = "") : string
    {
        $imageName = $image['name'];
        $image = $image["tmp_name"];
        $path = app()::$MAIN_ROUTE . "/public/assets/images/" . ($path != "" ? "$path" : "");
        
        $files = false;
        
        if(is_dir($path))
        {
            $files = array_diff(scandir($path), ['.', '..']);
        }

        $result = $path . "/$imageName";
        if(!file_exists($path))
        {
            mkdir($path);
        }

        if($files)
        {
            foreach ($files as $file) 
            {
                $filePath = $path . DIRECTORY_SEPARATOR . $file; 
                unlink($filePath); 
                
            }  
        }


        move_uploaded_file($image, $result);
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

if(!function_exists("banUserToggler"))
{
    function banUserToggler($userId, string $method = "ban") 
    {

        switch($method)
        {
            case "ban"  :
            {
                (new User())->update($userId,[
                    "is_ban" => true
                ]);
                return;
            }
        
            case "unBan" : 
            {
                (new User())->update($userId,[
                    "is_ban" => false
                ]);

                return;
            }

        };

    }
}

if(!function_exists("logOutBanUsers"))
{
    function logOutBanUsers() 
    {

        $banUsers = (new User())->select('id')->where('is_ban', true)->get();
        foreach($banUsers as $key => $value)
        {
            if(auth()->check())
            {
                $userId = auth()->user()->id;
                if($userId == $value->id)
                {
                    auth()->logout();
                }
            }
        }

    }
}



