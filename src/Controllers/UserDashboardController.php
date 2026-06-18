<?php

namespace App\Controllers;

use App\Config\Session;
use App\Dto\CreateUrlDto;
use App\Services\UrlService;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class UserDashboardController extends Controller
{

    public function __construct(private Session $session, private UrlService $service) {}
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
        $data = $req->getParsedBody();
        $originalUrl = $data["original"];
        $is_public = isset($data["is_public"]) ?? false;
        $user_id = $this->session->get("user")->id;
        $url_dto =  new CreateUrlDto($originalUrl, $user_id, $is_public);


        // *** Service  $url_dto
        $this->service->store($url_dto);
        return $res;
    }
}
