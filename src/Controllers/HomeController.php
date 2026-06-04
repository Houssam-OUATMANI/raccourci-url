<?php

namespace App\Controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;

class HomeController extends Controller
{

    public function index(Request $req, Response $res)
    {
        $view = $this->render("home");
        $res->getBody()->write($view);
        return $res;
    }

     public function about(Request $req, Response $res)
    {
        $res->getBody()->write("<h1>About Page</h1>");
        return $res;
    }
}
