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
$arWaterMark = Array(
    array(
        'name' => 'watermark',
        'position' => 'center',
        'type' => 'image',
        'size' => 'real',
        'file' => $_SERVER["DOCUMENT_ROOT"] . '/local/templates/sotsvyaz/components/bitrix/news.detail/portfolio_detail/images/watermark.png',
        'fill' => 'exact',
        'alpha_level' => 15
    )
);

if ($item_picture) {
    $arItemPictureFileTmp = \CFile::ResizeImageGet(
        $item_picture,
        [
            'width' => 650,
            'height' => 455,
        ],
        BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
        true
    );

    $arItemPictureLqipFileTmp = \CFile::ResizeImageGet(
        $item_picture,
        [
            'width' => 100,
            'height' => 70,
        ],
        BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
        true
    );

    $arItemPictureDetail = CFile::ResizeImageGet(
        $item_picture,
        [
            'width' => 1200,
            'height' => 1200
        ],
        BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
        true,
        $arWaterMark
    );

    if ($arItemPictureFileTmp['src']) {
        $arItemPictureFileTmp['src'] = \CUtil::GetAdditionalFileURL($arItemPictureFileTmp['src'], true);
    }

    if ($arItemPictureLqipFileTmp['src']) {
        $arItemPictureLqipFileTmp['src'] = \CUtil::GetAdditionalFileURL($arItemPictureLqipFileTmp['src'], true);
    }

    $arResult['PICTURE'] = array_change_key_case($arItemPictureFileTmp, CASE_UPPER);
    $arResult['PICTURE_LQIP'] = array_change_key_case($arItemPictureLqipFileTmp, CASE_UPPER);
    $arResult['DETAIL_PICTURE']['SRC'] = $arItemPictureDetail['src'];
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
            BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
            true
        );

        $arItemPictureLqipFileTmp = \CFile::ResizeImageGet(
            $more_photo,
            [
                'width' => 100,
                'height' => 70,
            ],
            BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
            true
        );

        $arItemPictureDetail = CFile::ResizeImageGet(
            $more_photo,
            [
                'width' => 1200,
                'height' => 1200
            ],
            BX_RESIZE_IMAGE_PROPORTIONAL_ALT,
            true,
            $arWaterMark
        );

        if ($arItemPictureFileTmp['src']) {
            $arItemPictureFileTmp['src'] = \CUtil::GetAdditionalFileURL($arItemPictureFileTmp['src'], true);
        }

        if ($arItemPictureLqipFileTmp['src']) {
            $arItemPictureLqipFileTmp['src'] = \CUtil::GetAdditionalFileURL($arItemPictureLqipFileTmp['src'], true);
        }

        $arResult['PROPERTIES']['MORE_PHOTO']['PICTURE'][$key] = array_change_key_case($arItemPictureFileTmp, CASE_UPPER);
        $arResult['PROPERTIES']['MORE_PHOTO']['PICTURE_LQIP'][$key] = array_change_key_case($arItemPictureLqipFileTmp, CASE_UPPER);
        $arResult['PROPERTIES']['MORE_PHOTO']['VALUE'][$key] = $arItemPictureDetail['src'];
    }
}