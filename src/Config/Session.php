<?php

namespace App\Config;


class Session
{

    public function add(string $key, mixed $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get(string $key)
    {
        if (!$this->has($key)) return false;
        return $_SESSION[$key];
    }


    public function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    public function remove(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public function clear(): void
    {
        $_SESSION = [];
        session_destroy();
    }
}
