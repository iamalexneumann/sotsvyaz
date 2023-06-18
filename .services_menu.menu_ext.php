<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent(
    "custom.bitrix:menu.sections",
    "",
    Array(
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "DEPTH_LEVEL" => "2",
        "DETAIL_PAGE_URL" => "#SECTION_CODE#/#ELEMENT_CODE#/",
        "IBLOCK_ID" => "3",
        "IBLOCK_TYPE" => "primary_content",
        "ID" => $_REQUEST["ID"],
        "IS_SEF" => "Y",
        "SECTION_PAGE_URL" => "#SECTION_CODE#/",
        "SECTION_URL" => "",
        "SEF_BASE_URL" => "/services/"
    ),
    false,
    array("HIDE_ICONS"=>"Y"),
);

$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);
