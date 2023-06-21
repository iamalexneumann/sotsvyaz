<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
use Bitrix\Main\Localization\Loc;
?>
<div class="main-section features">
    <div class="container">
        <div class="main-section__title"><?= Loc::getMessage('FEAUTURES_SECTION_TITLE'); ?></div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="features-item">
                    <div class="features-item__icon"><i class="fa-regular fa-handshake"></i></div>
                    <div class="features-item__title"><?= Loc::getMessage('FEATURES_ITEM1_TITLE'); ?></div>
                    <div class="features-item__text"><?= Loc::getMessage('FEATURES_ITEM1_TEXT'); ?></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="features-item">
                    <div class="features-item__icon"><i class="fa-brands fa-black-tie"></i></div>
                    <div class="features-item__title"><?= Loc::getMessage('FEATURES_ITEM2_TITLE'); ?></div>
                    <div class="features-item__text"><?= Loc::getMessage('FEATURES_ITEM2_TEXT'); ?></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="features-item">
                    <div class="features-item__icon"><i class="fa-solid fa-people-group"></i></div>
                    <div class="features-item__title"><?= Loc::getMessage('FEATURES_ITEM3_TITLE'); ?></div>
                    <div class="features-item__text"><?= Loc::getMessage('FEATURES_ITEM3_TEXT'); ?></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="features-item">
                    <div class="features-item__icon"><i class="fa-solid fa-house-signal"></i></div>
                    <div class="features-item__title"><?= Loc::getMessage('FEATURES_ITEM4_TITLE'); ?></div>
                    <div class="features-item__text"><?= Loc::getMessage('FEATURES_ITEM4_TEXT'); ?></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="features-item">
                    <div class="features-item__icon"><i class="fa-solid fa-file-contract"></i></div>
                    <div class="features-item__title"><?= Loc::getMessage('FEATURES_ITEM5_TITLE'); ?></div>
                    <div class="features-item__text"><?= Loc::getMessage('FEATURES_ITEM5_TEXT'); ?></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="features-item">
                    <div class="features-item__icon"><i class="fa-solid fa-truck-fast"></i></div>
                    <div class="features-item__title"><?= Loc::getMessage('FEATURES_ITEM6_TITLE'); ?></div>
                    <div class="features-item__text"><?= Loc::getMessage('FEATURES_ITEM6_TEXT'); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
