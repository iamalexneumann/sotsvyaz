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
                        data-bs-target="#callbackModal">Заказать звонок</button>
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
<div class="main-section pb-0">
    <div class="container">
        <?php
        $APPLICATION->IncludeComponent(
            "sprint.editor:blocks",
            ".default",
            Array(
                "JSON" => \Bitrix\Main\Config\Option::get('askaron.settings', 'UF_PAGE_INDEX', '')
            )
        ); ?>
    </div>
</div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>