<?php
use Bitrix\Main\Grid\Declension;
/**
 * Функция, возвращающая номер телефона с ведущим символом "+" для HTML-атрибута tel="".
 * Очищает все лишние символы и если номер телефона начинается с цифры 8, то заменяет её на 7.
 * @param string $phone Российский номер телефона, например, 8 (999) 980-07-53
 * @return string Преобразованный номер телефона, например, +79999800753
 */
function get_tel_from_phone (string $phone):string
{
    $phone = preg_replace('![^0-9]+!', '', $phone);
    if ($phone[0] === '8')
        $phone[0] = 7;
    return '+' . $phone;
}

/**
 * Функция, возвращающая текст внешней ссылки на мессенджер WhatsApp.
 * Конвертирует все пробелы в исходной строке на соответствующий URL-код "%20" и возвращает значение, начинающееся с ?text=.
 * @param string $input_string Входная строка с текстом для конвертации
 * @return string Преобразованная строка, в которой все пробелы заменены на URL-код "%20" и в начале добавлено ?text=
 */
function transform_text_to_whatsapp_link (string $input_string):string
{
    return $input_string ? '?text=' . preg_replace('/\s+/', '%20', $input_string) : '';
}

/**
 * Функция, возвращающая полный URL страницы в вызываемом месте. URL возвращается начиная с протокола сайта и заканчивая до параметров.
 * @return string Полный URL страницы без параметров
 */
function get_full_cur_dir ():string
{
    global $APPLICATION;
    $current_page = 'http://';
    if (isset($_SERVER['HTTPS']) &&
        ($_SERVER['HTTPS'] === 'on' || $_SERVER['HTTPS'] === 1) ||
        isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
        $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
        $current_page = 'https://';
    }
    $current_page .= $_SERVER["HTTP_HOST"];
    $current_page .= $APPLICATION->GetCurDir();
    return $current_page;
}

/**
 * Функция, возвращаюая строку, в которой первый символ в нижнем регистре. Стандартная функция lcfirst() не работает для кириллицы.
 * @param string $str Входящая строка
 * @param string $e Кодировка (по-умолчанию utf-8)
 * @return string Преобразованная строка с первым строчным символом.
 */
function custom_lcfirst (string $str, string $e = 'utf-8'):string
{
    $fc = mb_strtolower(mb_substr($str, 0, 1, $e), $e);
    return $fc . mb_substr($str, 1, mb_strlen($str, $e), $e);
}

/**
 * Функция, возвращаюая строку, в которой первый символ в верхнем регистре. Стандартная функция ucfirst() не работает для кириллицы.
 * @param string $str Входящая строка
 * @param string $e Кодировка (по-умолчанию utf-8)
 * @return string Преобразованная строка с первым заглавным символом.
 */
function custom_ucfirst (string $str, string $e = 'utf-8'):string
{
    $fc = mb_strtoupper(mb_substr($str, 0, 1, $e), $e);
    return $fc . mb_substr($str, 1, mb_strlen($str, $e), $e);
}

/**
 * Функция возвращает индентификатор видео с YouTube.
 * @param string $url Любой URL с видео с YouTube
 * @return string Идентификатор видео YouTube
 */
function get_youtube_id (string $url):string
{
    $regex_pattern = '/(?:https?:)?(?:\/\/)?(?:[0-9A-Z-]+\.)?(?:youtu\.be\/|youtube(?:-nocookie)?\.com\S*?[^\w\s-])([\w-]{11})(?=[^\w-]|$)(?![?=&+%\w.-]*(?:[\'"][^<>]*>|<\/a>))[?=&+%\w.-]*/';
    preg_match($regex_pattern, $url, $mathes);
    return $mathes[1];
}

/**
 * Функция получает список пользовательских полей (UF_*) секции из URL страницы.
 * Внутри происходит получение SECTION_CODE из URL страницы.
 * @param int $iblock_id Идентификатор инфоблока
 * @param string $cur_page Адрес страницы
 * @return array Массив с общей информацией о секции и списком полей UF_*
 */
function get_section_ufs_from_url (int $iblock_id, string $cur_page):array
{
    $ar_cur_page = explode('/', $cur_page);
    $section_code = array_slice($ar_cur_page, -2, 1)[0];
    $ob_section = CIBlockSection::GetList(
        [],
        [
            'IBLOCK_ID' => $iblock_id,
            '=CODE' => $section_code
        ],
        false,
        ['UF_*'],
    );
    if ($arr_ufs = $ob_section->Fetch()) {
        return $arr_ufs;
    }
    return [];
}

/**
 * Функция возвращает массив с ID элемента через фильтрацию по его ELEMENT_CODE.
 * @param string $element_code ELEMENT_CODE элемента инфоблока
 * @return array Массив с ID элемента
 */
function get_element_id_from_element_code (string $element_code):array
{
    $elements_list = CIBlockElement::GetList(
        [],
        [
            '=CODE' => $element_code,
            'ACTIVE' => 'Y',
        ],
        false,
        false,
        [
            'ID',
            'NAME'
        ],
    );
    $elements = [];
    while ($arr_elements = $elements_list->Fetch()) {
        $elements = $arr_elements;
    }
    return $elements;
}

/**
 * Функция проверяет наличие элементов в инфоблоке по заданному фильтру
 * @param array $filter Фильтр с параметрами
 * @return array Массив элементов
 */
function is_empty_iblock (array $filter):array
{
    $elements_list = CIBlockElement::GetList(
        [],
        $filter,
        false,
        false,
        ['ID'],
    );
    $elements = [];
    while ($arr_elements = $elements_list->Fetch()) {
        $elements = $arr_elements;
    }
    return $elements;
}

/**
 * Функция для подключения широкого шаблона сайта (без контейнера).
 * @param string $url Шаблон ссылки, где использовать шаблон сайта без контейнера
 * @return bool
 */
function use_wide_template (string $url):bool
{
    $patterns = [
        '#^/about/$#',
        '#^/about/team/$#',
        '#^/about/team/([0-9a-zA-Z_-]+)/$#',
        '#^/about/reviews/$#',
        '#^/portfolio/$#',
        '#^/portfolio/([0-9a-zA-Z_-]+)/$#',
        '#^/portfolio/([0-9a-zA-Z_-]+)/([0-9a-zA-Z_-]+)/$#',
        '#^/services/$#',
        '#^/services/([0-9a-zA-Z_-]+)/$#',
        '#^/services/([0-9a-zA-Z_-]+)/([0-9a-zA-Z_-]+)/$#',
    ];
    for ($i = 0; $i < count($patterns); $i++) {
        preg_match($patterns[$i], $url, $matches);
        if (count($matches) > 0) {
            return true;
        }
    }
    return false;
}