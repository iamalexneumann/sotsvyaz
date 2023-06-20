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

if (Cmodule::IncludeModule('asd.iblock')) {
    $iblock_ufs = CASDiblockTools::GetIBUF($arParams['IBLOCK_ID']);
    $arResult['IBLOCK_SEO_TEXT_TOP'] = $iblock_ufs['UF_SEO_TEXT_TOP'] ?? '';
    $arResult['IBLOCK_SEO_TEXT_BOTTOM'] = $iblock_ufs['UF_SEO_TEXT_BOTTOM'] ?? '';
}

$arResult['SECTION_UFS'] = get_section_ufs_from_url($arParams['IBLOCK_ID'], $APPLICATION->GetCurPage());

if ($arResult['VARIABLES']['ELEMENT_CODE']) {
    $section_arr = get_section_ufs_from_url($arParams['IBLOCK_ID'], $arResult['VARIABLES']['SECTION_CODE']);
    $arResult['SECTION_NAME'] = $section_arr['NAME'];

    if ($arResult['VARIABLES']['SECTION_CODE']) {
        $section = get_section_ufs_from_url($arParams['IBLOCK_ID'], $arResult['VARIABLES']['SECTION_CODE']);
    }
    $element = get_element_id_from_element_code($arResult['VARIABLES']['ELEMENT_CODE']);
    $items_prev = CIBlockElement::GetList(
        ['ID' => 'DESC'],
        [
            'ACTIVE' => 'Y',
            'IBLOCK_ID' => $arParams['IBLOCK_ID'],
            '=IBLOCK_SECTION_ID' => $section['ID'],
            '<ID' => $element['ID'],
        ],
        false,
        ['nTopCount' => 1],
        [
            'DETAIL_PAGE_URL',
            'NAME'
        ]
    );
    $arResult['PREV_POST'] = $items_prev->GetNext();


    $items_next = CIBlockElement::GetList(
        ['ID' => 'ASC'],
        [
            'ACTIVE' => 'Y',
            'IBLOCK_ID' => $arParams['IBLOCK_ID'],
            '=IBLOCK_SECTION_ID' => $section['ID'],
            '>ID' => $element['ID'],
        ],
        false,
        ['nTopCount' => 1],
        [
            'DETAIL_PAGE_URL',
            'NAME'
        ]
    );
    $arResult['NEXT_POST'] = $items_next->GetNext();
}

$item_picture = $arResult['SECTION_UFS']['DETAIL_PICTURE'];
if ($item_picture) {
    $arItemPictureFileTmp = \CFile::ResizeImageGet(
        $item_picture,
        [
            'width' => 400,
            'height' => 535,
        ],
        BX_RESIZE_IMAGE_EXACT,
        true
    );

    $arItemPictureLqipFileTmp = \CFile::ResizeImageGet(
        $item_picture,
        [
            'width' => 75,
            'height' => 100,
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

    $arResult['SECTION_UFS']['PICTURE'] = array_change_key_case($arItemPictureFileTmp, CASE_UPPER);
    $arResult['SECTION_UFS']['PICTURE_LQIP'] = array_change_key_case($arItemPictureLqipFileTmp, CASE_UPPER);
}