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
$item_picture = $arResult['DETAIL_PICTURE'];
if ($item_picture) {
    $arItemPictureFileTmp = \CFile::ResizeImageGet(
        $item_picture,
        [
            'width' => 650,
            'height' => 455,
        ],
        BX_RESIZE_IMAGE_EXACT,
        true
    );

    $arItemPictureLqipFileTmp = \CFile::ResizeImageGet(
        $item_picture,
        [
            'width' => 100,
            'height' => 70,
        ],
        BX_RESIZE_IMAGE_EXACT,
        true
    );

    if ($arItemPictureFileTmp['src']) {
        $arItemPictureFileTmp['src'] = \CUtil::GetAdditionalFileURL($arItemPictureFileTmp['src'], true);
    }

    if ($arItemPictureLqipFileTmp['src']) {
        $arItemPictureLqipFileTmp['src'] = \CUtil::GetAdditionalFileURL($arItemPictureLqipFileTmp['src'], true);
    }

    $arResult['PICTURE'] = array_change_key_case($arItemPictureFileTmp, CASE_UPPER);
    $arResult['PICTURE_LQIP'] = array_change_key_case($arItemPictureLqipFileTmp, CASE_UPPER);
}

$more_photos = $arResult['PROPERTIES']['MORE_PHOTO'];

foreach ($more_photos['VALUE'] as $key => $more_photo) {
    if ($more_photo) {
        $arItemPictureFileTmp = \CFile::ResizeImageGet(
            $more_photo,
            [
                'width' => 650,
                'height' => 455,
            ],
            BX_RESIZE_IMAGE_EXACT,
            true
        );

        $arItemPictureLqipFileTmp = \CFile::ResizeImageGet(
            $more_photo,
            [
                'width' => 100,
                'height' => 70,
            ],
            BX_RESIZE_IMAGE_EXACT,
            true
        );

        if ($arItemPictureFileTmp['src']) {
            $arItemPictureFileTmp['src'] = \CUtil::GetAdditionalFileURL($arItemPictureFileTmp['src'], true);
        }

        if ($arItemPictureLqipFileTmp['src']) {
            $arItemPictureLqipFileTmp['src'] = \CUtil::GetAdditionalFileURL($arItemPictureLqipFileTmp['src'], true);
        }

        $arResult['PROPERTIES']['MORE_PHOTO']['PICTURE'][$key] = array_change_key_case($arItemPictureFileTmp, CASE_UPPER);
        $arResult['PROPERTIES']['MORE_PHOTO']['PICTURE_LQIP'][$key] = array_change_key_case($arItemPictureLqipFileTmp, CASE_UPPER);
    }
}