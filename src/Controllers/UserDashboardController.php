<?php

namespace App\Controllers;

use App\Config\Session;
use App\Dto\CreateUrlDto;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class UserDashboardController extends Controller
{

    public function __construct(private Session $session) {}
    public function index(Request $req, Response $res)
    {
        $view = $this->render("dashboard/index");
        $res->getBody()->write($view);
        return $res;
    }


    public function createUrl(Request $req, Response $res)
    {
        $view = $this->render("dashboard/create");
        $res->getBody()->write($view);
        return $res;
    }


    public function storeUrl(Request $req, Response $res)
    {

        $originalUrl = $req->getParsedBody()["original"];
        $user_id = $this->session->get("user")->id;
        $url_dto =  new CreateUrlDto($originalUrl, $user_id);

        // *** Service  $url_dto
        return $res;
    }
}
