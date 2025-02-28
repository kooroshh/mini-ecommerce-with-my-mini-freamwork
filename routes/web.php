<?php


use App\Http\Controllers\Auth\Panel\AdminPanel\AdminPanelDashboardController;
use App\Http\Controllers\Auth\Panel\AdminPanel\AdminPanelUsersController;
use App\Http\Controllers\Auth\PanelController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SignInController;
use Main\Core\Router;

Router::get("/articles/{slug}/edit/{id:\d+}", function(){
    return "Hello";
});



Router::view('/contact-us',"contact-us.contact-us");
Router::view('/about-us',"about-us.about-us");


Router::get("/auth/register", [RegisterController::class, "registerView"]);
Router::post("/auth/register", [RegisterController::class, "register"]);

Router::get("/auth/logout", [SignInController::class, "logout"]);


Router::get("/auth/sign-in", [SignInController::class, "singInView"]);
Router::post("/auth/sign-in", [SignInController::class, "singIn"]);

Router::get('/admin-panel', [AdminPanelDashboardController::class, "panelView"]);
Router::get('/admin-panel/users', [AdminPanelUsersController::class, "panelView"]);

