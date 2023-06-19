<?php
/**
 * @var array $block
 * @var CMain $APPLICATION
 */
?>
<div class="clearfix"></div>
<<?= $block['type'] ?><?php if (!empty($block['anchor'])): ?> id="<?= $block['anchor']; ?>"<?php endif; ?>><?= $block['value']; ?></<?= $block['type']; ?>>
