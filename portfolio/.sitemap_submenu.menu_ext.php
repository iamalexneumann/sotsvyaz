<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

global $APPLICATION;

if (CModule::IncludeModule("iblock")) {
    $arSelect = Array("NAME", "CODE");
    $arFilter = Array("IBLOCK_ID" => 7, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");

    $elements = [];

    $res = CIBlockElement::GetList(Array("SORT" => "ASC"), $arFilter, false, false, $arSelect);

    while($ob_arr = $res->Fetch()) {
        $elements[] = $ob_arr;
    }

    $aMenuLinksExt = [];

    foreach ($elements as $element) {
        $aMenuLinksExt[] = [
            $element["NAME"],
            "/portfolio/" . $element["CODE"] . "/",
            [],
            [],
            ""
        ];
    }

    $aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
}