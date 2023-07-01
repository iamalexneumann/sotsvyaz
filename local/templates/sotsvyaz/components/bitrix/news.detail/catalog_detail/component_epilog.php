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
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $componentPath
 * @var string $epilogFile
 * @var array $templateData
 * @var CBitrixComponent $component
 */
use Bitrix\Main\UI\Extension;
use Bitrix\Main\Localization\Loc;
Extension::load(
    [
        'ui.fancybox',
    ]
);
echo '<script>
    Fancybox.bind("[data-fancybox]", {
        l10n: Fancybox.l10n.ru
    });
</script>';
?>
<script>
    BX.message({
        MORE_BTN_TEXT: '<?= Loc::getMessage('MORE_BTN_TEXT'); ?>'
    });
</script>