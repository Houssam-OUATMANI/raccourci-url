<?php

use DI\Container;

/** @var Container $container */
global $container;
$key ??= '';

$flash = $container->get("flash");
?>

<?php if ($flash->getFirstMessage($key)) : ?>

    <div role="alert" class="alert alert-<?= $key ?> alert-dash">
        <span><?= $flash->getFirstMessage($key) ?></span>
    </div>

<?php endif;  ?>