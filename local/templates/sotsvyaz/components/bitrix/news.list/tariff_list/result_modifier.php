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
        $att_options_description_values = $arItem['DISPLAY_PROPERTIES']['ATT_OPTIONS_DESCRIPTION']['VALUE'];
        if ($att_options_description_values) {
            foreach ($att_options_description_values as $value_key => $value) {
                $arItem['DISPLAY_PROPERTIES']['ATT_OPTIONS_DESCRIPTION']['VALUE'][$value] = $value_key;
                unset($arItem['DISPLAY_PROPERTIES']['ATT_OPTIONS_DESCRIPTION']['VALUE'][$value_key]);
            }
        }
    }
}