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
$date = date('Y-m-d', time());
$percent = 10;
?>
<?php if (count($arResult['ITEMS']) > 0): ?>
<div class="tariff-list row">
    <?php
    foreach ($arResult['ITEMS'] as $arItem_key => $arItem):
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'),
            [
                'CONFIRM' => Loc::getMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'),
            ]
        );
    ?>
    <div class="col-md-4 tariff-list__col">
        <div class="tariff-item" id="<?= $this->GetEditAreaId($arItem['ID']) ;?>">
            <header class="tariff-item__header">
                <div class="tariff-item__title"><?= $arItem['NAME']; ?></div>
            </header>
            <div class="tariff-item__content">
                <?php if ($arItem['DISPLAY_PROPERTIES']['ATT_DETAIL_TEXT']['~VALUE']): ?>
                <div class="tariff-item__detail-text">
                    <?php
                    $APPLICATION->IncludeComponent(
                        "sprint.editor:blocks",
                        ".default",
                        Array(
                            "JSON" => $arItem['DISPLAY_PROPERTIES']['ATT_DETAIL_TEXT']['~VALUE'],
                        ),
                        $component,
                        Array(
                            "HIDE_ICONS" => "Y"
                        )
                    ); ?>
                </div>
                <?php endif; ?>
                <?php if ($arItem['DISPLAY_PROPERTIES']['ATT_OPTIONS']['~VALUE']): ?>
                <div class="tariff-item__options options">
                    <div class="options__title"><?= Loc::getMessage('TARIFF_LIST_OPTIONS_TITLE'); ?></div>
                    <ul class="options__list">
                        <?php
                        foreach ($arItem['DISPLAY_PROPERTIES']['ATT_OPTIONS']['~VALUE'] as $key => $option_value):
                            $value_xml_id_key = $arItem['DISPLAY_PROPERTIES']['ATT_OPTIONS']['VALUE_XML_ID'][$key];
                            ?>
                        <li class="options__item options__item_<?= $value_xml_id_key; ?>">
                            <?= $option_value; ?> <?php
                            $att_options_descriptions_key = $arItem['DISPLAY_PROPERTIES']['ATT_OPTIONS_DESCRIPTION']['VALUE'][$value_xml_id_key];
                            if (isset($att_options_descriptions_key)) {
                                 echo ' - <span>' . $arItem['DISPLAY_PROPERTIES']['ATT_OPTIONS_DESCRIPTION']['DESCRIPTION'][$att_options_descriptions_key] . '</span>';
                            } ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
            <footer class="tariff-item__footer">
                <div class="tariff-item__label">-<?= $percent; ?>%</div>
                <div class="tariff-item__cta-text"><?= Loc::getMessage('TARIFF_LIST_CTA') . ' ' . FormatDate('j F', strtotime('sunday this week', strtotime($date))); ?></div>
                <div class="tariff-item__prices">
                    <div class="tariff-item__old-price"><?= Loc::getMessage('TARIFF_LIST_PRICE_BEFORE_TEXT') . ' ' . number_format(($arItem['DISPLAY_PROPERTIES']['ATT_PRICE']['VALUE'] * (1 + $percent / 100)), 0, '', ' ') . ' ' . Loc::getMessage('TARIFF_LIST_CURRENCY'); ?></div>
                    <div class="tariff-item__price"><?= Loc::getMessage('TARIFF_LIST_PRICE_BEFORE_TEXT') . ' ' . number_format($arItem['DISPLAY_PROPERTIES']['ATT_PRICE']['VALUE'], 0, '', ' ') . ' ' . Loc::getMessage('TARIFF_LIST_CURRENCY'); ?></div>
                </div>
                <button type="button"
                        class="btn btn-sm btn-primary tariff-item__btn"
                        data-bs-toggle="modal"
                        data-bs-target="#callbackModal"
                        data-bs-modal-title="<?= Loc::getMessage('TARIFF_LIST_MODAL_TITLE') . ' ' . custom_lcfirst($arItem['NAME']) ?>">
                    <?= Loc::getMessage('TARIFF_LIST_BTN_TEXT') ?>
                </button>
            </footer>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>