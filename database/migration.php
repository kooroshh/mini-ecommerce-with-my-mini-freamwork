<?php

require_once "./../vendor/autoload.php";

$app = new Main\Core\Application(dirname(__DIR__));


switch($argv[1] ?? false){
    case '--rollback':
        $app->db->migration->rollbackMigrations();
        break;
    default:
        $app->db->migration->applyMigrations();
}

