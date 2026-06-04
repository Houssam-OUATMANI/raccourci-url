<?php

use Slim\Factory\AppFactory;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

require dirname(__DIR__) . "/vendor/autoload.php";



$app = AppFactory::create();


$app->get("/", function (Request $req, Response $res) {
    $res->getBody()->write("<h1>Hello World</h1>");
    return $res;
});


$app->get("/about.php", function (Request $req, Response $res) {
    $res->getBody()->write("<h1>About Page</h1>");
    return $res;
});


$app->run();