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
$param_show_form_block = $arParams['SHOW_FORM_BLOCK'] ?? '';
$param_form_iblock_type = $arParams['FORM_IBLOCK_TYPE'] ?? '';
$param_form_iblock_id = $arParams['FORM_IBLOCK_ID'] ?? '';
$param_form_element_id = $arParams['FORM_ELEMENT_ID'] ?? '';
$param_form_position = $arParams['FORM_POSITION'] ?? '3';
?>
<?php if (count($arResult['ITEMS']) > 0): ?>
<div class="blog-list row">
    <?php
    foreach ($arResult['ITEMS'] as $arItem_key => $arItem):
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'),
            [
                'CONFIRM' => Loc::getMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'),
            ]
        );
    ?>
    <div class="col-lg-6">
        <article class="blog-item" id="<?= $this->GetEditAreaId($arItem['ID']) ;?>">
            <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>"
               class="blog-item__img-link"
               title="<?= $arItem['NAME']; ?>"
               rel="nofollow">
                <img src="<?= $arItem['PICTURE_LQIP']['SRC']; ?>"
                     data-src="<?= $arItem['PICTURE']['SRC']; ?>"
                     class="blog-item__img lazyload blur-up"
                     alt="<?= $arItem['NAME']; ?>"
                     width="<?= $arItem['PICTURE']['WIDTH']; ?>"
                     height="<?= $arItem['PICTURE']['HEIGHT']; ?>"></a>
            <div class="blog-item__wrapper">
                <?php if ($arItem['DATE_DATETIME'] && $arItem['DATE_FORMATTED']): ?>
                <time datetime="<?= $arItem['DATE_DATETIME']; ?>" class="blog-item__date">
                    <?= $arItem['DATE_FORMATTED']; ?>
                </time>
                <?php endif; ?>

                <h<?=$param_small_card_tag_title; ?> class="blog-item__title">
                    <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="blog-item__link"><?= $arItem['NAME']; ?></a>
                </h<?=$param_small_card_tag_title; ?>>

                <?php if ($arItem['DISPLAY_PROPERTIES']['ATT_PREVIEW_TEXT']['~VALUE']): ?>
                <div class="blog-item__preview-text">
                    <?php
                    $APPLICATION->IncludeComponent(
                        "sprint.editor:blocks",
                        ".default",
                        Array(
                            "JSON" => $arItem['DISPLAY_PROPERTIES']['ATT_PREVIEW_TEXT']['~VALUE'],
                        ),
                        $component,
                        Array(
                            "HIDE_ICONS" => "Y"
                        )
                    ); ?>
                </div>
                <?php endif; ?>

                <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>"
                   rel="nofollow"
                   class="btn btn-sm btn-outline-primary blog-item__btn"><?= Loc::getMessage('BLOG_LIST_BTN_MORE_TEXT'); ?></a>
            </div>
        </article>
    </div>
    <?php
    if ($param_show_form_block === 'Y' &&
        $param_form_iblock_type &&
        $param_form_iblock_id &&
        $param_form_element_id &&
        ++$arItem_key === (int) $param_form_position) {
        $APPLICATION->IncludeComponent(
            "bitrix:news.detail",
            "form_inner",
            Array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "ADD_ELEMENT_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "BROWSER_TITLE" => "-",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "Y",
                "COMPONENT_TEMPLATE" => "form_inner",
                "COMPOSITE_FRAME_MODE" => "A",
                "COMPOSITE_FRAME_TYPE" => "AUTO",
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "ELEMENT_CODE" => "",
                "ELEMENT_ID" => $param_form_element_id,
                "FIELD_CODE" => array(0=>"",1=>"",),
                "IBLOCK_ID" => $param_form_iblock_id,
                "IBLOCK_TYPE" => $param_form_iblock_type,
                "IBLOCK_URL" => "",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "MESSAGE_404" => "",
                "META_DESCRIPTION" => "-",
                "META_KEYWORDS" => "-",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_TEMPLATE" => ".default",
                "PAGER_TITLE" => "Страница",
                "PROPERTY_CODE" => array(0=>"ATT_SVG_ICON",1=>"ATT_DETAIL_TEXT",2=>"ATT_BTN_SHOW",3=>"ATT_BTN_LINK",4=>"ATT_BTN_TEXT",5=>"",),
                "SET_BROWSER_TITLE" => "N",
                "SET_CANONICAL_URL" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "STRICT_SECTION_CHECK" => "N",
                "USE_PERMISSIONS" => "N",

                "FORM_BACKGROUND_COLOR" => $arParams["FORM_BACKGROUND_COLOR"],
            ),
            $component,
            Array(
                "HIDE_ICONS" => "Y"
            )
        );
    } ?>
    <?php endforeach; ?>
</div>
<?php
if ($arParams['DISPLAY_BOTTOM_PAGER']) {
    echo $arResult['NAV_STRING'];
}
?>
<?php endif; ?>