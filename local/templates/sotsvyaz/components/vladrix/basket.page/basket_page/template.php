<? if ( ! defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
?>
<div class="basket">
    <div class="basket__list">
        <div class="basket__item basket__item--head js-basket-item">
            <div class="basket__item-pic">
                <p class="basket__title-col"><?= mb_strtoupper(GetMessage("PRODUCT")) ?></p>
            </div>
            <div class="basket__item-info"></div>
            <div class="basket__item-price">
                <p class="basket__title-col"><?= mb_strtoupper(GetMessage("PRICE")) ?></p>
            </div>
            <div class="basket__item-quantity">
                <p class="basket__title-col"><?= mb_strtoupper(GetMessage("QUANTITY")) ?></p>
            </div>
            <div class="basket__item-total">
                <p class="basket__title-col text-right"><?= mb_strtoupper(GetMessage("COST")) ?></p>
            </div>
            <div class="basket__item-remove js-basket-reset" title="<?= GetMessage("CLEAR_BASKET") ?>">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px"
                     y="0px" width="20px" height="20px" viewBox="0 0 729.837 729.838"
                     style="margin-top: -10px; enable-background:new 0 0 729.837 729.838;" xml:space="preserve"> <g>
                        <g>
                            <g>
                                <path d="M589.193,222.04c0-6.296,5.106-11.404,11.402-11.404S612,215.767,612,222.04v437.476c0,19.314-7.936,36.896-20.67,49.653 c-12.733,12.734-30.339,20.669-49.653,20.669H188.162c-19.315,0-36.943-7.935-49.654-20.669 c-12.734-12.734-20.669-30.313-20.669-49.653V222.04c0-6.296,5.108-11.404,11.403-11.404c6.296,0,11.404,5.131,11.404,11.404 v437.476c0,13.02,5.37,24.922,13.97,33.521c8.6,8.601,20.503,13.993,33.522,13.993h353.517c13.019,0,24.896-5.394,33.498-13.993 c8.624-8.624,13.992-20.503,13.992-33.498V222.04H589.193z"
                                      fill="#D80027"/>
                                <path d="M279.866,630.056c0,6.296-5.108,11.403-11.404,11.403s-11.404-5.107-11.404-11.403v-405.07 c0-6.296,5.108-11.404,11.404-11.404s11.404,5.108,11.404,11.404V630.056z"
                                      fill="#D80027"/>
                                <path d="M376.323,630.056c0,6.296-5.107,11.403-11.403,11.403s-11.404-5.107-11.404-11.403v-405.07 c0-6.296,5.108-11.404,11.404-11.404s11.403,5.108,11.403,11.404V630.056z"
                                      fill="#D80027"/>
                                <path d="M472.803,630.056c0,6.296-5.106,11.403-11.402,11.403c-6.297,0-11.404-5.107-11.404-11.403v-405.07 c0-6.296,5.107-11.404,11.404-11.404c6.296,0,11.402,5.108,11.402,11.404V630.056L472.803,630.056z"
                                      fill="#D80027"/>
                                <path d="M273.214,70.323c0,6.296-5.108,11.404-11.404,11.404c-6.295,0-11.403-5.108-11.403-11.404 c0-19.363,7.911-36.943,20.646-49.677C283.787,7.911,301.368,0,320.73,0h88.379c19.339,0,36.92,7.935,49.652,20.669 c12.734,12.734,20.67,30.362,20.67,49.654c0,6.296-5.107,11.404-11.403,11.404s-11.403-5.108-11.403-11.404 c0-13.019-5.369-24.922-13.97-33.522c-8.602-8.601-20.503-13.994-33.522-13.994h-88.378c-13.043,0-24.922,5.369-33.546,13.97 C278.583,45.401,273.214,57.28,273.214,70.323z"
                                      fill="#D80027"/>
                                <path d="M99.782,103.108h530.273c11.189,0,21.405,4.585,28.818,11.998l0.047,0.048c7.413,7.412,11.998,17.628,11.998,28.818 v29.46c0,6.295-5.108,11.403-11.404,11.403h-0.309H70.323c-6.296,0-11.404-5.108-11.404-11.403v-0.285v-29.175 c0-11.166,4.585-21.406,11.998-28.818l0.048-0.048C78.377,107.694,88.616,103.108,99.782,103.108L99.782,103.108z M630.056,125.916H99.782c-4.965,0-9.503,2.02-12.734,5.274L87,131.238c-3.255,3.23-5.274,7.745-5.274,12.734v18.056h566.361 v-18.056c0-4.965-2.02-9.503-5.273-12.734l-0.049-0.048C639.536,127.936,635.021,125.916,630.056,125.916z"
                                      fill="#D80027"/>
                            </g>
                        </g>
                    </g> </svg>
            </div>
        </div>
        <? foreach ($arResult["ITEMS"] as $key => $item) { ?>
            <? $product = $item["PRODUCT"] ?>
            <? $itemId = $item["ID"] ?>

            <div class="basket__item js-basket-item" data-id="<?= $itemId ?>">
                <div class="basket__item-pic">
                    <a href="<?= $product["DETAIL_PAGE_URL"] ?>">
                        <?if ( ! empty($product["PREVIEW_PICTURE"]["ID"])) {?>
                            <img src="<?= CFile::ResizeImageGet(
                                $product["PREVIEW_PICTURE"]["ID"],
                                ["width" => 100, "height" => 90],
                                BX_RESIZE_IMAGE_PROPORTIONAL,
                                false
                            )["src"] ?? "" ?>" alt="">
                        <?}?>
                    </a>
                </div>
                <div class="basket__item-info">
                    <a class="basket__item-name" href="<?= $product["DETAIL_PAGE_URL"] ?>">
                        <?= $product["NAME"] ?>
                    </a>
                    <div class="basket__item-chars">
                        <? foreach ($item["_OPTIONS"] as $optKey => $optVal) { ?>
                            <? if (mb_strlen($optVal)) { ?>
                                <div>
                                    <b><?= $item["OPTIONS_NAMES"][$optKey] ?>: </b>
                                    <span style="display: inline-block;"><?= $optVal ?: "-" ?></span>
                                </div>
                            <? } ?>
                        <? } ?>
                    </div>
                </div>
                <div class="basket__item-price">
                    <span class="basket__title-col"><?= mb_strtoupper(GetMessage("PRICE")) ?>: </span>
                    <?= number_format($item["PRICE"], 0, "", " "); ?>
                    <?=GetMessage("RUB")?>
                </div>
                <div class="basket__item-quantity">
                    <span class="basket__item-quantity-dec basket__btn basket__btn--secondary js-basket-item-qnt-dec">&mdash;</span>
                    <input id="qnt_<?= $itemId ?>"
                           class="basket__item-quantity-input form-control js-basket-item-qnt-input" type="number"
                           name="QUANTITY" min="1" step="1" value="<?= $item["QUANTITY"] ?>">
                    <span class="basket__item-quantity-inc basket__btn basket__btn--secondary js-basket-item-qnt-inc">+</span>
                </div>
                <div class="basket__item-total">
                    <span class="basket__title-col"><?= mb_strtoupper(GetMessage("COST")) ?>: </span>
                    <span class="js-basket-item-subtotal">
                        <?= number_format($item["SUB_TOTAL"], 0, "", " "); ?>
                    </span> <?=GetMessage("RUB")?>
                </div>
                <div class="basket__item-remove js-basket-item-remove" data-id="<?= $itemId ?>"
                     title="<?= GetMessage("DELETE_FROM_BASKET") ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                         x="0px" y="0px" width="20px" height="20px" viewBox="0 0 729.837 729.838"
                         style="enable-background:new 0 0 729.837 729.838;" xml:space="preserve"> <g>
                            <g>
                                <g>
                                    <path d="M589.193,222.04c0-6.296,5.106-11.404,11.402-11.404S612,215.767,612,222.04v437.476c0,19.314-7.936,36.896-20.67,49.653 c-12.733,12.734-30.339,20.669-49.653,20.669H188.162c-19.315,0-36.943-7.935-49.654-20.669 c-12.734-12.734-20.669-30.313-20.669-49.653V222.04c0-6.296,5.108-11.404,11.403-11.404c6.296,0,11.404,5.131,11.404,11.404 v437.476c0,13.02,5.37,24.922,13.97,33.521c8.6,8.601,20.503,13.993,33.522,13.993h353.517c13.019,0,24.896-5.394,33.498-13.993 c8.624-8.624,13.992-20.503,13.992-33.498V222.04H589.193z"
                                          fill="#D80027"/>
                                    <path d="M279.866,630.056c0,6.296-5.108,11.403-11.404,11.403s-11.404-5.107-11.404-11.403v-405.07 c0-6.296,5.108-11.404,11.404-11.404s11.404,5.108,11.404,11.404V630.056z"
                                          fill="#D80027"/>
                                    <path d="M376.323,630.056c0,6.296-5.107,11.403-11.403,11.403s-11.404-5.107-11.404-11.403v-405.07 c0-6.296,5.108-11.404,11.404-11.404s11.403,5.108,11.403,11.404V630.056z"
                                          fill="#D80027"/>
                                    <path d="M472.803,630.056c0,6.296-5.106,11.403-11.402,11.403c-6.297,0-11.404-5.107-11.404-11.403v-405.07 c0-6.296,5.107-11.404,11.404-11.404c6.296,0,11.402,5.108,11.402,11.404V630.056L472.803,630.056z"
                                          fill="#D80027"/>
                                    <path d="M273.214,70.323c0,6.296-5.108,11.404-11.404,11.404c-6.295,0-11.403-5.108-11.403-11.404 c0-19.363,7.911-36.943,20.646-49.677C283.787,7.911,301.368,0,320.73,0h88.379c19.339,0,36.92,7.935,49.652,20.669 c12.734,12.734,20.67,30.362,20.67,49.654c0,6.296-5.107,11.404-11.403,11.404s-11.403-5.108-11.403-11.404 c0-13.019-5.369-24.922-13.97-33.522c-8.602-8.601-20.503-13.994-33.522-13.994h-88.378c-13.043,0-24.922,5.369-33.546,13.97 C278.583,45.401,273.214,57.28,273.214,70.323z"
                                          fill="#D80027"/>
                                    <path d="M99.782,103.108h530.273c11.189,0,21.405,4.585,28.818,11.998l0.047,0.048c7.413,7.412,11.998,17.628,11.998,28.818 v29.46c0,6.295-5.108,11.403-11.404,11.403h-0.309H70.323c-6.296,0-11.404-5.108-11.404-11.403v-0.285v-29.175 c0-11.166,4.585-21.406,11.998-28.818l0.048-0.048C78.377,107.694,88.616,103.108,99.782,103.108L99.782,103.108z M630.056,125.916H99.782c-4.965,0-9.503,2.02-12.734,5.274L87,131.238c-3.255,3.23-5.274,7.745-5.274,12.734v18.056h566.361 v-18.056c0-4.965-2.02-9.503-5.273-12.734l-0.049-0.048C639.536,127.936,635.021,125.916,630.056,125.916z"
                                          fill="#D80027"/>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
            </div>
        <? } ?>
    </div>
    <div class="basket__total">
        <? if ($arResult["DISCOUNT_SUM"]) { ?>
            <div>
                <?= mb_strtoupper(GetMessage("SUM_NOT_SALE")) ?>:
                <div class="basket__total-price">
                    <span data-basket-total-price-dirty><?= number_format($arResult["TOTAL_PRICE"] + $arResult["DISCOUNT_SUM"], 0, "", " "); ?></span>
                    <?=GetMessage("RUB")?>
                </div>
            </div>
            <div>
                <?= mb_strtoupper(GetMessage("SALE")) ?>:
                <div class="basket__total-price" style="color: red">
                    <span data-basket-total-discount><?= number_format($arResult["DISCOUNT_SUM"], 0, "", " "); ?></span>
                    <?=GetMessage("RUB")?>
                </div>
            </div>
        <? } ?>
        <div>
            <?= mb_strtoupper(GetMessage("TOTAL")) ?>:
            <div class="basket__total-price">
                <span data-basket-total-price>
                      <?= number_format($arResult["TOTAL_PRICE"], 0, "", " "); ?>
                </span> <?=GetMessage("RUB")?>
            </div>
        </div>
    </div>
    <? if ( ! empty($arResult["ITEMS"])) { ?>
        <div class="basket__buttons">
            <a href="javascript:void(0)"
               class="basket__btn basket__btn--primary js-checkout-open"><?= mb_strtoupper(GetMessage("CONTINUE")) ?></a>
        </div>
    <? } ?>
</div>
<?
$checkoutComponent = new CBitrixComponent();
if ($checkoutComponent->InitComponent("vladrix:basket.checkout")) {
    $checkoutComponent->includeComponent("", $arParams, $component);
}
?>