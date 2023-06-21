<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Карта сайта");
?>

<?php $APPLICATION->IncludeComponent(
    "bitrix:main.map",
    "main_map",
    Array(
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "COL_NUM" => "1",
        "COMPONENT_TEMPLATE" => ".default",
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO",
        "LEVEL" => "10",
        "SET_TITLE" => "N",
        "SHOW_DESCRIPTION" => "Y"
    )
); ?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>