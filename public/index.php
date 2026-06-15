<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\middlewares\AuthMiddleware;
use App\middlewares\GuestMiddleware;
use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use Slim\Flash\Messages;


require dirname(__DIR__) . "/vendor/autoload.php";


$container = new ContainerBuilder()->addDefinitions(
    [
        'flash' => function () {
            $storage = [];
            return new Messages($storage);
        }
    ]
)
    ->build();
AppFactory::setContainer($container);
$app = AppFactory::create();

$app->add(
    function ($request, $next) {
       

        // Start PHP session
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        // Change flash message storage
        $this->get('flash')->__construct($_SESSION);

        return $next->handle($request);
    }
);


$app->addErrorMiddleware(true, true, true);


$app->get("/", [HomeController::class,  'index']);
$app->get("/about", [HomeController::class,  'about'])->add(AuthMiddleware::class);
$app->post("/deconnexion", [AuthController::class, 'logout'])->add(AuthMiddleware::class);





$app->get("/inscription", [AuthController::class, 'register'])->add(GuestMiddleware::class);
$app->post("/inscription", [AuthController::class, 'handle_register'])->add(GuestMiddleware::class);
$app->get("/connexion", [AuthController::class, 'login'])->add(GuestMiddleware::class);
$app->post("/connexion", [AuthController::class, 'handle_login'])->add(GuestMiddleware::class);

$app->run();
