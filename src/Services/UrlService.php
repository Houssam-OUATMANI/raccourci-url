<?php


namespace App\Services;

use App\Dto\CreateUrlDto;
use App\Entities\Url;
use App\Repositories\UrlRepo;

class UrlService
{

    public function __construct(private UrlRepo $repo) {}

    public function index()
    {
        return $this->repo->all();
    }


    public function show(string $short)
    {
        $url = $this->repo->find_by_short($short);
        if (!$url) return false;
        return $url->origin;
    }


    public function store(CreateUrlDto $dto)
    {

        $short = $this->generate_uniqid();

      

        // TODO VERFIY ID SHORT ID PRESENT IN URLS TABLE
        if($this->show($short))  {
            // REGENERER
        }
    
        // TODO IF YES, THEN GENERATE RECURSIVELY ANOTHER SHORT
        // TODO OTHERWISE CREATE A NEW URL AND CALL PERSISTENCE LAYER
        

        $url = new Url()
            ->set_origin($dto->origin)
            ->set_short($short)
            ->set_is_public($dto->is_public)
            ->set_user_id($dto->user_id);

        return $this->repo->create($url);
    }


    private function generate_uniqid() : string {
        return substr(uniqid(rand()), 0, 6);
    }
}

