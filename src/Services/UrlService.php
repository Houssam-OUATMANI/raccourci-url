<?php


namespace App\Services;

use App\Dto\CreateUrlDto;
use App\Dto\CreateUserDto;
use App\Dto\LoginUserDto;
use App\Entities\Url;
use App\Entities\User;
use App\Mappers\UserDtoMapper;
use App\Repositories\UrlRepo;
use App\Repositories\UserRepo;

class UrlService
{

    public function __construct(private UrlRepo $repo, private UserDtoMapper $mapper) {}

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

        $short = substr(uniqid(), 0, 6);

        // TODO VERFIY ID SHORT ID PRESENT IN URLS TABLE
        // TODO IF YES, THEN GENERATE RECURSIVELY ANOTHER SHORT
        // TODO OTHERWISE CREATE A NEW URL AND CALL PERSISTENCE LAYER
        

        $url = new Url()
            ->set_origin($dto->origin)
            ->set_short($short)
            ->set_is_public($dto->is_public)
            ->set_user_id($dto->user_id);

        return $this->repo->create($url);
    }
}
