<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Ошибка 404 - страница не найдена");

echo '<p class="h5 mt-0">Выберите любую другую страницу из списка:</p>';

$APPLICATION->IncludeComponent(
    "bitrix:menu",
    "404_menu",
    Array(
        "ALLOW_MULTI_SELECT" => "N",
        "CHILD_MENU_TYPE" => "main_submenu",
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO",
        "DELAY" => "N",
        "MAX_LEVEL" => "2",
        "MENU_CACHE_GET_VARS" => array(""),
        "MENU_CACHE_TIME" => "3600",
        "MENU_CACHE_TYPE" => "N",
        "MENU_CACHE_USE_GROUPS" => "Y",
        "ROOT_MENU_TYPE" => "404_menu",
        "USE_EXT" => "Y"
    )
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>