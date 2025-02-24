<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UsersController;
use Main\Core\Request;
use Main\Core\Router;

Router::get("/articles/{slug}/edit/{id:\d+}", [ArticlesController::class, "edit"]);


Router::get("/auth/register", [RegisterController::class, "registerView"]);
Router::post("/auth/register", [RegisterController::class, "register"]);



