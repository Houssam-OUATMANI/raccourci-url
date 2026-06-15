<?php

namespace App\Mappers;

use App\Entities\User;

class UserMapper
{

    public function map(array $data): User
    {

        return new User()
            ->set_id($data['id'])
            ->set_username($data['username'])
            ->set_email($data['email'])
            ->set_role($data["role"])
            ->set_password($data['password']);
    }

    /**
     * @return User[]
     */
    public function map_collection(array $data): array
    {
        return array_map(fn($d) => $this->map($d), $data);
    }
}
