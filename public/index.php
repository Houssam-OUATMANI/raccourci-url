<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use Slim\Factory\AppFactory;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

require dirname(__DIR__) . "/vendor/autoload.php";



$app = AppFactory::create();

$app->get("/", [HomeController::class,  'index']);
$app->get("/about", [HomeController::class,  'about'] );


$app->get("/inscription", [AuthController::class, 'register']);
$app->get("/connexion", [AuthController::class, 'login']);

$app->run();