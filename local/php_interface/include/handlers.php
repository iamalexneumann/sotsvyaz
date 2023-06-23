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

function send_order_to_telegram(array &$arFields)
{
    if ($arFields['IBLOCK_ID'] === 1) {
        $siteparam_tg_user_ids = \COption::GetOptionString( 'askaron.settings', 'UF_TG_USER_IDS') ?? '';
        $siteparam_tg_bot_token = \COption::GetOptionString( 'askaron.settings', 'UF_TG_BOT_TOKEN') ?? '';
        $arSite = \Bitrix\Main\SiteTable::getById(SITE_ID)->fetch();

        $checkout_data = unserialize($arFields['PROPERTY_VALUES']['CHECKOUT_DATA']);
        $checkout_data_dict = [
            'ADDRESS' => 'Адрес',
            'NAME' => 'Имя',
            'TEL' => 'Телефон',
            'EMAIL' => 'E-mail',
            'COMMENT' => 'Комментарий',
        ];

        $product_data = [];
        foreach ($arFields['PROPERTY_VALUES']['ITEMS'] as $data_item) {
            array_push($product_data, unserialize($data_item));
        }

        $text = '🎯 <b>ЗАКАЗ ТОВАРОВ С САЙТА</b>' . PHP_EOL;
        $text .= PHP_EOL . '---' . PHP_EOL;
        $text .= PHP_EOL . $arFields['NAME'] . PHP_EOL;
        $text .= PHP_EOL . '---' . PHP_EOL;
        $text .= PHP_EOL . '<b>Корзина покупателя:</b>' . PHP_EOL;
        foreach ($product_data as $data_item) {
            $res = CIBlockElement::GetByID($data_item['PRODUCT']);
            if ($ar_res = $res->GetNext()) {
                $text .= PHP_EOL . '<b><a href="https://' . $arSite['SERVER_NAME'] . $ar_res['DETAIL_PAGE_URL'] . '">' . $ar_res['NAME'] . '</a></b> - ' . $data_item['QUANTITY'] . ' шт.';
            }
        }
        $text .= PHP_EOL . PHP_EOL . '<b>Кол-во товаров в заказе</b>: ' . $arFields['PROPERTY_VALUES']['TOTAL_QUANTITY'] . ' шт.';
        $text .= PHP_EOL . '<b>Общая сумма заказа</b>: ' . $arFields['PROPERTY_VALUES']['TOTAL_PRICE'] . ' руб.' . PHP_EOL;
        $text .= PHP_EOL . '---' . PHP_EOL;
        $text .= PHP_EOL . '<b>Данные покупателя:</b>' . PHP_EOL;

        foreach ($checkout_data as $key => $checkout_data_item) {
            $text .= PHP_EOL . '<b>' . $checkout_data_dict[$key] . '</b>: ' . $checkout_data_item;
        }

        foreach ($siteparam_tg_user_ids as $siteparam_tg_user_id) {
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
    }
}