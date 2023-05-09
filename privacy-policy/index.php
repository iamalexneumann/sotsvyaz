<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Политика конфиденциальности");
?>
<?php
$APPLICATION->IncludeComponent(
    "sprint.editor:blocks",
    ".default",
    Array(
        "JSON" => \Bitrix\Main\Config\Option::get('askaron.settings', 'UF_PAGE_PRIVACY_POLICY', '')
    )
); ?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>