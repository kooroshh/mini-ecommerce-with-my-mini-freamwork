<?php
ini_set('display_errors', 1);
use Main\Core\Request;
require_once "./../vendor/autoload.php";

$app = new Main\Core\Application(dirname(__DIR__));

$app->router->setRouterFile(__DIR__ . "/../routes/web.php")
            ->setRouterFile(__DIR__ . "/../routes/api.php");


$app->run();
