<?php

namespace App\Dto;


class CreateUrlDto
{
    public function __construct(
        public string $origin,
        public int $user_id,
    ) {}
}
