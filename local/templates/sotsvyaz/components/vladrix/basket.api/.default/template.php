<? if ( ! defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
CJSCore::Init(["popup", "ajax", "fx"]);

$scripts = sprintf("
    <script>
        BX.message({
            ERROR: \"%s\",
            ERROR_BASKET_UPDATE: \"%s\",
        });
        
        BASKET.init();
    </script>"
    , GetMessageJS("ERROR")
    , GetMessageJS("ERROR_BASKET_UPDATE")
);

Bitrix\Main\Page\Asset::getInstance()->addString($scripts, true, Bitrix\Main\Page\AssetLocation::AFTER_JS)
?>