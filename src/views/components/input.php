<?php 
$label ??= '';
$name ??= '';
$type ??= 'text';

?>

<fieldset class="fieldset">
  <legend class="fieldset-legend"><?= $label ?></legend>
  <input type="<?= $type ?>" class="input w-full" name="<?= $name ?>" />
</fieldset>

