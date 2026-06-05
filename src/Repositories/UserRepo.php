<?php

namespace App\Repositories;

use App\Database\Db;
use App\Entities\User;
use App\Interfaces\UserRepositoryInterface;
use App\Mappers\UserMapper;
use Override;

class UserRepo implements UserRepositoryInterface
{

    public function __construct(private Db $db, private UserMapper $mapper) {}


    #[Override]
    public function all(): array
    {
        $query = "SELECT * FROM users";
        $stmt = $this->db->pdo()->query($query);
        $data = $stmt->fetchAll();
        return $this->mapper->map_collection($data);
    }


    #[Override]
    public function find_by_email(string $email): ?User
    {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->pdo()->prepare($query);
        $stmt->execute([$stmt]);
        $data = $stmt->fetch();
        if (!$data) return null;
        return $this->mapper->map($data);
    }


    #[Override]
    public function create(User $user): bool
    {
         $query = "INSERT INTO users(username, email, password) VALUES (?, ?, ?)";
         $stmt = $this->db->pdo()->prepare($query);
         return $stmt->execute([$user->username, $user->email, $user->password]);
    }


}
