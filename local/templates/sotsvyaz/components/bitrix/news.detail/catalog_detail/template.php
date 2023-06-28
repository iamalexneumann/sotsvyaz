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

$more_photos = $arResult['PROPERTIES']['MORE_PHOTO'];
?>
<div class="catalog-detail">
    <div class="row catalog-detail__row">
        <div class="col-lg-6 catalog-detail__col catalog-detail__col_photo">
            <div id="carouselProduct" class="carousel carousel-dark slide carousel-fade">
                <?php if ($more_photos['VALUE']): ?>
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselProduct" data-bs-slide-to="0" class="active" aria-current="true" aria-label="<?= Loc::getMessage('CATALOG_DETAIL_CAROUSEL_INDICATOR_TEXT'); ?> №1"></button>
                    <?php foreach ($more_photos['VALUE'] as $key => $more_photo): ?>
                    <button type="button" data-bs-target="#carouselProduct" data-bs-slide-to="<?= $key + 1; ?>" aria-label="<?= Loc::getMessage('CATALOG_DETAIL_CAROUSEL_INDICATOR_TEXT') . ' №' . $key + 2; ?>"></button>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <figure class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="<?= $arResult['DETAIL_PICTURE']['SRC']; ?>"
                           class="carousel__img-link"
                           data-fancybox="catalog"
                           title="<?= $arResult['NAME']; ?>"
                           data-caption="<?= $arResult['NAME']; ?>">
                            <img src="<?= $arResult['PICTURE_LQIP']['SRC']; ?>"
                                 data-src="<?= $arResult['PICTURE']['SRC']; ?>"
                                 class="carousel__img lazyload blur-up"
                                 alt="<?= $arResult['NAME']; ?>"
                                 width="<?= $arResult['PICTURE']['WIDTH']; ?>"
                                 height="<?= $arResult['PICTURE']['HEIGHT']; ?>">
                        </a>
                    </div>
                    <?php
                    if ($more_photos['VALUE']):
                        foreach ($more_photos['VALUE'] as $key => $more_photo):
                    ?>
                    <div class="carousel-item">
                        <a href="<?= CFile::GetPath($more_photo); ?>"
                           class="carousel__img-link"
                           data-fancybox="catalog"
                           title="<?= $more_photos['DESCRIPTION'][$key] ?: $arResult['NAME'] . ' - ' . Loc::getMessage('CATALOG_DETAIL_ALT_IMG_TEXT') . ' №' . $key + 1; ?>"
                           data-caption="<?= $more_photos['DESCRIPTION'][$key] ?: $arResult['NAME'] . ' - ' . Loc::getMessage('CATALOG_DETAIL_ALT_IMG_TEXT') . ' №' . $key + 1; ?>">
                            <img src="<?= $more_photos['PICTURE_LQIP'][$key]['SRC']; ?>"
                                 data-src="<?= $more_photos['PICTURE'][$key]['SRC']; ?>"
                                 class="carousel__img lazyload blur-up"
                                 alt="<?= $more_photos['DESCRIPTION'][$key] ?: $arResult['NAME'] . ' - ' . Loc::getMessage('CATALOG_DETAIL_ALT_IMG_TEXT') . ' №' . $key + 1; ?>"
                                 width="<?= $more_photos['PICTURE']['WIDTH']; ?>"
                                 height="<?= $more_photos['PICTURE']['HEIGHT']; ?>">
                        </a>
                    </div>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </figure>

                <?php if ($more_photos['VALUE']): ?>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduct" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"><?= Loc::getMessage('CATALOG_DETAIL_CAROUSEL_PREV_BTN'); ?></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselProduct" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"><?= Loc::getMessage('CATALOG_DETAIL_CAROUSEL_NEXT_BTN'); ?></span>
                </button>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-6 catalog-detail__col catalog-detail__col_content">
            <div class="catalog-detail__price price">
                <div class="price__title"><?= Loc::getMessage('CATALOG_DETAIL_PRICE_TITLE'); ?>:</div>
                <div class="price__val"><?= number_format($arResult['DISPLAY_PROPERTIES']['ATT_PRICE']['VALUE'], 0, '', ' ') . ' ' . Loc::getMessage('CATALOG_DETAIL_CURRENCY'); ?></div>
            </div>
            <div class="catalog-detail__btns">
                <div class="catalog-detail__quantity quantity">
                    <input type="button" value="−" class="btn quantity__btn quantity__btn_minus" data-field="quantity">
                    <input type="number" step="1" max="1000" value="1" min="1" name="quantity" class="quantity__field">
                    <input type="button" value="+" class="btn quantity__btn quantity__btn_plus" data-field="quantity">
                </div>
                <button class="btn btn-sm btn-primary catalog-detail__btn-order" id="order-btn" data-product-id="<?= $arResult['ID']; ?>"><?= Loc::getMessage('CATALOG_DETAIL_BTN_ORDER'); ?></button>
            </div>

            <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_LINKED_PRODUCTS']['VALUE']): ?>
            <div class="catalog-detail__products products">
                <div class="products__title"><?= Loc::getMessage('CATALOG_DETAIL_PRODUCTS_TITLE'); ?>:</div>
                <?php
                $GLOBALS['productsFilter'] = [
                    '=ID' => $arResult['DISPLAY_PROPERTIES']['ATT_LINKED_PRODUCTS']['VALUE'],
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

            <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_CHARACTERISTICS']['~VALUE']): ?>
            <div class="catalog-detail__characteristics">
                <?php
                $APPLICATION->IncludeComponent(
                    "sprint.editor:blocks",
                    ".default",
                    Array(
                        "JSON" => $arResult['DISPLAY_PROPERTIES']['ATT_CHARACTERISTICS']['~VALUE'],
                    ),
                    $component,
                    Array(
                        "HIDE_ICONS" => "Y"
                    )
                ); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_DETAIL_TEXT']['~VALUE']): ?>
    <section class="main-section catalog-detail__detail-text">
        <h2 class="main-section__title"><?= Loc::getMessage('CATALOG_DETAIL_SECTION_DETAIL_TEXT'); ?></h2>
        <?php
        $APPLICATION->IncludeComponent(
            "sprint.editor:blocks",
            ".default",
            Array(
                "JSON" => $arResult['DISPLAY_PROPERTIES']['ATT_DETAIL_TEXT']['~VALUE'],
            ),
            $component,
            Array(
                "HIDE_ICONS" => "Y"
            )
        ); ?>
    </section>
    <?php endif; ?>

    <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_LINKED_PRODUCTS']['VALUE']): ?>
    <section class="main-section pb-0">
        <header class="main-section__header">
            <h2 class="main-section__title"><?= Loc::getMessage('CATALOG_DETAIL_PRODUCTS_TITLE'); ?></h2>
        </header>
        <?php
        $GLOBALS['productsFilter'] = [
            '=ID' => $arResult['DISPLAY_PROPERTIES']['ATT_LINKED_PRODUCTS']['VALUE'],
        ];
        $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "catalog_list",
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
                "PROPERTY_CODE" => array("ATT_PRICE", "ATT_BRAND", "ATT_SHOW_LINKED_PRODUCTS", "ATT_LINKED_PRODUCTS"),
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
    </section>
    <?php endif; ?>
</div>