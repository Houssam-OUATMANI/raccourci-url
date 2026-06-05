<?php

namespace App\Controllers;

use DI\Container;

abstract class Controller
{

    protected Container $container;
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
