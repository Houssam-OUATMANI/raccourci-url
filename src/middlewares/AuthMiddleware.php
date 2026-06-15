<?php

namespace App\middlewares;

use App\Config\Session;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Psr7\Response;

class AuthMiddleware
{
    public function __construct(private Session $session) {}

    public function __invoke(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // Redirige vers login si l'utilisateur n'est pas authentifié
        if (!$this->session->get("user")) {
            $response = new Response();
            return $response->withHeader("Location", "/connexion")->withStatus(302);
        }
        
        return $handler->handle($request);
    }
}
