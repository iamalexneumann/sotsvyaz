<?php /** @var $block array */ ?><?php
$sections = Sprint\Editor\Blocks\IblockSections::getList(
    $block, [
        'NAME',
        'SECTION_PAGE_URL',
    ]
);
global $APPLICATION;
?>
<?php foreach ($sections as $aItem): ?>
    <?php
    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "tariff_list",
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
            "FILTER_NAME" => "",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "IBLOCK_ID" => $aItem['IBLOCK_ID'],
            "IBLOCK_TYPE" => "secondary_content",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "INCLUDE_SUBSECTIONS" => "N",
            "MESSAGE_404" => "",
            "NEWS_COUNT" => "3",
            "PAGER_BASE_LINK_ENABLE" => "N",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "N",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => ".default",
            "PAGER_TITLE" => "",
            "PARENT_SECTION" => $aItem['ID'],
            "PARENT_SECTION_CODE" => $aItem['SECTION_CODE'],
            "PREVIEW_TRUNCATE_LEN" => "",
            "PROPERTY_CODE" => array("ATT_DETAIL_TEXT", "ATT_OPTIONS", "ATT_PRICE", ""),
            "SET_BROWSER_TITLE" => "N",
            "SET_LAST_MODIFIED" => "N",
            "SET_META_DESCRIPTION" => "N",
            "SET_META_KEYWORDS" => "N",
            "SET_STATUS_404" => "N",
            "SET_TITLE" => "N",
            "SHOW_404" => "N",
            "SHOW_FORM_BLOCK" => "N",
            "SMALL_CARD_TAG_TITLE" => "2",
            "SORT_BY1" => "SORT",
            "SORT_BY2" => "ACTIVE_FROM",
            "SORT_ORDER1" => "ASC",
            "SORT_ORDER2" => "DESC",
            "STRICT_SECTION_CHECK" => "N"
        )
    ); ?>
<?php endforeach; ?>
