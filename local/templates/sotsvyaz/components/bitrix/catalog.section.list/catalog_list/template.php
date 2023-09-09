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

$param_card_tag = $arParams['CARD_TAG'] ?: 'h2';
use Bitrix\Main\Localization\Loc;
?>
<div class="catalog-sections row">
    <?php
    $strSectionEdit = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'SECTION_EDIT');
    $strSectionDelete = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'SECTION_DELETE');
    $arSectionDeleteParams = ['CONFIRM' => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')];

    foreach ($arResult['SECTIONS'] as $arItem_key => &$arSection):
        $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
        $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
    ?>
    <div class="catalog-sections__col col-lg-6">
        <div class="sections-item" id="<?= $this->GetEditAreaId($arSection['ID']); ?>">
            <?php if ($arSection['UF_ICON']): ?>
            <div class="sections-item__icon">
                <?= $arSection['~UF_ICON']; ?>
            </div>
            <?php endif; ?>
            <<?= $param_card_tag; ?> class="sections-item__title">
                <a href="<?= $arSection['SECTION_PAGE_URL']; ?>" class="sections-item__link"><?= $arSection['NAME']; ?></a>
            </<?= $param_card_tag; ?>>
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
            <a href="<?= $arSection['SECTION_PAGE_URL']; ?>"
               class="btn btn-sm btn-outline-primary sections-item__btn"
               rel="nofollow"><?= Loc::getMessage('CATALOG_SECTIONS_BTN_MORE_TEXT'); ?></a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
