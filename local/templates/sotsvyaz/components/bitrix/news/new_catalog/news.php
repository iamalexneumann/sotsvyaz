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
 * @var string $componentPath
 * @var array $templateData
 * @var CBitrixComponent $component
 */
$this->setFrameMode(true);
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\UI\Extension;
?>

<?php if ($arResult['IBLOCK_SEO_TEXT_TOP']): ?>
<div class="seo-text seo-text_top mb-5">
    <?php
    $APPLICATION->IncludeComponent(
        "sprint.editor:blocks",
        ".default",
        Array(
            "JSON" => $arResult['IBLOCK_SEO_TEXT_TOP'],
        ),
        $component,
        Array(
            "HIDE_ICONS" => "Y"
        )
    ); ?>
</div>
<?php endif; ?>

<?php
if($arParams['USE_SEARCH'] === 'Y') {
    $APPLICATION->IncludeComponent(
        "bitrix:search.title",
        "main_search",
        Array(
            "CATEGORY_0" => array("iblock_catalog"),
            "CATEGORY_0_TITLE" => "",
            "CATEGORY_0_iblock_catalog" => $arParams["IBLOCK_ID"],
            "CHECK_DATES" => "Y",
            "COMPOSITE_FRAME_MODE" => "A",
            "COMPOSITE_FRAME_TYPE" => "AUTO",
            "CONTAINER_ID" => "title-search",
            "INPUT_ID" => "title-search-input",
            "NUM_CATEGORIES" => "1",
            "ORDER" => "rank",
            "PAGE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["search"],
            "SHOW_INPUT" => "Y",
            "SHOW_OTHERS" => "N",
            "TOP_COUNT" => "5",
            "USE_LANGUAGE_GUESS" => "N"
        ),
        $component
    );
} ?>

<?php
$APPLICATION->IncludeComponent(
    "bitrix:catalog.section.list",
    "catalog_list",
    Array(
        "ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",
        "ADD_SECTIONS_CHAIN" => "N",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO",
        "COUNT_ELEMENTS" => "Y",
        "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
        "FILTER_NAME" => "sectionsFilter",
        "HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "SECTION_CODE" => $_REQUEST["SECTION_CODE"],
        "SECTION_FIELDS" => array("", ""),
        "SECTION_ID" => "",
        "SECTION_URL" => "",
        "SECTION_USER_FIELDS" => array("UF_PREVIEW_TEXT", "UF_ICON"),
        "SHOW_PARENT_NAME" => "Y",
        "TOP_DEPTH" => "2",
        "VIEW_MODE" => "LINE",

        "SHOW_FORM_BLOCK" => $arParams["SHOW_FORM_BLOCK"],
        "FORM_IBLOCK_TYPE" => $arParams["FORM_IBLOCK_TYPE"],
        "FORM_IBLOCK_ID" => $arParams["FORM_IBLOCK_ID"],
        "FORM_ELEMENT_ID" => $arParams["FORM_ELEMENT_ID"],
        "FORM_BACKGROUND_COLOR" => $arParams["FORM_BACKGROUND_COLOR"],
        "FORM_POSITION" => $arParams["FORM_POSITION"],

        "SERVICES_TEMPLATE" => $arParams["SERVICES_TEMPLATE"],
        "SERVICES_LIST_TEMPLATE" => $arParams["SERVICES_LIST_TEMPLATE"],

        "CARD_TAG" => 'h2',
    ),
    $component
); ?>

<?php if ($arResult['IBLOCK_SEO_TEXT_BOTTOM']): ?>
<section class="seo-text seo-text_bottom mt-5">
    <?php
    $APPLICATION->IncludeComponent(
        "sprint.editor:blocks",
        ".default",
        Array(
            "JSON" => $arResult['IBLOCK_SEO_TEXT_BOTTOM'],
        ),
        $component,
        Array(
            "HIDE_ICONS" => "Y"
        )
    ); ?>
</section>
<?php endif; ?>