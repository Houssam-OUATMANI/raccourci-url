<?php

use App\Controllers\HomeController;
use Slim\Factory\AppFactory;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

require dirname(__DIR__) . "/vendor/autoload.php";



$app = AppFactory::create();

$app->get("/", [HomeController::class,  'index']);
$app->get("/about", [HomeController::class,  'about'] );


$app->run();