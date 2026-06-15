<?php

namespace App\Database\Migrations;

require_once dirname(__DIR__) . "/Db.php";

use App\Database\Db;

class CreateUrlsTable
{

    public function __construct(private Db $db) {}

    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS urls (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            origin TEXT NOT NULL,
            short TEXT NOT NULL UNIQUE,
            user_id INTEGER
            FOREIGN KEY(user_id) REFERENCES user(id)
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
    new CreateUrlsTable(new Db())->up();
} else if ($option === "down") {
    new CreateUrlsTable(new Db())->down();
} else {
    echo "Unkown Command";
}
