<?php

namespace App\Controllers;

abstract class Controller
{

    protected function render(string $path, array $data = [])
    {
        extract($data);
        ob_start();
        require "../src/views/pages/$path.php";
        $content = ob_get_clean();

        ob_start();
        require "../src/views/layout.php";
        return ob_get_clean();
    }
}
