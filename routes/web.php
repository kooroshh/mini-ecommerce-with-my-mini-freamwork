<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PanelController;
use App\Http\Controllers\Auth\RegisterController;
use Main\Core\Router;

Router::get("/articles/{slug}/edit/{id:\d+}", function(){
    return "Hello";
});


Router::get("/auth/register", [RegisterController::class, "registerView"]);
Router::post("/auth/register", [RegisterController::class, "register"]);

Router::get("/auth/logout", [LoginController::class, "logout"]);

Router::get("/auth/login", [LoginController::class, "loginView"]);
Router::post("/auth/login", [LoginController::class, "login"]);

Router::get('/user', [PanelController::class, "index"]);

