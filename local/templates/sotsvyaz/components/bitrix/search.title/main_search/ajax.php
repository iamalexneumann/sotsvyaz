<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}
?>
<?php if (!empty($arResult["CATEGORIES"]) && $arResult['CATEGORIES_ITEMS_EXISTS']): ?>
<ul class="search-result">
    <?php foreach($arResult["CATEGORIES"] as $category_id => $arCategory): ?>
        <?php foreach($arCategory["ITEMS"] as $i => $arItem): ?>
            <?php if($category_id === "all"): ?>
            <li class="search-result__item search-result__item_all">
                <a href="<?= $arItem["URL"]; ?>" class="search-result__link"><?= $arItem["NAME"]; ?></a>
            </li>
            <?php elseif(isset($arItem["ICON"])): ?>
            <li class="search-result__item">
                <a href="<?= $arItem["URL"]; ?>" class="search-result__link"><?= $arItem["NAME"]; ?></a>
            </li>
            <?php else: ?>
            <li class="search-result__item search-result__item_more">
                <a href="<?= $arItem["URL"]; ?>" class="search-result__link"><?= $arItem["NAME"]; ?></a>
            </li>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>
</ul>
<?php endif; ?>