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

<?php if ($arResult['VIEW_COUNT']): ?>
<div class="views-counter">
    <i class="fa-solid fa-eye views-counter__icon"></i>
    <span class="views-counter__text"><?= $arResult['VIEW_COUNT']; ?></span>
</div>
<?php endif; ?>