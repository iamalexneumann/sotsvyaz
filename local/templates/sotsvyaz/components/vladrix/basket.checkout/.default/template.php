<?php
if ( ! defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
//CJSCore::Init(["popup", "ajax", "fx"]);
use Bitrix\Main\Localization\Loc;
?>
<div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="checkoutModalLabel"><?= Loc::getMessage("ORDERING"); ?></div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?= Loc::getMessage('BTN_CLOSE_LABEL'); ?>">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" autocomplete="off"
                      class="modal-form <?= $arParams["AJAX"] != "N" ? " js-checkout-ajax-form " : "" ?>">
                    <input type="hidden" name="VXBASKET_CREATE_ORDER" class="hidden" value="1">

                    <div class="modal-form__item">
                        <label for="order-name" class="form-label modal-form__label">
                            <?= Loc::getMessage('NAME'); ?>:
                        </label>
                        <input type="text" name="NAME" id="order-name" class="form-control modal-form__form-control"
                               minlength="2"
                            <?= in_array("NAME", $arParams["FIELDS_REQUIRED"]) ? "required" : "" ?>>
                    </div>
                    <div class="modal-form__item">
                        <label for="order-email" class="form-label modal-form__label">
                            <?= Loc::getMessage("EMAIL"); ?>:
                        </label>
                        <input type="email" name="EMAIL" id="order-email" class="form-control modal-form__form-control"
                            <?= in_array("EMAIL", $arParams["FIELDS_REQUIRED"]) ? "required" : "" ?>>
                    </div>
                    <div class="modal-form__item">
                        <label for="order-phone" class="form-label modal-form__label">
                            <?= Loc::getMessage("TEL"); ?>:
                        </label>
                        <input type="tel" name="TEL" id="order-phone" class="form-control modal-form__form-control" required>
                    </div>
                    <?php if ($arParams["ADDRESS_AS_ONE_FIELD"] === "Y"): ?>
                    <div class="modal-form__item">
                        <label for="order-address" class="form-label modal-form__label">
                            <?= Loc::getMessage("ADDRESS"); ?>:
                        </label>
                        <textarea name="ADDRESS" id="order-address" class="form-control modal-form__form-control" rows="2" minlength="10"
                          <?= in_array("ADDRESS", $arParams["FIELDS_REQUIRED"]) ? "required" : "" ?>></textarea>
                    </div>
                    <?php endif; ?>
                    <div class="modal-form__item">
                        <label for="order-comment" class="form-label modal-form__label">
                            <?= Loc::getMessage("COMMENT"); ?>:
                        </label>
                        <textarea name="COMMENT" id="order-comment" class="form-control modal-form__form-control" rows="2"
                              <?= in_array("COMMENT", $arParams["FIELDS_REQUIRED"]) ? "required" : "" ?>></textarea>
                    </div>
                    <p class="modal-form__item">
                        <input type="submit" class="btn btn-sm btn-primary" value="<?=  Loc::getMessage("CHECKOUT_ORDER") ?>">
                    </p>
                    <div class="">
                        <?= Loc::getMessage("AGREEMENT", ["#URL#" => $arParams["AGREEMENT_URL"]]); ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>