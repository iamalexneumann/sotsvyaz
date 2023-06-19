<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?>
<div class="container">
<?php
$APPLICATION->IncludeComponent(
    "sprint.editor:blocks",
    ".default",
    Array(
        "JSON" => \Bitrix\Main\Config\Option::get('askaron.settings', 'UF_PAGE_INDEX', '')
    )
); ?>
</div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>