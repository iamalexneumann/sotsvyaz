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
?>
<div class="services-detail">
    <div class="first-screen">
        <div class="container">
            <div class="row">
                <div class="first-screen__content col-lg-8">
                    <?php
                    $helper = new PHPInterface\ComponentHelper($component);
                    $helper->deferredCall('ShowNavChain', array('breadcrumb'));
                    ?>
                    <header class="first-screen__header">
                        <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_SUPTITLE']['~VALUE']): ?>
                        <div class="first-screen__suptitle"><?= $arResult['DISPLAY_PROPERTIES']['ATT_SUPTITLE']['~VALUE']; ?></div>
                        <?php endif; ?>
                        <h1 class="first-screen__title"><?= $arResult['DISPLAY_PROPERTIES']['ATT_TITLE']['~VALUE'] ?: $arResult['NAME']; ?></h1>
                        <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_SUBTITLE']['~VALUE']): ?>
                        <div class="first-screen__subtitle"><?= $arResult['DISPLAY_PROPERTIES']['ATT_SUBTITLE']['~VALUE']; ?></div>
                        <?php endif; ?>
                    </header>
                    <button type="button"
                            class="btn btn-success first-screen__btn"
                            data-bs-toggle="modal"
                            data-bs-target="#callbackModal"
                            data-bs-modal-title="<?= Loc::getMessage('SERVICES_DETAIL_FIRST_SCREEN_MODAL_TITLE') ?>">
                        <?= Loc::getMessage('SERVICES_DETAIL_FIRST_SCREEN_BTN_TEXT') ?>
                    </button>
                </div>
                <div class="first-screen__media col-lg-4">
                    <figure class="first-screen__figure">
                        <img src="<?= $arResult['PICTURE_LQIP']['SRC']; ?>"
                             data-src="<?= $arResult['PICTURE']['SRC']; ?>"
                             class="first-screen__img lazyload blur-up"
                             alt="<?= $arResult['DISPLAY_PROPERTIES']['ATT_TITLE']['~VALUE'] ?: $arResult['NAME']; ?>"
                            <?php if ($arResult['PICTURE']['WIDTH']): ?>
                             width="<?= $arResult['PICTURE']['WIDTH']; ?>"
                            <?php endif; ?>
                            <?php if ($arResult['PICTURE']['HEIGHT']): ?>
                             height="<?= $arResult['PICTURE']['HEIGHT']; ?>"
                            <?php endif; ?>>
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <?php if ($arResult['DISPLAY_PROPERTIES']['ATT_DETAIL_TEXT']['~VALUE']): ?>
    <section class="main-section">
        <div class="container">
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
    <?php endif; ?>
    </section>
</div>
<?php $helper->saveCache(); ?>