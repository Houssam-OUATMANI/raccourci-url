<?php

namespace App\Repositories;

use App\Database\Db;
use App\Entities\Url;
use App\Interfaces\UrlRepositoryInterface;
use App\Mappers\UrlMapper;
use Override;

class UrlRepo implements UrlRepositoryInterface
{

    public function __construct(private Db $db, private UrlMapper $mapper) {}


    #[Override]
    public function all(): array
    {
        $query = "SELECT * FROM urls";
        $stmt = $this->db->pdo()->query($query);
        $data = $stmt->fetchAll();
        return $this->mapper->map_collection($data);
    }


    #[Override]
    public function find_all_by_user_id(int $user_id): array
    {
        $query = "SELECT * FROM urls WHERE user_id = ?";
        $stmt = $this->db->pdo()->prepare($query);
        $stmt->execute([$user_id]);
        $data = $stmt->fetchAll();
        return $this->mapper->map_collection($data);
    }

    #[Override]
    public function find_by_id(int $url_id): Url
    {
        $query = "SELECT * FROM urls WHERE id = ?";
        $stmt = $this->db->pdo()->prepare($query);
        $stmt->execute([$url_id]);
        $data = $stmt->fetch();
        return $this->mapper->map($data);
    }


    #[Override]
    public function find_by_short(string $short): ?Url
    {
        $query = "SELECT * FROM urls WHERE short = ?";
        $stmt = $this->db->pdo()->prepare($query);
        $stmt->execute([$short]);
        $data = $stmt->fetch();
        if (!$data) return null;
        return $this->mapper->map($data);
    }


    #[Override]
    public function create(Url $url): bool
    {
        $query = "INSERT INTO urls(origin, short, is_public, user_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->pdo()->prepare($query);
        return $stmt->execute([$url->origin, $url->short, $url->is_public, $url->user_id]);
    }



    public function destroy(int $id)
    {
        $query = "DELETE FROM urls WHERE id = ?";
        $stmt = $this->db->pdo()->prepare($query);
        return $stmt->execute([$id]);
    }
}
