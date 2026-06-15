<?php


namespace App\Services;

use App\Dto\CreateUserDto;
use App\Dto\LoginUserDto;
use App\Entities\User;
use App\Mappers\UserDtoMapper;
use App\Repositories\UserRepo;

class AuthService
{

    public function __construct(private UserRepo $repo, private UserDtoMapper $mapper) {}

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


    public function handle_login(LoginUserDto $userDto)
    {
        $user = $this->repo->find_by_email($userDto->email);
        if (!$user) return false;
        $match = password_verify($userDto->password, $user->password);
        if (!$match) return false;
        return $this->mapper->map($user);
    }
}
