<?php


namespace App\Services;

use App\Dto\CreateUserDto;
use App\Entities\User;
use App\Repositories\UserRepo;

class AuthService
{

    public function __construct(private UserRepo $repo) {}

    public function handle_register(CreateUserDto $userDto)
    {
        $user = $this->repo->find_by_email($userDto->email);
        if ($user) return false;
        $password = password_hash($userDto->password, PASSWORD_DEFAULT);
        $user = new User()
            ->set_username($userDto->username)
            ->set_email($userDto->email)
            ->set_password($password)
            ->set_role("USER");
        return $this->repo->create($user);
    }
}
