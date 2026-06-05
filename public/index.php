<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use DI\ContainerBuilder;
use Slim\Factory\AppFactory;


require dirname(__DIR__) . "/vendor/autoload.php";



$container = new ContainerBuilder()->build();
AppFactory::setContainer($container);
$app = AppFactory::create();


$app->addErrorMiddleware(true, true, true);


$app->get("/", [HomeController::class,  'index']);
$app->get("/about", [HomeController::class,  'about']);
$app->get("/inscription", [AuthController::class, 'register']);
$app->post("/inscription", [AuthController::class, 'handle_register']);
$app->get("/connexion", [AuthController::class, 'login']);
$app->run();


