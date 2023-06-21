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
 * @var CBitrixComponentTemplate $this
 */
if ($arResult['ITEMS']) {
    foreach ($arResult['ITEMS'] as $key => &$arItem) {
        $arItem['DATE'] = FormatDate('j F Y', MakeTimeStamp($arItem['DISPLAY_PROPERTIES']['ATT_DATE']['VALUE']));
        $arItem['DATETIME'] = FormatDate('Y-m-d', MakeTimeStamp($arItem['DISPLAY_PROPERTIES']['ATT_DATE']['VALUE']));
    }
}