<?php


use App\Http\Controllers\Auth\Panel\AdminPanel\AdminPanelDashboardController;
use App\Http\Controllers\Auth\Panel\AdminPanel\AdminPanelUsersController;
use App\Http\Controllers\Auth\Panel\AdminPanel\Tools\AdminPanelAddUserToolController;
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
Router::get('/admin-panel/users/delete', [AdminPanelUsersController::class, "deleteUserView"]);
Router::post('/admin-panel/users/delete', [AdminPanelUsersController::class, "deleteUser"]);
Router::get('/admin-panel/users/ban', [AdminPanelUsersController::class, "banUserView"]);
Router::post('/admin-panel/users/ban', [AdminPanelUsersController::class, "banUser"]);
Router::get('/admin-panel/users/un-ban', [AdminPanelUsersController::class, "unBanUserView"]);
Router::post('/admin-panel/users/un-ban', [AdminPanelUsersController::class, "unBanUser"]);
Router::get('/admin-panel/users/add', [AdminPanelAddUserToolController::class, "addUserView"]);
Router::post('/admin-panel/users/add', [AdminPanelAddUserToolController::class, "addUser"]);
Router::get('/admin-panel/users/edit', [AdminPanelUsersController::class, "editUserView"]);
Router::post('/admin-panel/users/edit', [AdminPanelUsersController::class, "editUser"]);

