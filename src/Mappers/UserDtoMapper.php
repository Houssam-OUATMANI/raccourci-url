<?php

namespace App\Mappers;

use App\Dto\UserDto;
use App\Entities\User;

class UserDtoMapper
{

    public function map(User $user): UserDto
    {
        return new UserDto($user->id, $user->username, $user->email, $user->role);
    }
}
