<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
use Bitrix\Main\Localization\Loc;
?>
<div class="main-section">
    <div class="container">
        <h2 class="main-section__title"><?= Loc::getMessage('CATALOG_SECTION_TITLE') ?></h2>
        <div class="main-section__subtitle"><?= Loc::getMessage('CATALOG_SECTION_SUBTITLE') ?></div>
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
                "COUNT_ELEMENTS" => "N",
                "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
                "FILTER_NAME" => "sectionsFilter",
                "HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",
                "IBLOCK_ID" => "4",
                "IBLOCK_TYPE" => "catalog",
                "SECTION_CODE" => $_REQUEST["SECTION_CODE"],
                "SECTION_FIELDS" => array("", ""),
                "SECTION_ID" => "",
                "SECTION_URL" => "",
                "SECTION_USER_FIELDS" => array("UF_SEO_TEXT_TOP", "UF_ICON", ""),
                "TOP_DEPTH" => "2",
                "CARD_TAG" => "h3",
            )
        ); ?>
    </div>
</div>