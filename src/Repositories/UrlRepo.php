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
         $query = "INSERT INTO urls(origin, short, user_id) VALUES (?, ?, ?)";
         $stmt = $this->db->pdo()->prepare($query);
         return $stmt->execute([$url->origin, $url->short, $url->user_id]);
    }


}
