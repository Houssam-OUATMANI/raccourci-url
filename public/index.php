<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\UserDashboardController;
use App\middlewares\AuthMiddleware;
use App\middlewares\GuestMiddleware;
use App\middlewares\SessionFlashMiddleware;
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

$app->add(SessionFlashMiddleware::class);
$app->addErrorMiddleware(true, true, true);


$app->get("/", [HomeController::class,  'index']);
$app->get("/about", [HomeController::class,  'about'])->add(AuthMiddleware::class);
$app->post("/deconnexion", [AuthController::class, 'logout'])->add(AuthMiddleware::class);
$app->get("/tableau-de-bord", [UserDashboardController::class, 'index'])->add(AuthMiddleware::class);
$app->get("/lien/ajouter", [UserDashboardController::class, 'createUrl'])->add(AuthMiddleware::class);
$app->post("/lien/ajouter", [UserDashboardController::class, 'storeUrl'])->add(AuthMiddleware::class);

$app->get("/lien/editer/{id}", [UserDashboardController::class, 'editUrl'])->add(AuthMiddleware::class);
$app->post("/lien/editer/{id}", [UserDashboardController::class, 'updateUrl'])->add(AuthMiddleware::class);
$app->post("/lien/supprimer/{id}", [UserDashboardController::class, 'destroyUrl'])->add(AuthMiddleware::class);








$app->get("/inscription", [AuthController::class, 'register'])->add(GuestMiddleware::class);
$app->post("/inscription", [AuthController::class, 'handle_register'])->add(GuestMiddleware::class);
$app->get("/connexion", [AuthController::class, 'login'])->add(GuestMiddleware::class);
$app->post("/connexion", [AuthController::class, 'handle_login'])->add(GuestMiddleware::class);

$app->run();
