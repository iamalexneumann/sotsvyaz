<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
use Bitrix\Main\Localization\Loc;

$arTemplateParameters = [
    "REDIRECT_URL" => [
        "NAME" => Loc::getMessage('MODAL_FORM_REDIRECT_URL'),
        "TYPE" => "STRING",
        "DEFAULT" => "",
    ],
];