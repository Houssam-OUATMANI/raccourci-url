<?php

namespace App\Dto;


class CreateUserDto
{
    public function __construct(
        public string $username,
        public string $email,
        public string $password,
    ) {}
}
