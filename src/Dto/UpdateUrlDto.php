<?php

namespace App\Dto;


class UpdateUrlDto
{
    public function __construct(
        public string $origin,
        public int $user_id,
        public bool $is_public,
        public int $url_id
    ) {}
}
