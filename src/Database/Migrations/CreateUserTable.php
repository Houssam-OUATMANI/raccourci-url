<?php

namespace App\Database\Migrations;

require_once dirname(__DIR__) . "/Db.php";

use App\Database\Db;

class CreateUserTable
{

    public function __construct(private Db $db) {}

    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT NOT NULL,
            email TEXT NOT NULL UNIQUE,
            password TEXT NOT NULL,
            role TEXT NOT NULL
        )";

        if ($this->db->pdo()->exec($query)) {
            echo "Migration executee avec success";
        }
    }


    public function down()
    {
        $query = "DROP TABLE IF EXISTS users";
        if ($this->db->pdo()->exec($query)) {
            echo "Migration executee avec success";
        }
    }
}

$option = $argv[1];

if ($option === "up") {
    new CreateUserTable(new Db())->up();
} else if ($option === "down") {
    new CreateUserTable(new Db())->down();
} else {
    echo "Unkown Command";
}
