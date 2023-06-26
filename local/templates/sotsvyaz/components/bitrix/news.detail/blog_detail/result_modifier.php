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
 */
use Bitrix\Main\Localization\Loc;

$component = $this->__component;

$arResult['VIEW_COUNT'] = get_text_with_declension(
    Loc::getMessage('BLOG_DETAIL_DECLENTION_ONE'),
    Loc::getMessage('BLOG_DETAIL_DECLENTION_FOUR'),
    Loc::getMessage('BLOG_DETAIL_DECLENTION_FIVE'),
    $arResult['SHOW_COUNTER'] ?? 0
);

$component->SetResultCacheKeys(
    [
        'VIEW_COUNT',
    ],
);