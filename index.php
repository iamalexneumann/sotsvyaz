<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?>
<div class="first-screen">
    <div class="container">
        <div class="row">
            <div class="first-screen__content col-lg-8">
                <div class="first-screen__suptitle">Оставайтесь на связи и под наблюдением с нашей компанией!</div>
                <h1 class="first-screen__title">Усиление сигнала сотовой связи <span>и монтаж систем видеонаблюдения</span></h1>
                <div class="first-screen__subtitle">Профессиональные услуги для обеспечения надежной связи <span>и контроля за безопасностью в любом месте.</span></div>
                <button type="button"
                        class="btn btn-success first-screen__btn"
                        data-bs-toggle="modal"
                        data-bs-target="#callbackModal"
                        data-bs-modal-title="Заказать консультацию">Получить консультацию</button>
            </div>
            <div class="first-screen__media col-lg-4">
                <figure class="first-screen__figure">
                    <img src="/local/templates/sotsvyaz/img/first-screen-small.jpg"
                         data-src="/local/templates/sotsvyaz/img/first-screen.jpg"
                         class="first-screen__img lazyload blur-up"
                         alt="Усиление сигнала сотовой связи и монтаж систем видеонаблюдения">
                </figure>
            </div>
        </div>
    </div>
</div>

<?php require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/features.php'); ?>

<section class="main-section main-section_light-bg-color" id="services-list">
    <div class="container">
        <h2 class="main-section__title">Наши услуги</h2>
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
                "COUNT_ELEMENTS" => "N",
                "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
                "FILTER_NAME" => "sectionsFilter",
                "HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",
                "IBLOCK_ID" => "3",
                "IBLOCK_TYPE" => "primary_content",
                "SECTION_CODE" => $_REQUEST["SECTION_CODE"],
                "SECTION_FIELDS" => array("", ""),
                "SECTION_ID" => "",
                "SECTION_URL" => "",
                "SECTION_USER_FIELDS" => array("UF_PREVIEW_TEXT", ""),
                "SHOW_PARENT_NAME" => "Y",
                "TOP_DEPTH" => "2",
                "VIEW_MODE" => "LINE"
            )
        );?>
    </div>
</section>

<?php require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/main_form.php'); ?>

<?php require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/catalog_section.php'); ?>

<section class="main-section">
    <div class="container">
        <?php
        $APPLICATION->IncludeComponent(
            "sprint.editor:blocks",
            ".default",
            Array(
                "JSON" => \Bitrix\Main\Config\Option::get('askaron.settings', 'UF_PAGE_INDEX', '')
            ),
            false,
            Array(
                "HIDE_ICONS" => "Y"
            )
        ); ?>
    </div>
</section>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>