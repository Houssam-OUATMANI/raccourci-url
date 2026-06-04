<?php

namespace App\Database;

use PDO;
use PDOException;

class Db
{

    public function pdo()
    {
        try {
            $pdo = new PDO("sqlite:./db.sqlite");
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $th) {
            var_dump($th->getMessage());  
        }
    }
}
