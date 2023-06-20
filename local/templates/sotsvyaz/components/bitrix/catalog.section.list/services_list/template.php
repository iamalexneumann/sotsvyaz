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

$param_show_form_block = $arParams['SHOW_FORM_BLOCK'] ?? '';
$param_form_iblock_type = $arParams['FORM_IBLOCK_TYPE'] ?? '';
$param_form_iblock_id = $arParams['FORM_IBLOCK_ID'] ?? '';
$param_form_element_id = $arParams['FORM_ELEMENT_ID'] ?? '';
$param_form_position = $arParams['FORM_POSITION'] ?? '3';
$param_services_template = $arParams['SERVICES_TEMPLATE'] ?? 'VERTICAL_LIST';
?>
<div class="services-sections">
    <?php
    $strSectionEdit = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'SECTION_EDIT');
    $strSectionDelete = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'SECTION_DELETE');
    $arSectionDeleteParams = ['CONFIRM' => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')];

    foreach ($arResult['SECTIONS'] as $arItem_key => &$arSection):
        $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
        $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
        $GLOBALS['servicesFilter'] = ['SECTION_ID' => $arSection['ID']];
    ?>
    <div class="sections-item" id="<?= $this->GetEditAreaId($arSection['ID']); ?>">
        <h3 class="sections-item__title">
            <a href="<?= $arSection['SECTION_PAGE_URL']; ?>" class="sections-item__link"><?= $arSection['NAME']; ?></a>
        </h3>
        <?php if ($arSection['UF_PREVIEW_TEXT']): ?>
        <div class="sections-item__text">
            <?php
            $APPLICATION->IncludeComponent(
                "sprint.editor:blocks",
                ".default",
                Array(
                    "JSON" => $arSection['~UF_PREVIEW_TEXT'],
                ),
                $component,
                Array(
                    "HIDE_ICONS" => "Y"
                )
            ); ?>
        </div>
        <?php endif; ?>
        <div class="sections-item__list">
            <?php
            $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "services_list",
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
                    "FILTER_NAME" => "servicesFilter",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => $arParams['IBLOCK_ID'],
                    "IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "MESSAGE_404" => "",
                    "NEWS_COUNT" => "99",
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
                    "PROPERTY_CODE" => array("ATT_ICON", "ATT_PREVIEW_TEXT", "ATT_PRICES"),
                    "SET_BROWSER_TITLE" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SHOW_FORM_BLOCK" => "N",
                    "SMALL_CARD_TAG_TITLE" => "4",
                    "SORT_BY1" => "SORT",
                    "SORT_BY2" => "ACTIVE_FROM",
                    "SORT_ORDER1" => "ASC",
                    "SORT_ORDER2" => "DESC",
                    "STRICT_SECTION_CHECK" => "Y",

                    "SERVICES_TEMPLATE" => $arParams["SERVICES_LIST_TEMPLATE"],
                ),
                $component,
                Array(
                    "HIDE_ICONS" => "Y"
                )
            ); ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>
