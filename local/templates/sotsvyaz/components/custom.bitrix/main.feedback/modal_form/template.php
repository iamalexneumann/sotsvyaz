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

$six_digit_random_number = rand(100000, 999999);
$CurDir = $APPLICATION->GetCurDir();
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
<form action="<?= POST_FORM_ACTION_URI; ?>" method="POST" class="modal-form">
    <?= bitrix_sessid_post(); ?>
    <div class="modal-form__item">
        <label for="user-name-<?= $six_digit_random_number; ?>" class="form-label modal-form__label">
            <?= Loc::getMessage('MODAL_FORM_NAME'); ?>:
            <?php if(empty($arParams['REQUIRED_FIELDS']) || in_array("NAME", $arParams['REQUIRED_FIELDS'])): ?>
            <span class="modal-form__require-star">*</span>
            <?php endif; ?>
        </label>
        <input type="text" name="user_name" value="<?= $arResult['AUTHOR_NAME']; ?>" placeholder="<?= Loc::getMessage('MODAL_FORM_NAME_PLACEHOLDER'); ?>"
               class="form-control modal-form__form-control" id="user-name-<?= $six_digit_random_number; ?>" maxlength="15"
            <?php if ($arResult['AUTHOR_NAME']): ?> readonly<?php endif; ?>
            <?php if (empty($arParams['REQUIRED_FIELDS']) || in_array('NAME', $arParams['REQUIRED_FIELDS'])): ?> required<?php endif; ?>>
    </div>

    <div class="modal-form__item">
        <label for="user-phone-<?= $six_digit_random_number; ?>" class="form-label modal-form__label">
            <?= Loc::getMessage('MODAL_FORM_USER_PHONE'); ?>:
            <?php if(empty($arParams['REQUIRED_FIELDS']) || in_array('USER_PHONE', $arParams['REQUIRED_FIELDS'])): ?>
            <span class="modal-form__require-star">*</span>
            <?php endif; ?>
        </label>
        <input type="tel" name="USER_PHONE" placeholder="<?= Loc::getMessage('MODAL_FORM_USER_PHONE_PLACEHOLDER'); ?>"
               class="form-control modal-form__form-control" id="user-phone-<?= $six_digit_random_number; ?>"
            <?php if(empty($arParams['REQUIRED_FIELDS']) || in_array('USER_PHONE', $arParams['REQUIRED_FIELDS'])): ?> required<?php endif; ?>>
    </div>

    <div class="modal-form__item">
        <div class="form-check modal-form__form-check">
            <input class="form-check-input modal-form__check-input" type="checkbox" id="privacy-policy-<?= $six_digit_random_number; ?>" checked required>
            <label class="form-check-label modal-form__check-label" for="privacy-policy-<?= $six_digit_random_number; ?>">
                <?= Loc::getMessage('MODAL_FORM_PRIVACY_POLICY_CHECKBOX_TEXT'); ?>
            </label>
        </div>
    </div>

    <input type="hidden" name="PARAMS_HASH" value="<?=$arResult['PARAMS_HASH']?>">
    <input type="submit" name="submit" value="<?= Loc::getMessage('MODAL_FORM_SUBMIT_BTN_TEXT'); ?>" class="btn btn-primary">
</form>
<?php endif; ?>