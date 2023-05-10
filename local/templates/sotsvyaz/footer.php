<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var CMain $APPLICATION
 * @var CMain $CurDir
 * @var CSite $arSite
 * @var COption $siteparam_main_logo
 * @var COption $siteparam_logo_name
 * @var COption $siteparam_logo_description
 * @var COption $siteparam_main_phone
 * @var COption $siteparam_main_phone_tel
 * @var COption $siteparam_schedule
 * @var COption $siteparam_main_email
 * @var COption $siteparam_main_address
 * @var COption $siteparam_whatsapp_number
 * @var COption $siteparam_whatsapp_number_tel
 * @var COption $siteparam_whatsapp_message
 * @var COption $siteparam_telegram_link
 * @var COption $siteparam_scripts_body_after
 */
use Bitrix\Main\Localization\Loc;
?>
        <?php if ((!($CurDir === '/')) && !(use_wide_template($CurDir) === true)): ?>
        </div>
        <?php endif; ?>
    </main>

    <footer class="main-footer">
        <div class="footer-content">
            <div class="container">
                <div class="row">
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
                        <a class="footer-contacts__logo logo"
                           title="<?= htmlspecialchars($arSite['SITE_NAME']); ?>"
                            <?php if ($CurDir !== '/'): ?> href="/"<?php endif; ?>>
                            <img src="<?= $siteparam_main_logo; ?>" class="logo__img" width="59" height="53" alt="<?= htmlspecialchars($arSite['SITE_NAME']); ?>">
                            <span class="logo__wrapper">
                                    <span class="logo__name"><?= $siteparam_logo_name; ?></span>
                                    <span class="logo__description"><?= $siteparam_logo_description; ?></span>
                                </span>
                        </a>
                        <a class="footer-contacts__phone-link" href="tel:<?= $siteparam_main_phone_tel; ?>"
                           title="<?= Loc::getMessage('FOOTER_MAIN_PHONE_TITLE'); ?>"><?= $siteparam_main_phone; ?></a>
                        <?php if ($siteparam_schedule): ?>
                            <div class="footer-contacts__schedule"><?= $siteparam_schedule; ?></div>
                        <?php endif; ?>
                        <button type="button"
                                class="btn btn-sm btn-info footer-contacts__callback-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#callbackModal"
                                data-bs-source="<?= Loc::getMessage('FOOTER_CALLBACK_BTN_DATA_SOURCE'); ?>"><?= Loc::getMessage('FOOTER_CALLBACK_BTN_TEXT'); ?></button>
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
                        <a href="mailto:<?= $siteparam_main_email; ?>" class="footer-contacts__email-link"><?= $siteparam_main_email; ?></a>
                        <div class="footer-contacts__address"><?= $siteparam_main_address; ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                &#169; <?= htmlspecialchars($arSite['SITE_NAME']); ?>, 2013-<?= date('Y'); ?> <?= Loc::getMessage('FOOTER_COPYRIGHT_YEARS_TEXT'); ?>. <?= Loc::getMessage('FOOTER_COPYRIGHT_RIGHTS_TEXT'); ?>.
                <a href="/privacy-policy/" class="footer-copyright__link"><?= Loc::getMessage('FOOTER_COPYRIGHT_PRIVACY_LINK_TEXT'); ?></a>
                <a href="/sitemap/" class="footer-copyright__link"><?= Loc::getMessage('FOOTER_COPYRIGHT_SITEMAP_LINK_TEXT'); ?></a>
            </div>
        </div>
    </footer>
<?= $siteparam_scripts_body_after; ?>
</body>
</html>