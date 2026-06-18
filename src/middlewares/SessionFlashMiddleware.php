<?php

namespace App\middlewares;

use DI\Container;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class SessionFlashMiddleware
{

    public function __construct(private Container $container) {}
    public function __invoke(ServerRequestInterface $request, RequestHandlerInterface $next)
    {

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $this->container->get('flash')->__construct($_SESSION);
        return $next->handle($request);
    }
}
