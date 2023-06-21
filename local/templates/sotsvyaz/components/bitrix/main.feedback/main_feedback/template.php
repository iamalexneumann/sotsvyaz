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
use Bitrix\Main\Localization\Loc;
?>
<?php
if (!empty($arResult['ERROR_MESSAGE'])):
    foreach($arResult['ERROR_MESSAGE'] as $error_message):
        ?>
        <div class="alert alert-danger">
            <?= $error_message; ?>
        </div>
    <?php
    endforeach;
endif;
?>

<?php
if ($arResult['OK_MESSAGE'] <> ''):
    if ($arParams['REDIRECT_URL']):
        header('Location: ' . $arParams['REDIRECT_URL']);
    else:
        ?>
        <div class="alert alert-success">
            <?= $arResult['OK_MESSAGE']; ?>
        </div>
    <?php
    endif;
else:
?>
<form action="<?=POST_FORM_ACTION_URI?>" method="POST" class="feedback-form">
<?=bitrix_sessid_post()?>
    <div class="feedback-form__item">
        <label for="feedback-user-name" class="form-label feedback-form__label">
            <?= Loc::getMessage('FEEDBACK_FORM_NAME'); ?>:
            <?php if(empty($arParams['REQUIRED_FIELDS']) || in_array("NAME", $arParams['REQUIRED_FIELDS'])): ?>
            <span class="feedback-form__require-star">*</span>
            <?php endif; ?>
        </label>
        <input type="text" name="user_name" value="<?= $arResult['AUTHOR_NAME']; ?>" placeholder="<?= Loc::getMessage('FEEDBACK_FORM_NAME_PLACEHOLDER'); ?>"
               class="form-control feedback-form__form-control" id="feedback-user-name"
            <?php if ($arResult['AUTHOR_NAME']): ?> readonly<?php endif; ?>
            <?php if(empty($arParams['REQUIRED_FIELDS']) || in_array('NAME', $arParams['REQUIRED_FIELDS'])): ?> required<?php endif; ?>>
    </div>

	<div class="feedback-form__item">
        <label for="feedback-message" class="form-label feedback-form__label">
            <?= Loc::getMessage('FEEDBACK_FORM_MESSAGE'); ?>:
            <?php if(empty($arParams['REQUIRED_FIELDS']) || in_array('MESSAGE', $arParams['REQUIRED_FIELDS'])): ?>
            <span class="feedback-form__require-star">*</span>
            <?php endif; ?>
        </label>
        <textarea name="MESSAGE" rows="3" id="feedback-message" class="form-control feedback-form__form-control"
        <?php if(empty($arParams['REQUIRED_FIELDS']) || in_array('NAME', $arParams['REQUIRED_FIELDS'])): ?> required<?php endif; ?>><?= $arResult['MESSAGE']; ?></textarea>
	</div>

    <div class="feedback-form__item">
        <div class="form-check feedback-form__form-check">
            <input class="form-check-input feedback-form__check-input" type="checkbox" id="feedback-privacy-policy" checked required>
            <label class="form-check-label feedback-form__check-label" for="feedback-privacy-policy">
                <?= Loc::getMessage('FEEDBACK_FORM_PRIVACY_POLICY_CHECKBOX_TEXT'); ?>
            </label>
        </div>
    </div>

	<input type="hidden" name="PARAMS_HASH" value="<?= $arResult['PARAMS_HASH']; ?>">
	<input type="submit" name="submit" value="<?= Loc::getMessage('FEEDBACK_FORM_SUBMIT_BTN_TEXT'); ?>" class="btn btn-sm btn-primary">
</form>
<?php endif; ?>