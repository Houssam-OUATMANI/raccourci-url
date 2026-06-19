<?php

$label ??= '';
$name ??= '';
$type ??= 'text';
$value ??= "";
$checked ??= false;

?>

<label class="form-control w-full">

    <span class="label-text font-medium mb-2">
        <?= htmlspecialchars($label) ?>
    </span>

    <input
        <?=  $type !== 'checkbox' ? "value=$value" : ""  ?>
        <?= $checked ? 'checked' : "" ?>
        type="<?= htmlspecialchars($type) ?>"
        name="<?= htmlspecialchars($name) ?>"
        class="<?= $type === 'checkbox' ? 'checkbox' : 'input input-bordered w-full rounded-xl focus:input-primary'?>" 
    />

