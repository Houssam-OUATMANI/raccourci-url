<?php

$label ??= '';
$name ??= '';
$type ??= 'text';

?>

<label class="form-control w-full">

    <span class="label-text font-medium mb-2">
        <?= htmlspecialchars($label) ?>
    </span>

    <input
        type="<?= htmlspecialchars($type) ?>"
        name="<?= htmlspecialchars($name) ?>"
        class="<?= $type === 'checkbox' ? 'checkbox' : 'input input-bordered w-full rounded-xl focus:input-primary'?>" 
    />

