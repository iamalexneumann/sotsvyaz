<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");
?>

<?php
$APPLICATION->IncludeComponent(
    "vladrix:basket.page",
    "basket_page",
    Array(
        "ADDRESS_AS_ONE_FIELD" => "Y",
        "ADDRESS_FIELDS" => array("CITY,STREET,HOUSE,PORCH,FLOOR,FLAT"),
        "ADDRESS_FIELDS_REQUIRED" => array("CITY,STREET,HOUSE,PORCH,FLOOR,FLAT"),
        "AGREEMENT_URL" => "/privacy-policy/",
        "AJAX_MODE" => "Y",
        "CATALOG_PROPERTY_PHOTOS_CODE" => "",
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO",
        "EVENT_MESSAGE_ID_FOR_ADMIN" => "12",
        "EVENT_MESSAGE_ID_FOR_CLIENT" => "13",
        "FIELDS" => array("NAME", "TEL", "EMAIL", "ADDRESS", "COMMENT"),
        "FIELDS_REQUIRED" => array("NAME", "TEL", "EMAIL", "ADDRESS", ""),
        "ORDER_IBLOCK_ID" => "1",
        "SEND_MAIL_TO_ADMIN" => "Y",
        "SEND_MAIL_TO_CLIENT" => "Y"
    )
); ?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>