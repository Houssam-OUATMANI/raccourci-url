<?php

namespace App\Interfaces;

use App\Entities\Url;

interface UrlRepositoryInterface
{
    /**
     * @return Url[]
     */
    public function all(): array;


    /**
     * @return Url[]
     */
   public function find_all_by_user_id(int $user_id): array;



    public function find_by_short(string $short) : ?Url;


    public function create(Url $url) : bool;
}
