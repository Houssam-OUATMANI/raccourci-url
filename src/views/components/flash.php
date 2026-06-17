<?php
use DI\Container;

/** @var Container $container */
global $container;

$key ??= '';

$flash = $container->get('flash');

$message = $flash->getFirstMessage($key);

$variants = [
    'success' => 'success',
    'error'   => 'error',
    'warning' => 'warning',
    'info'    => 'info',
];

$type = $variants[$key] ?? 'info';

?>

<?php if ($message) : ?>

    <div class="mb-4">
        <div role="alert" class="alert alert-<?= $type ?> shadow-md">

            <span>
                <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
            </span>

        </div>
    </div>

<?php endif; ?>