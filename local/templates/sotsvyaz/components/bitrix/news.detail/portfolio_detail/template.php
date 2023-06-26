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
<div class="portfolio-detail">
    <div class="row portfolio-detail__row">
        <div class="col-lg-6 portfolio-detail__col portfolio-detail__col_photo">
            <div id="carouselPortfolio" class="carousel carousel-dark slide carousel-fade">
                <?php if ($more_photos['VALUE']): ?>
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselPortfolio" data-bs-slide-to="0" class="active" aria-current="true" aria-label="<?= Loc::getMessage('PORTFOLIO_DETAIL_CAROUSEL_INDICATOR_TEXT'); ?> №1"></button>
                    <?php foreach ($more_photos['VALUE'] as $key => $more_photo): ?>
                    <button type="button" data-bs-target="#carouselPortfolio" data-bs-slide-to="<?= $key + 1; ?>" aria-label="<?= Loc::getMessage('PORTFOLIO_DETAIL_CAROUSEL_INDICATOR_TEXT') . ' №' . $key + 2; ?>"></button>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <figure class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="<?= $arResult['DETAIL_PICTURE']['SRC']; ?>"
                           class="carousel__img-link"
                           data-fancybox="portfolio"
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
                           data-fancybox="portfolio"
                           title="<?= $more_photos['DESCRIPTION'][$key] ?: $arResult['NAME'] . ' - ' . Loc::getMessage('PORTFOLIO_DETAIL_ALT_IMG_TEXT') . ' №' . $key + 1; ?>"
                           data-caption="<?= $more_photos['DESCRIPTION'][$key] ?: $arResult['NAME'] . ' - ' . Loc::getMessage('PORTFOLIO_DETAIL_ALT_IMG_TEXT') . ' №' . $key + 1; ?>">
                            <img src="<?= $more_photos['PICTURE_LQIP'][$key]['SRC']; ?>"
                                 data-src="<?= $more_photos['PICTURE'][$key]['SRC']; ?>"
                                 class="carousel__img lazyload blur-up"
                                 alt="<?= $more_photos['DESCRIPTION'][$key] ?: $arResult['NAME'] . ' - ' . Loc::getMessage('PORTFOLIO_DETAIL_ALT_IMG_TEXT') . ' №' . $key + 1; ?>"
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
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselPortfolio" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"><?= Loc::getMessage('PORTFOLIO_DETAIL_CAROUSEL_PREV_BTN'); ?></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselPortfolio" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"><?= Loc::getMessage('PORTFOLIO_DETAIL_CAROUSEL_NEXT_BTN'); ?></span>
                </button>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-6 portfolio-detail__col portfolio-detail__col_content">
            <dl class="portfolio-detail__properties properties">
                <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_ADDRESS']['VALUE']): ?>
                <div class="properties__item" title="<?= Loc::getMessage('PORTFOLIO_DETAIL_ATT_ADDRESS_TITLE'); ?>">
                    <dt class="properties__name">
                        <span class="sr-only"><?= Loc::getMessage('PORTFOLIO_DETAIL_ATT_ADDRESS_TITLE'); ?></span>
                        <i class="fa-solid fa-location-dot"></i>
                    </dt>
                    <dd class="properties__value">
                        <?= $arResult['DISPLAY_PROPERTIES']['ATT_ADDRESS']['VALUE']; ?>
                    </dd>
                </div>
                <?php endif; ?>

                <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_TYPE_OBJECT']['VALUE']): ?>
                <div class="properties__item" title="<?= Loc::getMessage('PORTFOLIO_DETAIL_ATT_TYPE_OBJECT_TITLE'); ?>">
                    <dt class="properties__name">
                        <span class="sr-only"><?= Loc::getMessage('PORTFOLIO_DETAIL_ATT_TYPE_OBJECT_TITLE'); ?></span>
                        <i class="fa-regular fa-building"></i>
                    </dt>
                    <dd class="properties__value">
                        <?= $arResult['DISPLAY_PROPERTIES']['ATT_TYPE_OBJECT']['VALUE']; ?>
                    </dd>
                </div>
                <?php endif; ?>

                <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_TYPE_WORK']['VALUE']): ?>
                <div class="properties__item" title="<?= Loc::getMessage('PORTFOLIO_DETAIL_ATT_TYPE_WORK_TITLE'); ?>">
                    <dt class="properties__name">
                        <span class="sr-only"><?= Loc::getMessage('PORTFOLIO_DETAIL_ATT_TYPE_WORK_TITLE'); ?></span>
                        <?php
                        switch ($arResult['DISPLAY_PROPERTIES']['ATT_TYPE_WORK']['VALUE_XML_ID']):
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
                        <?= $arResult['DISPLAY_PROPERTIES']['ATT_TYPE_WORK']['VALUE']; ?>
                    </dd>
                </div>
                <?php endif; ?>

                <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_SQUARE']['VALUE']): ?>
                <div class="properties__item" title="<?= Loc::getMessage('PORTFOLIO_DETAIL_ATT_SQUARE_TITLE'); ?>">
                    <dt class="properties__name">
                        <span class="sr-only"><?= Loc::getMessage('PORTFOLIO_DETAIL_ATT_SQUARE_TITLE'); ?></span>
                        <i class="fa-solid fa-ruler"></i>
                    </dt>
                    <dd class="properties__value">
                        <?= number_format($arResult['DISPLAY_PROPERTIES']['ATT_SQUARE']['VALUE'], 0, '', ' ') . ' ' . Loc::getMessage('PORTFOLIO_DETAIL_ATT_SQUARE_UNITS'); ?>
                    </dd>
                </div>
                <?php endif; ?>

                <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_TERMS']['VALUE']): ?>
                <div class="properties__item" title="<?= Loc::getMessage('PORTFOLIO_DETAIL_ATT_TERMS_TITLE'); ?>">
                    <dt class="properties__name">
                        <span class="sr-only"><?= Loc::getMessage('PORTFOLIO_DETAIL_ATT_TERMS_TITLE'); ?></span>
                        <i class="fa-solid fa-calendar-days"></i>
                    </dt>
                    <dd class="properties__value">
                        <?= get_text_with_declension(
                            Loc::getMessage('PORTFOLIO_DETAIL_ATT_TERMS_ONE'),
                            Loc::getMessage('PORTFOLIO_DETAIL_ATT_TERMS_FOUR'),
                            Loc::getMessage('PORTFOLIO_DETAIL_ATT_TERMS_FIVE'),
                            $arResult['DISPLAY_PROPERTIES']['ATT_TERMS']['VALUE'],
                        ); ?>
                    </dd>
                </div>
                <?php endif; ?>
            </dl>

            <div class="portfolio-detail__texts texts">
                <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_GOAL']['VALUE']): ?>
                <section class="texts__item">
                    <h2 class="texts__title"><?= Loc::getMessage('PORTFOLIO_DETAIL_ATT_GOAL_TITLE'); ?></h2>
                    <div class="texts__content">
                        <?php
                        $APPLICATION->IncludeComponent(
                            "sprint.editor:blocks",
                            ".default",
                            Array(
                                "JSON" => $arResult['DISPLAY_PROPERTIES']['ATT_GOAL']['~VALUE'],
                            ),
                            $component,
                            Array(
                                "HIDE_ICONS" => "Y"
                            )
                        ); ?>
                    </div>
                </section>
                <?php endif; ?>

                <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_SOLVING']['VALUE']): ?>
                <section class="texts__item">
                    <h2 class="texts__title"><?= Loc::getMessage('PORTFOLIO_DETAIL_ATT_SOLVING_TITLE'); ?></h2>
                    <div class="texts__content">
                        <?php
                        $APPLICATION->IncludeComponent(
                            "sprint.editor:blocks",
                            ".default",
                            Array(
                                "JSON" => $arResult['DISPLAY_PROPERTIES']['ATT_SOLVING']['~VALUE'],
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
        </div>
    </div>
    <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_REVIEW']['VALUE']): ?>
    <section class="portfolio-detail__section section">
        <h2 class="section__title"><?= Loc::getMessage('PORTFOLIO_DETAIL_ATT_REVIEW_TITLE'); ?></h2>
        <div class="section__content">
            <?php
            $GLOBALS['reviewFilter'] = [
                '=ID' => $arResult['DISPLAY_PROPERTIES']['ATT_REVIEW']['VALUE'],
            ];
            $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "reviews_list",
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
                    "FILTER_NAME" => "reviewFilter",
                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                    "IBLOCK_ID" => "6",
                    "IBLOCK_TYPE" => "primary_content",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "INCLUDE_SUBSECTIONS" => "Y",
                    "MESSAGE_404" => "",
                    "NEWS_COUNT" => "1",
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
                    "PROPERTY_CODE" => array("ATT_DATE", "ATT_PREVIEW_TEXT", ""),
                    "SET_BROWSER_TITLE" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "N",
                    "SET_META_KEYWORDS" => "N",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "N",
                    "SHOW_404" => "N",
                    "SHOW_FORM_BLOCK" => "N",
                    "SMALL_CARD_TAG_TITLE" => "2",
                    "SORT_BY1" => "ACTIVE_FROM",
                    "SORT_BY2" => "SORT",
                    "SORT_ORDER1" => "DESC",
                    "SORT_ORDER2" => "ASC",
                    "STRICT_SECTION_CHECK" => "N"
                ),
                $component,
                Array(
                    "HIDE_ICONS" => "Y"
                )
            ); ?>
        </div>
    </section>
    <?php endif; ?>
    <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_DETAIL_TEXT']['VALUE']): ?>
    <section class="portfolio-detail__section section">
        <h2 class="section__title"><?= Loc::getMessage('PORTFOLIO_DETAIL_ATT_DETAIL_TEXT_TITLE'); ?></h2>
        <div class="section__content">
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
        </div>
    </section>
    <?php endif; ?>
</div>