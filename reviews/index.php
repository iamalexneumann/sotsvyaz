<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отзывы");
?>
<div class="page-reviews">
    <div class="page-reviews__widget widget">
        <iframe src="https://yandex.ru/maps-reviews-widget/117189714128?comments"></iframe>
        <a href="https://yandex.ru/maps/org/sotsvyaz_telekom/117189714128/" target="_blank">СотСвязь Телеком на карте Москвы — Яндекс Карты</a>
    </div>
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
            "DISPLAY_BOTTOM_PAGER" => "Y",
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
            "NEWS_COUNT" => "20",
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
</div>

<div class="feedback-section">
    <div class="feedback-section__title">Оставьте отзыв</div>
    <div class="feedback-section__subtitle">Напишите отзыв о работе наших инженеров</div>
    <?php
    $APPLICATION->IncludeComponent(
        "bitrix:main.feedback",
        "main_feedback",
        Array(
            "COMPOSITE_FRAME_MODE" => "A",
            "COMPOSITE_FRAME_TYPE" => "AUTO",
            "EMAIL_TO" => $siteparam_email,
            "EVENT_MESSAGE_ID" => array("14"),
            "OK_TEXT" => "Спасибо за отзыв! Он будет промодерирован и добавлен на сайт.",
            "REQUIRED_FIELDS" => array("NAME", "MESSAGE"),
            "USE_CAPTCHA" => "N",
            "AJAX_MODE" => "Y",
            "AJAX_OPTION_SHADOW" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "AJAX_OPTION_HISTORY" => "N",
        )
    ); ?>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>