<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Ошибка 404 - страница не найдена");

echo '<p class="h4 mt-0">Выберите любую другую страницу из списка:</p>';

$APPLICATION->IncludeComponent(
    "bitrix:main.map",
    "main_map",
    Array(
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "COL_NUM" => "1",
        "COMPONENT_TEMPLATE" => ".default",
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO",
        "LEVEL" => "10",
        "SET_TITLE" => "N",
        "SHOW_DESCRIPTION" => "Y"
    )
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>