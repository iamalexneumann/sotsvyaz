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
                    <?php if ($arItem['DISPLAY_PROPERTIES']['ATT_BRAND']['VALUE']): ?>
                    <div class="catalog-item__brand"><?= Loc::getMessage('CATALOG_LIST_BRAND'); ?>: <?= $arItem['DISPLAY_PROPERTIES']['ATT_BRAND']['VALUE']; ?></div>
                    <?php endif; ?>
                    <?php if ($arItem['DISPLAY_PROPERTIES']['ATT_SHOW_LINKED_PRODUCTS']['VALUE'] === 'Y'): ?>
                    <div class="catalog-item__products products">
                        <?php /*
                        <div class="products__title"><?= Loc::getMessage('CATALOG_LIST_PRODUCTS_TITLE'); ?>:</div>
                        <?php */ ?>
                        <?php
                        $GLOBALS['productsFilter'] = [
                            '=ID' => $arItem['DISPLAY_PROPERTIES']['ATT_LINKED_PRODUCTS']['VALUE'],
                        ];
                        $APPLICATION->IncludeComponent(
                            "bitrix:news.list",
                            "products_list",
                            Array(
                                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                                "ADD_SECTIONS_CHAIN" => "N",
                                "AJAX_MODE" => "N",
                                "AJAX_OPTION_ADDITIONAL" => "",
                                "AJAX_OPTION_HISTORY" => "N",
                                "AJAX_OPTION_JUMP" => "N",
                                "AJAX_OPTION_STYLE" => "Y",
                                "CACHE_FILTER" => "N",
                                "CACHE_GROUPS" => "Y",
                                "CACHE_TIME" => "36000000",
                                "CACHE_TYPE" => "A",
                                "CHECK_DATES" => "Y",
                                "COMPOSITE_FRAME_MODE" => "A",
                                "COMPOSITE_FRAME_TYPE" => "AUTO",
                                "DETAIL_URL" => "",
                                "DISPLAY_BOTTOM_PAGER" => "N",
                                "DISPLAY_TOP_PAGER" => "N",
                                "FIELD_CODE" => array("", ""),
                                "FILTER_NAME" => "productsFilter",
                                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                                "IBLOCK_ID" => "4",
                                "IBLOCK_TYPE" => "catalog",
                                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                                "INCLUDE_SUBSECTIONS" => "N",
                                "MESSAGE_404" => "",
                                "NEWS_COUNT" => "20",
                                "PAGER_BASE_LINK_ENABLE" => "N",
                                "PAGER_DESC_NUMBERING" => "N",
                                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                                "PAGER_SHOW_ALL" => "N",
                                "PAGER_SHOW_ALWAYS" => "N",
                                "PAGER_TEMPLATE" => ".default",
                                "PAGER_TITLE" => "",
                                "PARENT_SECTION" => "",
                                "PARENT_SECTION_CODE" => "",
                                "PREVIEW_TRUNCATE_LEN" => "",
                                "PROPERTY_CODE" => array("ATT_PRICE", ""),
                                "SET_BROWSER_TITLE" => "N",
                                "SET_LAST_MODIFIED" => "N",
                                "SET_META_DESCRIPTION" => "N",
                                "SET_META_KEYWORDS" => "N",
                                "SET_STATUS_404" => "N",
                                "SET_TITLE" => "N",
                                "SHOW_404" => "N",
                                "SHOW_FORM_BLOCK" => "N",
                                "SMALL_CARD_TAG_TITLE" => "2",
                                "SORT_BY1" => "NAME",
                                "SORT_BY2" => "SORT",
                                "SORT_ORDER1" => "ASC",
                                "SORT_ORDER2" => "ASC",
                                "STRICT_SECTION_CHECK" => "N"
                            ),
                            $component,
                            Array(
                                "HIDE_ICONS" => "Y"
                            )
                        ); ?>
                    </div>
                    <?php endif; ?>
                    <div class="catalog-item__price"><?= number_format($arItem['DISPLAY_PROPERTIES']['ATT_PRICE']['VALUE'], 0, '', ' ') . ' ' . Loc::getMessage('CATALOG_LIST_CURRENCY'); ?></div>
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