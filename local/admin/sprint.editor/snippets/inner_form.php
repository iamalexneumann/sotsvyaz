<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var CBitrixComponent $component
 */
global $APPLICATION;
use Bitrix\Main\Localization\Loc;
$siteparam_email = \COption::GetOptionString('askaron.settings', 'UF_MAIN_EMAIL', '');
?>
<div class="form-section">
    <div class="form-section__title">Бесплатная консультация</div>
    <div class="form-section__subtitle">Оставьте заявку на бесплатную консультацию<span> и получите экспертный совет уже сегодня!</span></div>
    <?php $APPLICATION->IncludeComponent(
        "custom.bitrix:main.feedback",
        "modal_form",
        Array(
            "COMPOSITE_FRAME_MODE" => "A",
            "COMPOSITE_FRAME_TYPE" => "AUTO",
            "EMAIL_TO" => $siteparam_email,
            "EVENT_MESSAGE_ID" => array(
                0 => "7",
            ),
            "OK_TEXT" => Loc::getMessage('MAIN_FORM_OK_TEXT'),
            "REQUIRED_FIELDS" => array("USER_PHONE"),
            "USE_CAPTCHA" => "N",
//            "AJAX_MODE" => "Y",
//            "AJAX_OPTION_SHADOW" => "N",
//            "AJAX_OPTION_JUMP" => "N",
//            "AJAX_OPTION_STYLE" => "Y",
//            "AJAX_OPTION_HISTORY" => "N",
        ),
        $component,
        Array(
            "HIDE_ICONS" => "Y"
        )
    ); ?>
</div>
