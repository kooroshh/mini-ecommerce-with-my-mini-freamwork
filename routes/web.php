<?php

use App\Http\Controllers\ArticlesController;
use Main\Core\Request;
use Main\Core\Router;

Router::get("/articles/{slug}/edit/{id:\d+}", [ArticlesController::class, "edit"]);
Router::get("/articles/create",[ArticlesController::class, 'createGet']);
Router::post("/articles/create",[ArticlesController::class, 'createPost']);
Router::get('/articles/{id:\d+}', [ArticlesController::class, "index"]);

Router::view('/about-me','about-me');
