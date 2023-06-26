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
    <div class="col-lg-6 blog-list__col">
        <article class="blog-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>"
               class="blog-item__img-link"
               title="<?= $arItem['NAME']; ?>"
               rel="nofollow">
                <img src="<?= $arItem['PICTURE_LQIP']['SRC']; ?>"
                     data-src="<?= $arItem['PICTURE']['SRC']; ?>"
                     class="blog-item__img lazyload blur-up"
                     alt="<?= $arItem['NAME']; ?>"
                     width="<?= $arItem['PICTURE']['WIDTH']; ?>"
                     height="<?= $arItem['PICTURE']['HEIGHT']; ?>">
            </a>
            <div class="blog-item__wrapper">
                <header class="blog-item__header">
                    <?php if ($arItem['DATE_DATETIME'] && $arItem['DATE_FORMATTED']): ?>
                    <time datetime="<?= $arItem['DATE_DATETIME']; ?>" class="blog-item__date">
                        <?= $arItem['DATE_FORMATTED']; ?>
                    </time>
                    <?php endif; ?>
                    <h<?=$param_small_card_tag_title; ?> class="blog-item__title">
                        <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="blog-item__link"><?= $arItem['NAME']; ?></a>
                    </h<?=$param_small_card_tag_title; ?>>
                </header>

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

                <footer class="blog-item__footer">
                    <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>"
                       rel="nofollow"
                       class="btn btn-sm btn-outline-primary blog-item__btn"><?= Loc::getMessage('BLOG_LIST_BTN_MORE_TEXT'); ?></a>
                </footer>
            </div>
        </article>
    </div>
    <?php endforeach; ?>
</div>
<?php
if ($arParams['DISPLAY_BOTTOM_PAGER']) {
    echo $arResult['NAV_STRING'];
}
?>
<?php endif; ?>