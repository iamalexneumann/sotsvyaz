<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
use Bitrix\Main\Localization\Loc;
?>
<div class="main-section main-section_light-bg-color">
    <div class="container">
        <h2 class="main-section__title"><?= Loc::getMessage('REVIEWS_SECTION_TITLE'); ?></h2>
        <?php
        $APPLICATION->IncludeComponent(
            "bitrix:news",
            "reviews",
            Array(
                "ADD_ELEMENT_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "BROWSER_TITLE" => "-",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "Y",
                "COMPOSITE_FRAME_MODE" => "A",
                "COMPOSITE_FRAME_TYPE" => "AUTO",
                "DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
                "DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
                "DETAIL_DISPLAY_TOP_PAGER" => "N",
                "DETAIL_FIELD_CODE" => array("", ""),
                "DETAIL_PAGER_SHOW_ALL" => "N",
                "DETAIL_PAGER_TEMPLATE" => "",
                "DETAIL_PAGER_TITLE" => "",
                "DETAIL_PROPERTY_CODE" => array("", ""),
                "DETAIL_SET_CANONICAL_URL" => "N",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "N",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "DISPLAY_TOP_PAGER" => "N",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => "6",
                "IBLOCK_TYPE" => "primary_content",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
                "LIST_FIELD_CODE" => array("", ""),
                "LIST_PROPERTY_CODE" => array("ATT_DATE", "ATT_PREVIEW_TEXT", ""),
                "MESSAGE_404" => "",
                "META_DESCRIPTION" => "-",
                "META_KEYWORDS" => "-",
                "NEWS_COUNT" => "4",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => "main_pagination",
                "PAGER_TITLE" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "SEF_MODE" => "N",
                "SET_LAST_MODIFIED" => "Y",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SHOW_FORM_BLOCK" => "N",
                "SMALL_CARD_TAG_TITLE" => "2",
                "SORT_BY1" => "property_ATT_DATE",
                "SORT_BY2" => "ACTIVE_FROM",
                "SORT_ORDER1" => "DESC",
                "SORT_ORDER2" => "ASC",
                "STRICT_SECTION_CHECK" => "N",
                "USE_CATEGORIES" => "N",
                "USE_FILTER" => "N",
                "USE_PERMISSIONS" => "N",
                "USE_RATING" => "N",
                "USE_RSS" => "N",
                "USE_SEARCH" => "N",
                "USE_SHARE" => "N",
                "VARIABLE_ALIASES" => Array(
                    "ELEMENT_ID" => "ELEMENT_ID",
                    "SECTION_ID" => "SECTION_ID"
                ),
            )
        ); ?>
        <div class="text-center">
            <a href="/reviews/" class="btn btn-sm btn-outline-primary">Все отзывы</a>
        </div>
    </div>
</div>