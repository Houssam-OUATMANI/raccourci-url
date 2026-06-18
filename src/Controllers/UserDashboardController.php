<?php

namespace App\Controllers;

use App\Config\Session;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class UserDashboardController extends Controller
{

        public function __construct(private Session $session)
        {
            
        }
    public function index(Request $req, Response $res)
    {
        $view = $this->render("dashboard/index");
        $res->getBody()->write($view);
        return $res;
    }


     public function create(Request $req, Response $res)
    {
        $view = $this->render("dashboard/create");
        $res->getBody()->write($view);
        return $res;
    }


     public function storeUrl(Request $req, Response $res)
    {
        dd($req->getParsedBody(), $this->session->get("user") );
        
        $view = $this->render("dashboard/create");
        $res->getBody()->write($view);
        return $res;
    }
}
