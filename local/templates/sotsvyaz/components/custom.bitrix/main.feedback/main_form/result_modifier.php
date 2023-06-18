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

if (CModule::IncludeModule('iblock')) {
    $arSelect = ['NAME', 'CODE'];
    $arFilter = [
        'IBLOCK_ID' => 4,
        'ACTIVE_DATE' => 'Y',
        'ACTIVE' => 'Y'
    ];

    $elements = [];

    $res = CIBlockElement::GetList(
        ['SORT' => 'DESC'],
        $arFilter,
        false,
        false, $arSelect
    );

    while ($ob_arr = $res->Fetch()) {
        $elements[] = $ob_arr;
    }

    $halls_list = [];

    foreach ($elements as $element) {
        $halls_list[] = [
            'NAME' => $element['NAME'],
            'CODE' => $element['CODE'],
        ];
    }
    $arResult['HALLS_LIST'] = $halls_list;
}