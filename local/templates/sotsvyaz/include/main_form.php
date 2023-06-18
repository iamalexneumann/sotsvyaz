<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @global CMain $APPLICATION
 * @var CBitrixComponent $component
 */

use Bitrix\Main\Localization\Loc;
?>
<div class="main-section main-section_form">
    <div class="container">
        <div class="main-section__suptitle"><?= Loc::getMessage('MAIN_FORM_SUPTITLE'); ?></div>
        <div class="main-section__title"><?= Loc::getMessage('MAIN_FORM_TITLE'); ?></div>
        <div class="main-section__subtitle"><?= Loc::getMessage('MAIN_FORM_SUBTITLE'); ?></div>
        <?php $APPLICATION->IncludeComponent(
            "custom.bitrix:main.feedback",
            "main_form",
            Array(
                "COMPOSITE_FRAME_MODE" => "A",
                "COMPOSITE_FRAME_TYPE" => "AUTO",
                "EMAIL_TO" => "info@sotsvyaz.ru",
                "EVENT_MESSAGE_ID" => array(
                    0 => "7",
                ),
                "OK_TEXT" => Loc::getMessage('MAIN_FORM_OK_TEXT'),
                "REQUIRED_FIELDS" => array("USER_PHONE"),
                "USE_CAPTCHA" => "N",
                "AJAX_MODE" => "Y",
                "AJAX_OPTION_SHADOW" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N",
            )
        ); ?>
    </div>
</div>