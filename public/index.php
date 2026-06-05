<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Repositories\UserRepo;
use App\Services\AuthService;
use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

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


