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

if ($arResult['ITEMS']) {
    foreach ($arResult['ITEMS'] as $key => &$arItem) {
        $item_picture = $arItem['PRODUCT']['PREVIEW_PICTURE'];
        if ($item_picture) {
            $arItemPictureFileTmp = \CFile::ResizeImageGet(
                $item_picture,
                [
                    'width' => 200,
                    'height' => 200,
                ],
                BX_RESIZE_IMAGE_PROPORTIONAL,
                true
            );

            if ($arItemPictureFileTmp['src']) {
                $arItemPictureFileTmp['src'] = \CUtil::GetAdditionalFileURL($arItemPictureFileTmp['src'], true);
            }

            $arItem['PRODUCT']['PICTURE'] = array_change_key_case($arItemPictureFileTmp, CASE_UPPER);
        }
    }
}