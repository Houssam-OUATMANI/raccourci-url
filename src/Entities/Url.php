<?php


namespace App\Entities;


class Url
{

    public ?int $id;
    public string $origin;
    public string $short;
    public bool $is_public; 
    public int $user_id;


    public function set_id(int $id): self
    {
        $this->id = $id;
        return $this;
    }


    public function set_origin(string $origin): self
    {
        $this->origin = $origin;
        return $this;
    }


    public function set_short(string $short): self
    {
        $this->short = $short;
        return $this;
    }


    public function set_user_id(int $user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }
}
