<?php


namespace App\Entities;


class User
{

    public ?int $id;
    public string $username;
    public string $email;
    public string $password;
    public string $role;


    public function set_id(int $id): self
    {
        $this->id = $id;
        return $this;
    }


    public function set_username(string $username): self
    {
        $this->username = $username;
        return $this;
    }


    public function set_email(string $email): self
    {
        $this->email = $email;
        return $this;
    }


    public function set_password(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function set_role(string $role): self
    {
        $this->role = $role;
        return $this;
    }
}
