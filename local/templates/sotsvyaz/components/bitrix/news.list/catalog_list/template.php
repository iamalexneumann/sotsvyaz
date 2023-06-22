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
$this->setFrameMode(true);
use Bitrix\Main\Localization\Loc;

$param_small_card_tag_title = $arParams['SMALL_CARD_TAG_TITLE'] ?? '2';
?>
<?php if (count($arResult['ITEMS']) > 0): ?>
<div class="catalog-list row">
    <?php
    foreach ($arResult['ITEMS'] as $arItem_key => $arItem):
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'),
            [
                'CONFIRM' => Loc::getMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'),
            ]
        );
    ?>
    <div class="col-xl-4 col-md-6 catalog-list__col">
        <article class="catalog-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>"
               class="catalog-item__img-link"
               title="<?= $arItem['NAME']; ?>"
               rel="nofollow">
                <img src="<?= $arItem['PICTURE_LQIP']['SRC']; ?>"
                     data-src="<?= $arItem['PICTURE']['SRC']; ?>"
                     class="catalog-item__img lazyload blur-up"
                     alt="<?= $arItem['NAME']; ?>"
                     width="<?= $arItem['PICTURE']['WIDTH']; ?>"
                     height="<?= $arItem['PICTURE']['HEIGHT']; ?>">
            </a>
            <div class="catalog-item__wrapper">
                <header class="catalog-item__header">
                    <h<?=$param_small_card_tag_title; ?> class="catalog-item__title">
                        <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="catalog-item__link"><?= $arItem['NAME']; ?></a>
                    </h<?=$param_small_card_tag_title; ?>>
                    <div class="catalog-item__price"><?= $arItem['DISPLAY_PROPERTIES']['ATT_PRICE']['VALUE'] . ' ' . Loc::getMessage('CATALOG_LIST_CURRENCY'); ?></div>
                </header>
                <div class="catalog-item__btns">
                    <div class="catalog-item__quantity quantity">
                        <input type="button" value="−" class="btn quantity__btn quantity__btn_minus" data-field="quantity">
                        <input type="number" step="1" max="1000" value="1" min="1" name="quantity" class="quantity__field">
                        <input type="button" value="+" class="btn quantity__btn quantity__btn_plus" data-field="quantity">
                    </div>
                    <button class="btn btn-sm btn-primary catalog-item__btn-order" data-product-id="<?= $arItem['ID']; ?>">
                        <?= Loc::getMessage('CATALOG_LIST_BTN_CART_TEXT'); ?>
                    </button>
                </div>
            </div>
        </article>
    </div>
    <?php endforeach; ?>
</div>
<?php
if ($arParams['DISPLAY_BOTTOM_PAGER']) {
    echo $arResult['NAV_STRING'];
}
?>
<?php endif; ?>