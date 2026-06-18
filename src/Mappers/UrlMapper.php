<?php

namespace App\Mappers;

use App\Entities\Url;
use App\Entities\User;

class UrlMapper
{

    public function map(array $data): Url
    {

        return new Url()
            ->set_id($data['id'])
            ->set_origin($data['origin'])
            ->set_short($data['short'])
            ->set_is_public($data["is_public"])
            ->set_user_id($data["user_id"]);
    }

    /**
     * @return User[]
     */
    public function map_collection(array $data): array
    {
        return array_map(fn($d) => $this->map($d), $data);
    }
}
