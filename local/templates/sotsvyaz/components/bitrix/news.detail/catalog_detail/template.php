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
$more_photos = $arResult['PROPERTIES']['MORE_PHOTO'];
?>
<div class="catalog-detail">
    <div class="row catalog-detail__row">
        <div class="col-lg-6 catalog-detail__col catalog-detail__col_photo">
            <div id="carouselProduct" class="carousel carousel-dark slide carousel-fade">
                <?php if ($more_photos['VALUE']): ?>
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselProduct" data-bs-slide-to="0" class="active" aria-current="true" aria-label="<?= Loc::getMessage('CATALOG_DETAIL_CAROUSEL_INDICATOR_TEXT'); ?> №1"></button>
                    <?php foreach ($more_photos['VALUE'] as $key => $more_photo): ?>
                    <button type="button" data-bs-target="#carouselProduct" data-bs-slide-to="<?= $key + 1; ?>" aria-label="<?= Loc::getMessage('CATALOG_DETAIL_CAROUSEL_INDICATOR_TEXT') . ' №' . $key + 2; ?>"></button>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <figure class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="<?= $arResult['DETAIL_PICTURE']['SRC']; ?>"
                           class="carousel__img-link"
                           data-fancybox="catalog"
                           title="<?= $arResult['NAME']; ?>"
                           data-caption="<?= $arResult['NAME']; ?>">
                            <img src="<?= $arResult['PICTURE_LQIP']['SRC']; ?>"
                                 data-src="<?= $arResult['PICTURE']['SRC']; ?>"
                                 class="carousel__img lazyload blur-up"
                                 alt="<?= $arResult['NAME']; ?>"
                                 width="<?= $arResult['PICTURE']['WIDTH']; ?>"
                                 height="<?= $arResult['PICTURE']['HEIGHT']; ?>">
                        </a>
                    </div>
                    <?php
                    if ($more_photos['VALUE']):
                        foreach ($more_photos['VALUE'] as $key => $more_photo):
                    ?>
                    <div class="carousel-item">
                        <a href="<?= CFile::GetPath($more_photo); ?>"
                           class="carousel__img-link"
                           data-fancybox="catalog"
                           title="<?= $more_photos['DESCRIPTION'][$key] ?: $arResult['NAME'] . ' - ' . Loc::getMessage('CATALOG_DETAIL_ALT_IMG_TEXT') . ' №' . $key + 1; ?>"
                           data-caption="<?= $more_photos['DESCRIPTION'][$key] ?: $arResult['NAME'] . ' - ' . Loc::getMessage('CATALOG_DETAIL_ALT_IMG_TEXT') . ' №' . $key + 1; ?>">
                            <img src="<?= $more_photos['PICTURE_LQIP'][$key]['SRC']; ?>"
                                 data-src="<?= $more_photos['PICTURE'][$key]['SRC']; ?>"
                                 class="carousel__img lazyload blur-up"
                                 alt="<?= $more_photos['DESCRIPTION'][$key] ?: $arResult['NAME'] . ' - ' . Loc::getMessage('CATALOG_DETAIL_ALT_IMG_TEXT') . ' №' . $key + 1; ?>"
                                 width="<?= $more_photos['PICTURE']['WIDTH']; ?>"
                                 height="<?= $more_photos['PICTURE']['HEIGHT']; ?>">
                        </a>
                    </div>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </figure>

                <?php if ($more_photos['VALUE']): ?>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduct" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"><?= Loc::getMessage('CATALOG_DETAIL_CAROUSEL_PREV_BTN'); ?></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselProduct" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"><?= Loc::getMessage('CATALOG_DETAIL_CAROUSEL_NEXT_BTN'); ?></span>
                </button>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-6 catalog-detail__col catalog-detail__col_content">
            <div class="catalog-detail__price price">
                <div class="price__title"><?= Loc::getMessage('CATALOG_DETAIL_PRICE_TITLE'); ?>:</div>
                <div class="price__val"><?= number_format($arResult['DISPLAY_PROPERTIES']['ATT_PRICE']['VALUE'], 0, '', ' ') . ' ' . Loc::getMessage('CATALOG_DETAIL_CURRENCY'); ?></div>
            </div>
            <div class="catalog-detail__btns">
                <div class="catalog-detail__quantity quantity">
                    <input type="button" value="−" class="btn quantity__btn quantity__btn_minus" data-field="quantity">
                    <input type="number" step="1" max="1000" value="1" min="1" name="quantity" class="quantity__field">
                    <input type="button" value="+" class="btn quantity__btn quantity__btn_plus" data-field="quantity">
                </div>
                <button class="btn btn-sm btn-primary catalog-detail__btn-order" data-product-id="<?= $arResult['ID']; ?>"><?= Loc::getMessage('CATALOG_DETAIL_BTN_ORDER'); ?></button>
            </div>
            <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_CHARACTERISTICS']['~VALUE']): ?>
            <div class="catalog-detail__characteristics">
                <?php
                $APPLICATION->IncludeComponent(
                    "sprint.editor:blocks",
                    ".default",
                    Array(
                        "JSON" => $arResult['DISPLAY_PROPERTIES']['ATT_CHARACTERISTICS']['~VALUE'],
                    ),
                    $component,
                    Array(
                        "HIDE_ICONS" => "Y"
                    )
                ); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_DETAIL_TEXT']['~VALUE']): ?>
    <section class="main-section catalog-detail__detail-text">
        <h2 class="main-section__title"><?= Loc::getMessage('CATALOG_DETAIL_SECTION_DETAIL_TEXT'); ?></h2>
        <?php
        $APPLICATION->IncludeComponent(
            "sprint.editor:blocks",
            ".default",
            Array(
                "JSON" => $arResult['DISPLAY_PROPERTIES']['ATT_DETAIL_TEXT']['~VALUE'],
            ),
            $component,
            Array(
                "HIDE_ICONS" => "Y"
            )
        ); ?>
    </section>
    <?php endif; ?>
</div>