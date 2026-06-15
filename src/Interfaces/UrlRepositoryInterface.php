<?php

namespace App\Interfaces;

use App\Entities\Url;

interface UrlRepositoryInterface
{
    /**
     * @return Url[]
     */
    public function all(): array;


    public function find_by_short(string $short) : ?Url;


    public function create(Url $url) : bool;
}
