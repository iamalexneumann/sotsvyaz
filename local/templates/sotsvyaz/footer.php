<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
require($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/variables.php');
/**
 * @var CMain $APPLICATION
 * @var CMain $CurDir
 * @var CSite $arSite
 * @var COption $siteparam_main_logo
 * @var COption $siteparam_footer_logo
 * @var COption $siteparam_main_form_suptitle
 * @var COption $siteparam_main_form_title
 * @var COption $siteparam_main_form_subtitle
 * @var COption $siteparam_logo_name
 * @var COption $siteparam_logo_description
 * @var COption $siteparam_main_phone
 * @var COption $siteparam_main_phone_tel
 * @var COption $siteparam_schedule
 * @var COption $siteparam_email
 * @var COption $siteparam_address
 * @var COption $siteparam_whatsapp_number
 * @var COption $siteparam_whatsapp_number_tel
 * @var COption $siteparam_whatsapp_message
 * @var COption $siteparam_telegram_link
 * @var COption $siteparam_scripts_body_after
 */
use Bitrix\Main\Localization\Loc;

$patterns = [
    '#^/blog/([0-9a-zA-Z_-]+)/$#',
    '#^/services/([0-9a-zA-Z_-]+)/$#',
    '#^/services/([0-9a-zA-Z_-]+)/([0-9a-zA-Z_-]+)/$#',
];
?>
        <?php if ((!($CurDir === '/')) && !(use_wide_template($CurDir, $patterns) === true)): ?>
        </div>
        <?php endif; ?>
    </main>

    <div class="main-section main-section_form">
        <div class="container">
            <div class="main-section__header">
                <?php if ($siteparam_main_form_suptitle): ?>
                <div class="main-section__suptitle"><?= $siteparam_main_form_suptitle; ?></div>
                <?php endif; ?>
                <div class="h2 main-section__title"><?= $siteparam_main_form_title; ?></div>
                <?php if ($siteparam_main_form_subtitle): ?>
                <div class="main-section__subtitle"><?= $siteparam_main_form_subtitle; ?></div>
                <?php endif; ?>
            </div>
            <?php $APPLICATION->IncludeComponent(
                "custom.bitrix:main.feedback",
                "main_form",
                Array(
                    "COMPOSITE_FRAME_MODE" => "A",
                    "COMPOSITE_FRAME_TYPE" => "AUTO",
                    "EMAIL_TO" => $siteparam_email,
                    "EVENT_MESSAGE_ID" => array(
                        0 => "7",
                    ),
                    "OK_TEXT" => Loc::getMessage('MAIN_FORM_OK_TEXT'),
                    "REQUIRED_FIELDS" => array("USER_PHONE"),
                    "USE_CAPTCHA" => "N",
                    "AJAX_MODE" => "Y",
                    "AJAX_OPTION_SHADOW" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                )
            ); ?>
        </div>
    </div>

    <footer class="main-footer">
        <div class="footer-content">
            <div class="container">
                <div class="row footer-content__main-row">
                    <div class="col-lg-8">
                        <?php
                        $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "footer_menu",
                            Array(
                                "ALLOW_MULTI_SELECT" => "N",
                                "CHILD_MENU_TYPE" => "",
                                "DELAY" => "N",
                                "MAX_LEVEL" => "3",
                                "MENU_CACHE_GET_VARS" => "",
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_TYPE" => "A",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "ROOT_MENU_TYPE" => "services_menu",
                                "USE_EXT" => "Y",
                                "COMPONENT_TEMPLATE" => ""
                            ),
                            false
                        ); ?>
                    </div>
                    <div class="col-lg-4 footer-contacts">
                        <a class="footer-contacts__logo footer-logo"
                           title="<?= htmlspecialchars($arSite['SITE_NAME']); ?>"
                            <?php if ($CurDir !== '/'): ?> href="/"<?php endif; ?>>
                            <span class="footer-logo__description"><?= $siteparam_logo_description; ?></span>
                            <img src="<?= $siteparam_footer_logo ?: $siteparam_main_logo; ?>"
                                 class="footer-logo__img"
                                 width="270"
                                 height="65"
                                 alt="<?= htmlspecialchars($arSite['SITE_NAME']); ?>">
                        </a>
                        <div class="footer-contacts__phone">
                            <div class="footer-contacts__wrapper">
                                <a class="footer-contacts__phone-link" href="tel:<?= $siteparam_main_phone_tel; ?>"
                                   title="<?= Loc::getMessage('FOOTER_MAIN_PHONE_TITLE'); ?>"><?= $siteparam_main_phone; ?></a>
                                <?php if ($siteparam_schedule): ?>
                                <div class="footer-contacts__schedule"><?= $siteparam_schedule; ?></div>
                                <?php endif; ?>
                            </div>
                            <?php if ($siteparam_whatsapp_number || $siteparam_telegram_link): ?>
                            <ul class="footer-contacts__messengers messengers">
                                <?php if ($siteparam_telegram_link): ?>
                                <li class="messengers__item">
                                    <a href="<?= $siteparam_telegram_link; ?>"
                                       target="_blank"
                                       class="messengers__link messengers__link_telegram"
                                       title="<?= Loc::getMessage('FOOTER_MESSENGERS_TELEGRAM_TITLE'); ?>">Telegram</a>
                                </li>
                                <?php endif; ?>
                                <?php if ($siteparam_whatsapp_number): ?>
                                <li class="messengers__item">
                                    <a href="https://wa.me/<?php echo $siteparam_whatsapp_number_tel; echo $siteparam_whatsapp_message ?: '' ?>"
                                       target="_blank"
                                       class="messengers__link messengers__link_whatsapp"
                                       title="<?= Loc::getMessage('FOOTER_MESSENGERS_WHATSAPP_TITLE'); ?>">WhatsApp</a>
                                </li>
                                <?php endif; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                        <button type="button"
                                class="btn btn-sm btn-light footer-contacts__callback-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#callbackModal"
                                data-bs-modal-title="<?= Loc::getMessage('CALLBACK_MODAL_TITLE') ?>"><?= Loc::getMessage('FOOTER_CALLBACK_BTN_TEXT'); ?></button>
                        <a href="mailto:<?= $siteparam_email; ?>" class="footer-contacts__email-link">
                            <i class="fa-solid fa-envelope"></i>
                            <?= $siteparam_email; ?>
                        </a>
                        <div class="footer-contacts__address">
                            <i class="fa-solid fa-location-dot"></i>
                            <?= $siteparam_address; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="footer-copyright__text">
                    &#169; <?= htmlspecialchars($arSite['SITE_NAME']); ?> - <?= custom_lcfirst($siteparam_logo_description); ?>, 2013-<?= date('Y'); ?> <?= Loc::getMessage('FOOTER_COPYRIGHT_YEARS_TEXT'); ?>. <?= Loc::getMessage('FOOTER_COPYRIGHT_RIGHTS_TEXT'); ?>.
                </div>
                <div class="footer-copyright__links">
                    <a href="/privacy-policy/" class="footer-copyright__link"><?= Loc::getMessage('FOOTER_COPYRIGHT_PRIVACY_LINK_TEXT'); ?></a>
                    <a href="/sitemap/" class="footer-copyright__link"><?= Loc::getMessage('FOOTER_COPYRIGHT_SITEMAP_LINK_TEXT'); ?></a>
                </div>
            </div>
        </div>
    </footer>

    <div class="modal fade" id="callbackModal" tabindex="-1" aria-labelledby="callbackModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title"></div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?= Loc::getMessage('BTN_CLOSE_LABEL'); ?>">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    $APPLICATION->IncludeComponent(
                        "custom.bitrix:main.feedback",
                        "modal_form",
                        array(
                            "COMPOSITE_FRAME_MODE" => "A",
                            "COMPOSITE_FRAME_TYPE" => "AUTO",
                            "EMAIL_TO" => "info@sotsvyaz.ru",
                            "EVENT_MESSAGE_ID" => array(
                                0 => "7",
                            ),
                            "OK_TEXT" => Loc::getMessage('MODAL_FORM_OK_TEXT'),
                            "REQUIRED_FIELDS" => array(
                                1 => "USER_PHONE",
                            ),
                            "USE_CAPTCHA" => "N",
                            "COMPONENT_TEMPLATE" => "modal_form",
                            "REDIRECT_URL" => "",
                            "AJAX_MODE" => "Y",
                            "AJAX_OPTION_SHADOW" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                        ),
                        false
                    ); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal cart-modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title"><?= Loc::getMessage('CART_MODAL_TITLE'); ?></div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?= Loc::getMessage('BTN_CLOSE_LABEL'); ?>">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="cart-modal__btns">
                        <button type="button" class="btn btn-sm btn-outline-primary cart-modal__btn-close" data-bs-dismiss="modal"><?= Loc::getMessage('CART_MODAL_BTN_CLOSE_TEXT'); ?></button>
                        <a href="/cart/" class="btn btn-sm btn-primary cart-modal__btn-cart"><?= Loc::getMessage('CART_MODAL_BTN_CART_TEXT'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/svg_sprites.php'); ?>
    <a href="#body-area" class="to-top-btn" title="<?= Loc::getMessage('FOOTER_TO_TOP_BTN_TEXT'); ?>"><i class="fa-solid fa-angle-up"></i></a>

    <?= $siteparam_scripts_body_after; ?>
    <script>
        BX.message({
            FOOTER_SHOW_MORE_MORE_BTN: '<?= Loc::getMessage('FOOTER_SHOW_MORE_MORE_BTN'); ?>',
            FOOTER_SHOW_MORE_LESS_BTN: '<?= Loc::getMessage('FOOTER_SHOW_MORE_LESS_BTN'); ?>'
        });
    </script>
</body>
</html>