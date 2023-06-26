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
?>
<?php if (count($arResult['ITEMS']) > 0): ?>
<div class="portfolio-list">
    <?php
    foreach ($arResult['ITEMS'] as $arItem_key => $arItem):
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'),
            [
                'CONFIRM' => Loc::getMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'),
            ]
        );
    ?>
    <article class="portfolio-item" id="<?= $this->GetEditAreaId($arItem['ID']) ;?>">
        <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>"
           class="portfolio-item__img-link"
           title="<?= $arItem['NAME']; ?>"
           rel="nofollow">
            <img src="<?= $arItem['PICTURE_LQIP']['SRC']; ?>"
                 data-src="<?= $arItem['PICTURE']['SRC']; ?>"
                 class="portfolio-item__img lazyload blur-up"
                 alt="<?= $arItem['NAME']; ?>"
                 width="<?= $arItem['PICTURE']['WIDTH']; ?>"
                 height="<?= $arItem['PICTURE']['HEIGHT']; ?>">
        </a>
        <div class="portfolio-item__wrapper">
            <header class="portfolio-item__header">
                <h<?=$param_small_card_tag_title; ?> class="portfolio-item__title">
                    <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="portfolio-item__link"><?= $arItem['NAME']; ?></a>
                </h<?=$param_small_card_tag_title; ?>>
            </header>

            <dl class="portfolio-item__properties properties">
                <?php if ($arItem['DISPLAY_PROPERTIES']['ATT_ADDRESS']['VALUE']): ?>
                <div class="properties__item" title="<?= Loc::getMessage('PORTFOLIO_LIST_ATT_ADDRESS_TITLE'); ?>">
                    <dt class="properties__name">
                        <span class="sr-only"><?= Loc::getMessage('PORTFOLIO_LIST_ATT_ADDRESS_TITLE'); ?></span>
                        <i class="fa-solid fa-location-dot"></i>
                    </dt>
                    <dd class="properties__value">
                        <?= $arItem['DISPLAY_PROPERTIES']['ATT_ADDRESS']['VALUE']; ?>
                    </dd>
                </div>
                <?php endif; ?>

                <?php if ($arItem['DISPLAY_PROPERTIES']['ATT_TYPE_OBJECT']['VALUE']): ?>
                <div class="properties__item" title="<?= Loc::getMessage('PORTFOLIO_LIST_ATT_TYPE_OBJECT_TITLE'); ?>">
                    <dt class="properties__name">
                        <span class="sr-only"><?= Loc::getMessage('PORTFOLIO_LIST_ATT_TYPE_OBJECT_TITLE'); ?></span>
                        <i class="fa-regular fa-building"></i>
                    </dt>
                    <dd class="properties__value">
                        <?= $arItem['DISPLAY_PROPERTIES']['ATT_TYPE_OBJECT']['VALUE']; ?>
                    </dd>
                </div>
                <?php endif; ?>

                <?php if ($arItem['DISPLAY_PROPERTIES']['ATT_TYPE_WORK']['VALUE']): ?>
                <div class="properties__item" title="<?= Loc::getMessage('PORTFOLIO_LIST_ATT_TYPE_WORK_TITLE'); ?>">
                    <dt class="properties__name">
                        <span class="sr-only"><?= Loc::getMessage('PORTFOLIO_LIST_ATT_TYPE_WORK_TITLE'); ?></span>
                        <?php
                        switch ($arItem['DISPLAY_PROPERTIES']['ATT_TYPE_WORK']['VALUE_XML_ID']):
                            case 'signal':
                                ?>
                        <i class="fa-solid fa-house-signal"></i>
                        <?php
                                break;
                            case 'video':
                        ?>
                        <i class="fa-solid fa-house-laptop"></i>
                        <?php
                                break;
                        endswitch;
                        ?>
                    </dt>
                    <dd class="properties__value">
                        <?= $arItem['DISPLAY_PROPERTIES']['ATT_TYPE_WORK']['VALUE']; ?>
                    </dd>
                </div>
                <?php endif; ?>

                <?php if ($arItem['DISPLAY_PROPERTIES']['ATT_SQUARE']['VALUE']): ?>
                <div class="properties__item" title="<?= Loc::getMessage('PORTFOLIO_LIST_ATT_SQUARE_TITLE'); ?>">
                    <dt class="properties__name">
                        <span class="sr-only"><?= Loc::getMessage('PORTFOLIO_LIST_ATT_SQUARE_TITLE'); ?></span>
                        <i class="fa-solid fa-ruler"></i>
                    </dt>
                    <dd class="properties__value">
                        <?= number_format($arItem['DISPLAY_PROPERTIES']['ATT_SQUARE']['VALUE'], 0, '', ' ') . ' ' . Loc::getMessage('PORTFOLIO_LIST_ATT_SQUARE_UNITS'); ?>
                    </dd>
                </div>
                <?php endif; ?>

                <?php if ($arItem['DISPLAY_PROPERTIES']['ATT_TERMS']['VALUE']): ?>
                <div class="properties__item" title="<?= Loc::getMessage('PORTFOLIO_LIST_ATT_TERMS_TITLE'); ?>">
                    <dt class="properties__name">
                        <span class="sr-only"><?= Loc::getMessage('PORTFOLIO_LIST_ATT_TERMS_TITLE'); ?></span>
                        <i class="fa-solid fa-calendar-days"></i>
                    </dt>
                    <dd class="properties__value">
                        <?= get_text_with_declension(
                            Loc::getMessage('PORTFOLIO_LIST_ATT_TERMS_ONE'),
                            Loc::getMessage('PORTFOLIO_LIST_ATT_TERMS_FOUR'),
                            Loc::getMessage('PORTFOLIO_LIST_ATT_TERMS_FIVE'),
                            $arItem['DISPLAY_PROPERTIES']['ATT_TERMS']['VALUE'],
                        ); ?>
                    </dd>
                </div>
                <?php endif; ?>
            </dl>

            <div class="portfolio-item__texts texts">
                <?php if ($arItem['DISPLAY_PROPERTIES']['ATT_GOAL']['VALUE']): ?>
                <section class="texts__item">
                    <h3 class="texts__title">
                        <?= Loc::getMessage('PORTFOLIO_LIST_ATT_GOAL_TITLE'); ?>
                    </h3>
                    <div class="texts__content">
                        <?php
                        $APPLICATION->IncludeComponent(
                            "sprint.editor:blocks",
                            ".default",
                            Array(
                                "JSON" => $arItem['DISPLAY_PROPERTIES']['ATT_GOAL']['~VALUE'],
                            ),
                            $component,
                            Array(
                                "HIDE_ICONS" => "Y"
                            )
                        ); ?>
                    </div>
                </section>
                <?php endif; ?>

                <?php if ($arItem['DISPLAY_PROPERTIES']['ATT_SOLVING']['VALUE']): ?>
                <section class="texts__item">
                    <h3 class="texts__title">
                        <?= Loc::getMessage('PORTFOLIO_LIST_ATT_SOLVING_TITLE'); ?>
                    </h3>
                    <div class="texts__content">
                        <?php
                        $APPLICATION->IncludeComponent(
                            "sprint.editor:blocks",
                            ".default",
                            Array(
                                "JSON" => $arItem['DISPLAY_PROPERTIES']['ATT_SOLVING']['~VALUE'],
                            ),
                            $component,
                            Array(
                                "HIDE_ICONS" => "Y"
                            )
                        ); ?>
                    </div>
                </section>
                <?php endif; ?>
            </div>
            <footer class="portfolio-item__footer">
                <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>"
                   rel="nofollow"
                   class="btn btn-sm btn-outline-primary portfolio-item__btn"><?= Loc::getMessage('PORTFOLIO_LIST_BTN_MORE_TEXT'); ?></a>
            </footer>
        </div>
    </article>
</div>
<?php endforeach; ?>
<?php
if ($arParams['DISPLAY_BOTTOM_PAGER']) {
    echo $arResult['NAV_STRING'];
}
?>
<?php endif; ?>