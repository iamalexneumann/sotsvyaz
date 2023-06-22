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
<div class="first-screen">
    <div class="container">
        <div class="row">
            <div class="first-screen__content col-lg-8">
                <?php
                $helper = new PHPInterface\ComponentHelper($component);
                $helper->deferredCall('ShowNavChain', array('breadcrumb'));
                ?>
                <header class="first-screen__header">
                    <?php if ($arResult['IBLOCK']['SUPTITLE']): ?>
                    <div class="first-screen__suptitle"><?= $arResult['IBLOCK']['SUPTITLE']; ?></div>
                    <?php endif; ?>
                    <h1 class="first-screen__title"><?= $arResult['IBLOCK']['TITLE']; ?></h1>
                    <?php if ($arResult['IBLOCK']['SUBTITLE']): ?>
                    <div class="first-screen__subtitle"><?= $arResult['IBLOCK']['SUBTITLE']; ?></div>
                    <?php endif; ?>
                </header>
                <button type="button"
                        class="btn btn-success first-screen__btn"
                        data-bs-toggle="modal"
                        data-bs-target="#callbackModal"
                        data-bs-modal-title="<?= Loc::getMessage('SERVICES_FIRST_SCREEN_MODAL_TITLE') ?>">
                    <?= Loc::getMessage('SERVICES_FIRST_SCREEN_BTN_TEXT') ?>
                </button>
            </div>
            <div class="first-screen__media col-lg-4">
                <figure class="first-screen__figure">
                    <img src="<?= $arResult['IBLOCK']['PICTURE_LQIP']['SRC']; ?>"
                         data-src="<?= $arResult['IBLOCK']['PICTURE']['SRC']; ?>"
                         class="first-screen__img lazyload blur-up"
                         alt="<?= $arResult['IBLOCK']['TITLE']; ?>"
                         width="<?= $arResult['IBLOCK']['PICTURE']['WIDTH']; ?>"
                         height="<?= $arResult['IBLOCK']['PICTURE']['HEIGHT']; ?>">
                </figure>
            </div>
        </div>
    </div>
</div>

<?php require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/features.php'); ?>

<section class="main-section main-section_light-bg-color" id="services-list">
    <div class="container">
        <header class="main-section__header">
            <h2 class="main-section__title"><?= Loc::getMessage('SERVICES_SECTION_TITLE'); ?></h2>
        </header>
        <?php
        $APPLICATION->IncludeComponent(
            "bitrix:catalog.section.list",
            "services_list",
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
                "SECTION_USER_FIELDS" => array("UF_PREVIEW_TEXT", ""),
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
            ),
            $component
        ); ?>
    </div>
</section>

<?php if ($arResult['IBLOCK']['SEO_TEXT_BOTTOM']): ?>
<section class="main-section">
    <div class="container">
        <?php
        $APPLICATION->IncludeComponent(
            "sprint.editor:blocks",
            ".default",
            Array(
                "JSON" => $arResult['IBLOCK']['SEO_TEXT_BOTTOM'],
            ),
            $component,
            Array(
                "HIDE_ICONS" => "Y"
            )
        ); ?>
    </div>
</section>
<?php endif; ?>
<?php $helper->saveCache(); ?>
