<?php
/** @var $block array */
$view = $block['settings']['view'];
?>
<?php
switch ($view):
    case 'alert-secondary':
    case 'alert-primary':
    case 'alert-success':
    case 'alert-danger':
    case 'alert-warning':
?>
<div class="alert <?= $view; ?>"><?= Sprint\Editor\Blocks\Text::getValue($block); ?></div>
<?php
        break;
    case 'table-responsive':
?>
<div class="table-responsive"><?= Sprint\Editor\Blocks\Text::getValue($block); ?></div>
<?php
        break;
    case 'default':
    default:
?>
<div class="sprint-text"><?= Sprint\Editor\Blocks\Text::getValue($block); ?></div>
<?php
        break;
endswitch;
?>