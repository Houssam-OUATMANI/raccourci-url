<?php

namespace App\Dto;


class LoginUserDto
{
    public function __construct(
        public string $email,
        public string $password,
    ) {}
}
