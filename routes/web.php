<?php


use App\Http\Controllers\Panel\AdminPanel\AdminPanelCategoriesController;
use App\Http\Controllers\Panel\AdminPanel\AdminPanelCommentsController;
use App\Http\Controllers\Panel\AdminPanel\AdminPanelDashboardController;
use App\Http\Controllers\Panel\AdminPanel\AdminPanelOrdersController;
use App\Http\Controllers\Panel\AdminPanel\AdminPanelProductsController;
use App\Http\Controllers\Panel\AdminPanel\AdminPanelUsersController;
use App\Http\Controllers\Panel\AdminPanel\Tools\AdminPanelAddCategoryToolController;
use App\Http\Controllers\Panel\AdminPanel\Tools\AdminPanelAddProductToolController;
use App\Http\Controllers\Panel\AdminPanel\Tools\AdminPanelAddUserToolController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Product\SingleProductController;
use App\Http\Controllers\ShoppingCart\ShoppingCartController;
use Main\Core\Router;

Router::get("/articles/{slug}/edit/{id:\d+}", function(){
    return "Hello";
});

// Static Page

Router::view('/contact-us',"contact-us.contact-us");
Router::view('/about-us',"about-us.about-us");


// Authentication

Router::get("/auth/register", [RegisterController::class, "registerView"]);
Router::post("/auth/register", [RegisterController::class, "register"]);

Router::get("/auth/logout", [SignInController::class, "logout"]);

Router::get("/auth/sign-in", [SignInController::class, "singInView"]);
Router::post("/auth/sign-in", [SignInController::class, "singIn"]);

// Admin Panel

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

Router::get('/admin-panel/products', [AdminPanelProductsController::class, "panelView"]);
Router::get('/admin-panel/products/add', [AdminPanelAddProductToolController::class, "addProductView"]);
Router::post('/admin-panel/products/add', [AdminPanelAddProductToolController::class, "addProduct"]);
Router::get('/admin-panel/products/delete', [AdminPanelProductsController::class, "deleteProductView"]);
Router::post('/admin-panel/products/delete', [AdminPanelProductsController::class, "deleteProduct"]);
Router::get('/admin-panel/products/edit', [AdminPanelProductsController::class, "editProductView"]);
Router::post('/admin-panel/products/edit', [AdminPanelProductsController::class, "editProduct"]);

Router::get('/admin-panel/categories', [AdminPanelCategoriesController::class, "panelView"]);
Router::get('/admin-panel/categories/add', [AdminPanelAddCategoryToolController::class, "addUserView"]);
Router::post('/admin-panel/categories/add', [AdminPanelAddCategoryToolController::class, "addUser"]);
Router::get('/admin-panel/categories/delete', [AdminPanelCategoriesController::class, "deleteCategoryView"]);
Router::post('/admin-panel/categories/delete', [AdminPanelCategoriesController::class, "deleteCategory"]);
Router::get('/admin-panel/categories/edit', [AdminPanelCategoriesController::class, "editCategoryView"]);
Router::post('/admin-panel/categories/edit', [AdminPanelCategoriesController::class, "editCategory"]);

Router::get('/admin-panel/unregistered-comments', [AdminPanelCommentsController::class, "unregisteredPanelView"]);
Router::get('/admin-panel/unregistered-comments/register', [AdminPanelCommentsController::class, "registerCommentView"]);
Router::post('/admin-panel/unregistered-comments/register', [AdminPanelCommentsController::class, "registerComment"]);
Router::get('/admin-panel/comments/delete', [AdminPanelCommentsController::class, "deleteCommentView"]);
Router::post('/admin-panel/comments/delete', [AdminPanelCommentsController::class, "deleteComment"]);
Router::get('/admin-panel/comments', [AdminPanelCommentsController::class, "PanelView"]);

Router::get('/admin-panel/orders', [AdminPanelOrdersController::class, "PanelView"]);


// Products

Router::get("/products/{slug}", [SingleProductController::class, "productShow"]);
Router::post("/products/comment/add", [SingleProductController::class, "addComment"]);

// Shopping Cart

Router::get('/shopping-cart', [ShoppingCartController::class, "view"]);
Router::get('/shopping-cart/add', [ShoppingCartController::class, "add"]);
Router::get('/shopping-cart/remove', [ShoppingCartController::class, "remove"]);
