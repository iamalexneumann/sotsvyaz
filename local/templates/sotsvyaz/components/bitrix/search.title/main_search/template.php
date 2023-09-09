<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}
/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 * @var array $arLangMessages
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $parentTemplateFolder
 * @var string $componentPath
 * @var array $templateData
 * @var CBitrixComponent $component
 */
$this->setFrameMode(true);
use Bitrix\Main\Localization\Loc;
?>
<?php
$INPUT_ID = trim($arParams["~INPUT_ID"]) ?? "title-search-input";
$INPUT_ID = CUtil::JSEscape($INPUT_ID);

$CONTAINER_ID = trim($arParams["~CONTAINER_ID"]) ?? "title-search";
$CONTAINER_ID = CUtil::JSEscape($CONTAINER_ID);

if ($arParams["SHOW_INPUT"] !== "N"): ?>
<div id="<?= $CONTAINER_ID; ?>" class="main-search">
    <form action="<?= $arResult["FORM_ACTION"]; ?>">
        <label for="<?= $INPUT_ID; ?>" class="form-label"><?= Loc::getMessage('MAIN_SEARCH_LABEL'); ?>:</label>
        <div class="input-group">
            <input id="<?= $INPUT_ID; ?>" class="form-control" placeholder="<?= Loc::getMessage('MAIN_SEARCH_PLACEHOLDER'); ?>"
                   type="text" name="q" value="" maxlength="50" autocomplete="off">
            <input name="s" class="btn btn-sm btn-primary" type="submit" value="<?= Loc::getMessage("CT_BST_SEARCH_BUTTON");?>">
        </div>
    </form>
</div>
<?php endif; ?>
<script>
	BX.ready(function(){
		new JCTitleSearch({
			'AJAX_PAGE' : '<?= CUtil::JSEscape(POST_FORM_ACTION_URI); ?>',
			'CONTAINER_ID': '<?= $CONTAINER_ID; ?>',
			'INPUT_ID': '<?= $INPUT_ID; ?>',
			'MIN_QUERY_LEN': 2
		});
	});
</script>
