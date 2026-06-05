<?php

namespace App\Interfaces;

use App\Entities\User;

interface UserRepositoryInterface
{
    /**
     * @return User[]
     */
    public function all(): array;


    public function find_by_email(string $email) : ?User;


    public function create(User $user) : bool;
}
