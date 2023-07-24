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

use \Bitrix\Main\Config\Option;
$siteparam_main_form_suptitle = Option::get('askaron.settings', 'UF_MAIN_FORM_SUPTITLE', '');
$siteparam_main_form_title = Option::get('askaron.settings', 'UF_MAIN_FORM_TITLE', '');
$siteparam_main_form_subtitle = Option::get('askaron.settings', 'UF_MAIN_FORM_SUBTITLE', '');
$siteparam_email = Option::get('askaron.settings', 'UF_MAIN_EMAIL', '');

?>
<?php
$APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	"services_detail",
	Array(
		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"META_KEYWORDS" => $arParams["META_KEYWORDS"],
		"META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
		"BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
		"SET_CANONICAL_URL" => $arParams["DETAIL_SET_CANONICAL_URL"],
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SHOW_404" => $arParams["SHOW_404"],
		"FILE_404" => $arParams["FILE_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
		"ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
		"PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
		"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
		"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"USE_SHARE" => $arParams["USE_SHARE"],
		"SHARE_HIDE" => $arParams["SHARE_HIDE"],
		"SHARE_TEMPLATE" => $arParams["SHARE_TEMPLATE"],
		"SHARE_HANDLERS" => $arParams["SHARE_HANDLERS"],
		"SHARE_SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
		"SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
		"ADD_ELEMENT_CHAIN" => (isset($arParams["ADD_ELEMENT_CHAIN"]) ? $arParams["ADD_ELEMENT_CHAIN"] : ''),
		'STRICT_SECTION_CHECK' => (isset($arParams['STRICT_SECTION_CHECK']) ? $arParams['STRICT_SECTION_CHECK'] : ''),
	),
	$component
); ?>

<?php /*
<ul class="page-navigation">
    <?php if ($arResult['PREV_POST']): ?>
    <li class="page-navigation__item">
        <a href="<?= $arResult['PREV_POST']['DETAIL_PAGE_URL']; ?>"
           class="page-navigation__link"
           title="<?= $arResult['PREV_POST']['NAME']; ?>">
            <i class="page-navigation__icon fa-solid fa-angle-left"></i>
            <?= Loc::getMessage('SERVICES_PREV_BTN_TEXT'); ?>
        </a>
    </li>
    <?php endif; ?>
    <li class="page-navigation__item">
        <a href="<?= $arResult['FOLDER'] . $arResult['VARIABLES']['SECTION_CODE']; ?>/#services-list"
           class="page-navigation__link">
            <i class="page-navigation__icon fa-solid fa-house"></i>
            <?= Loc::getMessage('DEFAULT_DETAIL_BACK_BTN_TEXT'); ?>
        </a>
    </li>
    <?php if ($arResult['NEXT_POST']): ?>
    <li class="page-navigation__item">
        <a href="<?= $arResult['NEXT_POST']['DETAIL_PAGE_URL']; ?>"
           class="page-navigation__link"
           title="<?= $arResult['NEXT_POST']['NAME']; ?>">
            <?= Loc::getMessage('SERVICES_NEXT_BTN_TEXT'); ?>
            <i class="page-navigation__icon fa-solid fa-angle-right"></i>
        </a>
    </li>
    <?php endif; ?>
</ul>
*/ ?>

<div class="main-section main-section_form">
    <div class="container">
        <div class="main-section__header">
            <?php if ($siteparam_main_form_suptitle): ?>
            <div class="main-section__suptitle"><?= $siteparam_main_form_suptitle; ?></div>
            <?php endif; ?>
            <div class="main-section__title"><?= $siteparam_main_form_title; ?></div>
            <?php if ($siteparam_main_form_subtitle): ?>
            <div class="main-section__subtitle"><?= $siteparam_main_form_subtitle; ?></div>
            <?php endif; ?>
        </div>
        <?php $APPLICATION->IncludeComponent(
            "custom.bitrix:main.feedback",
            "main_form",
            Array(
                "COMPOSITE_FRAME_MODE" => "A",
                "COMPOSITE_FRAME_TYPE" => "AUTO",
                "EMAIL_TO" => $siteparam_email,
                "EVENT_MESSAGE_ID" => array(
                    0 => "7",
                ),
                "OK_TEXT" => Loc::getMessage('MAIN_FORM_OK_TEXT'),
                "REQUIRED_FIELDS" => array("USER_PHONE"),
                "USE_CAPTCHA" => "N",
                "AJAX_MODE" => "Y",
                "AJAX_OPTION_SHADOW" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N",
            )
        ); ?>
    </div>
</div>

<?php require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/features.php'); ?>

<?php require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/reviews_section.php'); ?>

<section class="main-section pb-0">
    <div class="container">
        <header class="main-section__header">
            <h2 class="main-section__title"><?= Loc::getMessage('SERVICES_SECTION_TITLE'); ?></h2>
            <div class="main-section__subtitle"><?= Loc::getMessage('SERVICES_SECTION_SUBTITLE'); ?> "<?= $arResult['SECTION_NAME']; ?>"</div>
        </header>
        <?php
        $GLOBALS['servicesFilter'] = [
            '!CODE' => $arResult["VARIABLES"]["ELEMENT_CODE"]
        ];

        $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "services_list",
            Array(
                "ACTIVE_DATE_FORMAT" => "j M Y",
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
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => array("", ""),
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "INCLUDE_SUBSECTIONS" => "Y",
                "MESSAGE_404" => "",
                "NEWS_COUNT" => "6",
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
                "PROPERTY_CODE" => array("", ""),
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SORT_BY1" => "RAND",
                "SORT_BY2" => "SORT",
                "SORT_ORDER1" => "ASC",
                "SORT_ORDER2" => "ASC",
                "STRICT_SECTION_CHECK" => "Y",
                "SMALL_CARD_TAG_TITLE" => "3",
                "USE_FILTER" => "Y",
                "FILTER_NAME" => "servicesFilter",
            ),
            $component,
            Array(
                "HIDE_ICONS" => "Y"
            )
        ); ?>
        <footer class="main-section__footer">
            <a href="<?= $arResult['FOLDER'] . $arResult['VARIABLES']['SECTION_CODE']; ?>/#services-list"
               class="btn btn-outline-primary main-section__btn"><?= Loc::getMessage('SERVICES_SECTION_BTN_TEXT'); ?></a>
        </footer>
    </div>
</section>

<?php require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/catalog_section.php'); ?>