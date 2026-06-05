<?php

namespace App\Controllers;

use App\Dto\CreateUserDto;
use App\Services\AuthService;
use DI\Container;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class AuthController extends Controller
{


    public function __construct(private AuthService $service, protected Container $container) {}

    public function register(Request $req, Response $res)
    {
        $view = $this->render("auth/register");
        $res->getBody()->write($view);
        return $res;
    }

    public function handle_register(Request $req, Response $res)
    {
        $data = $req->getParsedBody();
        $userDto = new CreateUserDto($data["username"], $data["email"], $data["password"]);
        $success = $this->service->handle_register($userDto);

        if (!$success) {
            $this->container->get("flash")->addMessage("error", "Identifiant Incorrect");
            return $res->withHeader("Location", "/inscription")->withStatus(302);
        }

        $this->container->get("flash")->addMessage("success", "Inscription validee");
        return $res->withHeader("Location", "/connexion")->withStatus(302);
    }


    public function login(Request $req, Response $res)
    {
        $view = $this->render("auth/login");
        $res->getBody()->write($view);
        return $res;
    }
}
