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
<div class="basket-page">
    <?php if (!empty($arResult['ITEMS'])): ?>
    <div class="basket-page__products">
        <?php foreach ($arResult['ITEMS'] as $key => $item): ?>
        <div class="basket-page__item basket-item js-basket-item" data-id="<?= $item['ID']; ?>">
            <div class="basket-item__product">
                <a href="<?= $item['PRODUCT']['DETAIL_PAGE_URL']; ?>" class="basket-item__img-link">
                    <img src="<?= $item['PRODUCT']['PICTURE']['SRC']; ?>" class="basket-item__img" alt="<?= $item['PRODUCT']['NAME']; ?>">
                </a>
                <div class="basket-item__content">
                    <a href="<?= $item['PRODUCT']['DETAIL_PAGE_URL']; ?>" class="basket-item__title"><?= $item['PRODUCT']['NAME']; ?></a>
                    <div class="basket-item__price">
                        <?= number_format($item['PRICE'], 0, "", " "); ?> <?= Loc::getMessage('RUB')?>
                    </div>
                    <button type="button" class="btn basket-item__remove-btn js-basket-item-remove" data-id="<?= $item['ID']; ?>"><?= Loc::getMessage('DELETE_FROM_BASKET') ?></button>
                </div>
            </div>
            <div class="basket-item__wrapper">
                <div class="basket-item__quantity quantity">
                    <input type="button" value="−" class="btn quantity__btn quantity__btn_minus js-basket-item-qnt-dec">
                    <input id="qnt_<?= $item['ID']; ?>"
                           type="number"
                           step="1"
                           max="1000"
                           value="<?= $item['QUANTITY']; ?>"
                           min="1"
                           name="QUANTITY"
                           class="quantity__field js-basket-item-qnt-input">
                    <input type="button" value="+" class="btn quantity__btn quantity__btn_plus js-basket-item-qnt-inc">
                </div>
                <div class="basket-item__total total">
                    <div class="total__title"><?= Loc::getMessage('COST'); ?>:</div>
                    <div class="total__value">
                        <span class="js-basket-item-subtotal"><?= number_format($item['SUB_TOTAL'], 0, '', ' '); ?></span>
                        <?= Loc::getMessage('RUB'); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="basket-page__info info">
        <div class="info__total total">
            <div class="total__title"><?= Loc::getMessage('TOTAL'); ?>:</div>
            <div class="total__value">
                <span data-basket-total-price><?= number_format($arResult['TOTAL_PRICE'], 0, '', ' '); ?></span>
                <?= Loc::getMessage('RUB'); ?>
            </div>
        </div>

        <div class="info__buttons">
            <button type="button" class="btn btn-sm btn-primary info__order-btn js-checkout-open"><?= Loc::getMessage('CONTINUE'); ?></button>
        </div>
    </div>
    <?php else: echo Loc::getMessage('EMPTY_CART'); endif; ?>
</div>
<?php
$checkoutComponent = new CBitrixComponent();
if ($checkoutComponent->InitComponent("vladrix:basket.checkout")) {
    $checkoutComponent->includeComponent("", $arParams, $component);
}