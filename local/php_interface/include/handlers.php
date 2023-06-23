<?php
AddEventHandler('main', 'OnEndBufferContent', 'removeAtts');
$eventManager = \Bitrix\Main\EventManager::getInstance();
$eventManager->addEventHandler('main', 'OnEndBufferContent', 'deleteKernelCss');
$eventManager->addEventHandler('main', 'OnEndBufferContent', 'removeSpacesAndTabs');

$eventManager->addEventHandler('iblock', 'OnBeforeIBlockElementAdd', 'send_order_to_telegram');

function removeAtts(&$content)
{
    $content = replace_output($content);
}
function replace_output($d)
{
    return str_replace(
        [' type="text/javascript"', ' />'],
        ['', '>'],
        $d
    );
}

function deleteKernelCss (&$content) {
    global $USER;

    if (!$USER->IsAuthorized()) {
        $arPatternsToRemove = Array(
            '/<link.+?href=".+?kernel_main\/kernel_main_v1\.css\?\d+"[^>]+>/',
            '/<link.+?href=".+?bitrix\/js\/main\/core\/css\/core[^"]+"[^>]+>/',
            '/<script.+?>if\(\!window\.BX\)window\.BX.+?<\/script>/',
            '/<script[^>]+?>\(window\.BX\|\|top\.BX\)\.message[^<]+<\/script>/',
            // '/<script.+?src=".+?bitrix\/js\/main\/core\/core[^"]+"><\/script\>/',
            '/<script.+?>BX\.(setCSSList|setJSList)\(\[.+?\]\).*?<\/script>/',
            '/BX\.(setCSSList|setJSList)\(\[.+?\]\);/',
            '/\s{2,}/'
        );

        $content = preg_replace($arPatternsToRemove, ' ', $content);

    }
}

function removeSpacesAndTabs (&$content) {
    global $APPLICATION;
    $page = $APPLICATION->GetCurPage();

    if ($page != '/bitrix/tools/captcha.php' && $page != '/bitrix/admin/captcha.php') {
        $content = preg_replace('/[ \t]+/', ' ', $content);
        $content = str_replace(['\n \n'], '\n', $content);
    }
}

function send_order_to_telegram(array &$arFields) {
    $siteparam_tg_user_ids = \COption::GetOptionString( 'askaron.settings', 'UF_TG_USER_IDS') ?? '';
    $siteparam_tg_bot_token = \COption::GetOptionString( 'askaron.settings', 'UF_TG_BOT_TOKEN') ?? '';
    $arSite = \Bitrix\Main\SiteTable::getById(SITE_ID)->fetch();

    $text = '🎯 <b>ЗАКАЗ С САЙТА</b>' . PHP_EOL;
    $text .= PHP_EOL . '---' . PHP_EOL;
    foreach ($arFields as $key => $arField) {
        $text .= PHP_EOL . '<b>' . $arField . ':</b> ';
        $text .= PHP_EOL;
    }

    foreach($siteparam_tg_user_ids as $siteparam_tg_user_id) {
        $params = [
            'chat_id' => $siteparam_tg_user_id,
            'text' => $text,
            'parse_mode' => 'HTML',
        ];

        $curl = curl_init();
        curl_setopt(
            $curl,
            CURLOPT_URL,
            'https://api.telegram.org/bot' . $siteparam_tg_bot_token . '/sendMessage'
        );
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
        curl_exec($curl);
        curl_close($curl);
    }

        print_r($arFields);
}