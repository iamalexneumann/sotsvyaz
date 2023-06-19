<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var CMain $APPLICATION
 * @var CMain $CurDir
 * @var CSite $arSite
 * @var COption $siteparam_logo_name
 * @var COption $siteparam_logo_description
 * @var COption $siteparam_scripts_head
 * @var COption $siteparam_scripts_body_before
 * @var COption $siteparam_main_logo
 * @var COption $siteparam_main_phone
 * @var COption $siteparam_main_phone_tel
 * @var COption $siteparam_schedule
 * @var COption $siteparam_whatsapp_number
 * @var COption $siteparam_whatsapp_number_tel
 * @var COption $siteparam_whatsapp_message
 * @var COption $siteparam_telegram_link
 */
use Bitrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);

$patterns = [
    '#^/blog/([0-9a-zA-Z_-]+)/$#',
    '#^/services/([0-9a-zA-Z_-]+)/$#',
    '#^/services/([0-9a-zA-Z_-]+)/([0-9a-zA-Z_-]+)/$#',
];

$services_patterns = [
    '#^/services/([0-9a-zA-Z_-]+)/$#',
    '#^/services/([0-9a-zA-Z_-]+)/([0-9a-zA-Z_-]+)/$#',
]
?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID; ?>">
<head>
    <title><?php $APPLICATION->ShowTitle(); ?> | <?= $siteparam_logo_name; ?></title>
    <?php
    echo $siteparam_scripts_head;
    use Bitrix\Main\UI\Extension;
    use Bitrix\Main\Page\Asset;
    Extension::load(
        [
            'ui.bootstrap5',
            'ui.fonts.font-awesome',
            'ui.fonts.proxima_nova',
            'ui.lazysizes',
        ]
    );
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/main.js');
    $APPLICATION->ShowHead();
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/site.webmanifest">
    <link rel="mask-icon" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/safari-pinned-tab.svg" color="#137dc5">
    <link rel="shortcut icon" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#e3eef2">
    <meta name="msapplication-config" content="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
    <?= $siteparam_scripts_body_before; ?>
    <?php $APPLICATION->ShowPanel(); ?>
    <header class="main-header sticky-top">
        <nav class="navbar navbar-expand-xl">
            <div class="container">
                <a class="main-header__logo header-logo"
                   title="<?= htmlspecialchars($arSite['SITE_NAME']); ?>"
                    <?php if ($CurDir !== '/'): ?> href="/"<?php endif; ?>>
                    <img src="<?= $siteparam_main_logo; ?>" class="header-logo__img" width="60" height="60" alt="<?= htmlspecialchars($arSite['SITE_NAME']); ?>">
                    <span class="header-logo__wrapper">
                        <span class="header-logo__description"><?= custom_lcfirst($siteparam_logo_description); ?></span>
                        <span class="header-logo__name"><?= $siteparam_logo_name; ?></span>
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" aria-expanded="false"
                        data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-label="<?= Loc::getMessage('HEADER_NAVBAR_ARIA_LABEL'); ?>">
                    <span class="navbar-toggler__text"><?= Loc::getMessage('HEADER_NAVBAR_TOGGLER_TEXT'); ?></span>
                    <span class="navbar-toggler__icon"><i class="fa-solid fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNavbar">
                    <div class="ms-auto me-auto navbar-wrapper">
                        <?php
                        $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "main_menu",
                            array(
                                "ALLOW_MULTI_SELECT" => "N",
                                "CHILD_MENU_TYPE" => "main_submenu",
                                "COMPOSITE_FRAME_MODE" => "A",
                                "COMPOSITE_FRAME_TYPE" => "AUTO",
                                "DELAY" => "N",
                                "MAX_LEVEL" => "2",
                                "MENU_CACHE_GET_VARS" => array(
                                ),
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_TYPE" => "A",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "ROOT_MENU_TYPE" => "main_menu",
                                "USE_EXT" => "Y",
                                "COMPONENT_TEMPLATE" => "main_menu"
                            ),
                            false
                        ); ?>
                    </div>
                    <div class="main-header__contacts header-contacts">
                        <div class="header-contacts__wrapper">
                            <a class="header-contacts__phone-link" href="tel:<?= $siteparam_main_phone_tel; ?>"
                               title="<?= Loc::getMessage('HEADER_MAIN_PHONE_TITLE'); ?>"><?= $siteparam_main_phone; ?></a>
                            <button type="button"
                                    class="btn header-contacts__callback-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#callbackModal"
                                    data-bs-modal-title="<?= Loc::getMessage('CALLBACK_MODAL_TITLE') ?>"><?= Loc::getMessage('HEADER_CALLBACK_BTN_TEXT'); ?></button>
                        </div>
                        <?php if ($siteparam_whatsapp_number || $siteparam_telegram_link): ?>
                            <ul class="header-contacts__messengers messengers">
                                <?php if ($siteparam_telegram_link): ?>
                                    <li class="messengers__item">
                                        <a href="<?= $siteparam_telegram_link; ?>"
                                           target="_blank"
                                           class="messengers__link messengers__link_telegram"
                                           title="<?= Loc::getMessage('HEADER_MESSENGERS_TELEGRAM_TITLE'); ?>">Telegram</a>
                                    </li>
                                <?php endif; ?>
                                <?php if ($siteparam_whatsapp_number): ?>
                                    <li class="messengers__item">
                                        <a href="https://wa.me/<?php echo $siteparam_whatsapp_number_tel; echo $siteparam_whatsapp_message ?: '' ?>"
                                           target="_blank"
                                           class="messengers__link messengers__link_whatsapp"
                                           title="<?= Loc::getMessage('HEADER_MESSENGERS_WHATSAPP_TITLE'); ?>">WhatsApp</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
            </div>
        </nav>
    </header>
    <main class="<?php if (use_wide_template($CurDir, $patterns) === false): ?>main-area<?php else: ?>wide-area<?php endif; ?>">
        <?php if (!($CurDir === '/') && (use_wide_template($CurDir, $services_patterns) === false)): ?>
        <header class="page-header">
            <div class="container">
                <?php
                $APPLICATION->IncludeComponent(
                    "bitrix:breadcrumb",
                    "breadcrumb",
                    Array(
                        "START_FROM" => "0",
                        "PATH" => "",
                        "SITE_ID" => SITE_ID,
                    ),
                    false
                ); ?>
                <h1 class="page-header__title"><?php $APPLICATION->ShowTitle(null, false); ?></h1>
                <?php $APPLICATION->ShowViewContent('MAIN_SUBTITLE'); ?>
            </div>
        </header>
        <?php if (use_wide_template($CurDir, $patterns) === false): ?>
        <div class="container main-content">
        <?php endif; ?>
        <?php endif; ?>