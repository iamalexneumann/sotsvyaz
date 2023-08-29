<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
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

if (!empty($arResult)): ?>
<nav class="aside-nav">
    <ul class="aside-nav__list">
        <?php
        foreach($arResult as $arItem):
            if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                continue;
        ?>
        <li class="aside-nav__item">
            <a href="<?=$arItem["LINK"]?>"
               class="aside-nav__link<?= ($arItem["SELECTED"]) ? ' aside-nav__link_active' : ''; ?>">
                <?php if ($arItem['UFS']['UF_ICON']): ?>
                <span class="aside-nav__icon"><?= $arItem['UFS']['UF_ICON']; ?></span>
                <?php endif; ?>
                <?= $arItem["TEXT"]; ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</nav>
<?php endif; ?>