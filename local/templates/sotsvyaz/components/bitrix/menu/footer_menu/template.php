<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 * @var array $arLangMessages
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $parentTemplateFolder
 * @var string $componentPath
 * @var array $templateData
 * @var CBitrixComponent $component
 */
?>
<?php if (!empty($arResult)): ?>
<ul class="footer-menu row">
<?php
$previousLevel = 0;

foreach ($arResult as $arItem):
    if ($previousLevel && $arItem['DEPTH_LEVEL'] < $previousLevel) {
        echo str_repeat('</ul></li>', ($previousLevel - $arItem['DEPTH_LEVEL']));
    }

    if ($arItem['IS_PARENT']):
        if ($arItem['DEPTH_LEVEL'] === 1): ?>
    <li class="col-sm-6 footer-menu__col">
        <a<?php if ($arItem['SELECTED'] !== true): ?> href="<?= $arItem['LINK']; ?>"<?php endif; ?>
           class="footer-menu__title<?php if ($arItem['SELECTED']):?> active<?php endif; ?>"><?= $arItem['TEXT']; ?></a>
        <ul class="footer-menu__submenu">
<?php
        else:
?>
    <li class="footer-menu__item">
        <a<?php if ($arItem['SELECTED'] !== true): ?> href="<?= $arItem['LINK']; ?>"<?php endif; ?>
           class="footer-menu__link<?php if ($arItem['SELECTED']):?> active<?php endif; ?>"><?= $arItem['TEXT']; ?></a>
        <ul>
<?php
        endif;
    elseif ($arItem['PERMISSION'] > 'D'):
        if ($arItem['DEPTH_LEVEL'] === 1):
?>
    <li class="footer-menu__item">
        <a<?php if ($arItem['SELECTED'] !== true): ?> href="<?= $arItem['LINK']; ?>"<?php endif; ?>
           class="footer-menu__link<?php if ($arItem['SELECTED']):?> active<?php endif; ?>"><?= $arItem['TEXT']; ?></a>
    </li>
<?php
        else:
?>
    <li<?= $arItem['PARAMS']['CUSTOM_CLASS'] ? '' : ' class="footer-menu__item"'; ?>>
        <a<?php if ($arItem['SELECTED'] !== true): ?> href="<?= $arItem['LINK']; ?>"<?php endif; ?>
           class="<?= $arItem['PARAMS']['CUSTOM_CLASS'] ?: 'footer-menu__link'; ?><?php if ($arItem['SELECTED']):?> active<?php endif; ?>"><?= $arItem['TEXT']; ?></a>
    </li>
<?php
        endif;
    endif;
    $previousLevel = $arItem['DEPTH_LEVEL'];
endforeach;

if ($previousLevel > 1) {
    echo str_repeat('</ul></li>', ($previousLevel - 1));
} ?>
</ul>
<?php endif; ?>