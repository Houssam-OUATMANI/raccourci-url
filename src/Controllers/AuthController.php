<?php

namespace App\Controllers;

use App\Dto\CreateUserDto;
use App\Services\AuthService;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class AuthController extends Controller {


    public function __construct(private AuthService $service)
    {
      
    }

    public function register(Request $req, Response $res) {
        $view = $this->render("auth/register");
        $res->getBody()->write($view);
        return $res;
    }

     public function handle_register(Request $req, Response $res) {
        $data = $req->getParsedBody();
        $userDto = new CreateUserDto($data["username"], $data["email"], $data["password"]);
        $this->service->handle_register($userDto);
        
    }


      public function login(Request $req, Response $res) {
        $view = $this->render("auth/login");
        $res->getBody()->write($view);
        return $res;
    }
}