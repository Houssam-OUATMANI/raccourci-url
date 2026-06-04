<?php

namespace App\Controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;

class AuthController extends Controller {

    public function register(Request $req, Response $res) {
        $view = $this->render("auth/register");
        $res->getBody()->write($view);
        return $res;
    }


      public function login(Request $req, Response $res) {
        $view = $this->render("auth/login");
        $res->getBody()->write($view);
        return $res;
    }
}