<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var CMain $APPLICATION
 * @var CMain $CurDir
 * @var CSite $arSite
 * @var COption $siteparam_main_logo
 * @var COption $siteparam_footer_logo
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
    <?php require($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/include/main_form.php'); ?>
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
    <?= $siteparam_scripts_body_after; ?>
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

<svg width="0" height="0" class="hidden d-none">
    <symbol version="1.0" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512.000000 512.000000" id="arrow">
        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#115cfa" stroke="none">
            <path d="M1965 4786 c-126 -55 -120 -247 8 -295 19 -7 194 -11 505 -12 l477 0
-1302 -1297 c-919 -915 -1304 -1305 -1309 -1325 -19 -81 38 -202 104 -221 82
-23 13 -87 1414 1306 714 710 1300 1289 1303 1287 2 -3 0 -209 -5 -458 -9
-434 -9 -456 9 -497 52 -117 222 -119 283 -3 16 32 20 92 34 630 8 327 14 642
12 701 -3 103 -4 108 -33 138 -60 63 -19 60 -777 60 -554 -1 -699 -3 -723 -14z"></path>
            <path d="M4591 3479 c-27 -8 -332 -306 -1333 -1301 -714 -710 -1300 -1289
-1303 -1287 -2 3 0 209 5 458 9 434 9 456 -9 497 -52 117 -222 119 -283 2 -17
-32 -20 -90 -34 -624 -8 -324 -14 -639 -12 -701 l3 -112 35 -36 c19 -19 50
-40 70 -46 23 -6 277 -9 732 -7 689 3 697 3 725 24 15 11 39 36 51 55 20 28
23 44 20 92 -4 46 -10 63 -34 88 -16 17 -38 36 -49 42 -14 9 -163 13 -508 17
l-487 5 1294 1285 c712 707 1301 1300 1310 1318 32 67 14 134 -53 195 -22 20
-47 37 -54 37 -6 0 -21 2 -32 4 -11 3 -35 0 -54 -5z"></path>
        </g>
    </symbol>
    <symbol version="1.0" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512.000000 512.000000" id="connector-2">
        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#115cfa" stroke="none">
            <path d="M0 3920 l0 -1200 300 0 300 0 0 -994 c0 -1075 0 -1065 54 -1210 37
-97 89 -179 169 -263 166 -175 384 -262 622 -249 352 19 639 253 737 601 l23
80 5 1725 5 1725 23 56 c80 198 268 329 472 329 204 0 392 -131 472 -329 l23
-56 5 -1425 5 -1425 23 -80 c64 -232 217 -418 427 -520 114 -56 185 -74 310
-81 234 -13 436 66 606 235 90 91 138 162 184 276 54 136 54 138 55 1213 l0
992 150 0 150 0 0 900 0 900 -450 0 -450 0 0 -900 0 -900 150 0 150 0 0 -979
c0 -620 -4 -998 -10 -1032 -39 -206 -214 -372 -425 -402 -240 -35 -472 114
-551 353 -18 52 -19 134 -24 1485 l-5 1430 -24 70 c-70 209 -202 373 -382 474
-156 87 -358 120 -531 87 -305 -60 -528 -258 -630 -561 l-23 -70 -5 -1730 c-5
-1644 -6 -1733 -24 -1785 -58 -174 -197 -304 -367 -345 -275 -64 -557 118
-609 394 -6 34 -10 412 -10 1032 l0 979 300 0 300 0 0 1200 0 1200 -750 0
-750 0 0 -1200z m1200 750 l0 -150 -150 0 -150 0 0 -150 0 -150 150 0 150 0 0
-150 0 -150 -450 0 -450 0 0 150 0 150 150 0 150 0 0 150 0 150 -150 0 -150 0
0 150 0 150 450 0 450 0 0 -150z m3620 0 l0 -150 -150 0 -150 0 0 150 0 150
150 0 150 0 0 -150z m0 -750 l0 -300 -150 0 -150 0 0 300 0 300 150 0 150 0 0
-300z m-3620 -600 l0 -300 -450 0 -450 0 0 300 0 300 450 0 450 0 0 -300z"></path>
        </g>
    </symbol>
    <symbol version="1.0" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512.000000 512.000000" id="box">
        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#115cfa" stroke="none">
            <path d="M1371 4644 c-647 -266 -1166 -484 -1179 -497 -55 -51 -52 46 -52
-1587 0 -1633 -3 -1536 52 -1587 32 -31 2327 -973 2369 -973 33 0 2305 927
2349 959 14 10 35 33 48 51 l22 33 0 1517 0 1517 -22 33 c-13 18 -34 41 -48
51 -48 34 -2316 959 -2351 959 -21 -1 -472 -181 -1188 -476z m1465 30 c143
-58 262 -109 266 -113 8 -7 -1779 -787 -1796 -783 -22 6 -581 236 -589 242 -9
7 1809 758 1839 759 12 1 138 -47 280 -105z m1142 -470 c238 -97 429 -180 425
-184 -4 -4 -421 -176 -925 -383 l-917 -376 -402 165 c-222 91 -409 168 -415
172 -7 4 160 82 384 180 218 95 622 271 897 392 275 120 505 217 510 216 6 -2
205 -84 443 -182z m-3152 -577 l349 -143 5 -445 c5 -414 6 -446 24 -476 60
-99 217 -93 274 10 15 28 18 76 22 404 l5 371 445 -183 445 -183 3 -1291 2
-1291 -44 18 c-24 9 -460 188 -969 397 l-927 380 0 1288 c0 725 4 1287 9 1287
5 0 165 -64 357 -143z m3834 -1144 l0 -1288 -238 -97 c-174 -71 -1587 -652
-1690 -695 -10 -4 -12 254 -10 1287 l3 1292 955 393 c525 216 961 394 968 394
9 1 12 -263 12 -1286z"></path>
        </g>
    </symbol>
    <symbol version="1.0" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512.000000 512.000000" id="wifi-router">
        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#115cfa" stroke="none">
            <path d="M2260 4945 c-470 -68 -885 -263 -1223 -575 -88 -82 -107 -112 -107
-170 0 -98 84 -166 180 -145 20 4 70 40 128 92 292 258 573 402 939 480 121
26 143 28 383 28 240 0 263 -2 381 -28 369 -79 653 -223 941 -480 68 -60 108
-88 132 -92 96 -18 176 48 176 145 0 58 -19 88 -107 170 -313 289 -703 483
-1133 562 -149 27 -543 35 -690 13z"></path>
            <path d="M83 4340 c-41 -25 -63 -59 -70 -109 -5 -36 37 -139 406 -1000 226
-528 411 -962 411 -965 0 -3 -104 -6 -230 -6 -206 0 -237 -2 -291 -20 -147
-50 -254 -165 -294 -315 -22 -88 -22 -1032 0 -1120 21 -78 58 -145 114 -201
95 -97 183 -131 361 -141 l120 -6 0 -91 c0 -67 5 -100 18 -126 53 -107 211
-107 264 0 13 26 18 59 18 128 l0 92 1650 0 1650 0 0 -92 c0 -69 5 -102 18
-128 53 -107 211 -107 264 0 13 26 18 59 18 126 l0 91 120 6 c178 10 272 47
364 143 53 55 91 123 111 199 22 88 22 1032 0 1120 -40 151 -145 265 -294 315
-54 18 -85 20 -291 20 -126 0 -230 3 -230 6 0 3 185 437 411 965 369 861 411
964 406 1000 -3 22 -13 51 -22 65 -50 77 -175 86 -237 18 -9 -11 -212 -476
-452 -1034 l-435 -1015 -1401 0 -1401 0 -435 1015 c-240 558 -443 1023 -452
1034 -44 48 -132 61 -189 26z m4668 -2403 c71 -47 70 -35 67 -584 -3 -482 -3
-492 -24 -520 -12 -15 -36 -37 -55 -48 -34 -20 -52 -20 -2179 -20 -2127 0
-2145 0 -2179 20 -19 11 -43 33 -55 48 -21 28 -21 38 -24 520 -3 549 -4 537
67 584 l34 23 2157 0 2157 0 34 -23z"></path>
            <path d="M3079 1637 c-62 -41 -69 -70 -69 -272 0 -151 3 -186 18 -215 53 -107
211 -107 264 0 15 29 18 64 18 215 0 151 -3 186 -18 215 -25 50 -75 80 -132
80 -32 0 -58 -7 -81 -23z"></path>
            <path d="M3679 1637 c-62 -41 -69 -70 -69 -272 0 -151 3 -186 18 -215 53 -107
211 -107 264 0 15 29 18 64 18 215 0 151 -3 186 -18 215 -25 50 -75 80 -132
80 -32 0 -58 -7 -81 -23z"></path>
            <path d="M4279 1637 c-62 -41 -69 -70 -69 -272 0 -151 3 -186 18 -215 53 -107
211 -107 264 0 15 29 18 64 18 215 0 151 -3 186 -18 215 -25 50 -75 80 -132
80 -32 0 -58 -7 -81 -23z"></path>
            <path d="M2355 4354 c-323 -48 -600 -168 -840 -364 -100 -82 -153 -142 -160
-183 -18 -97 48 -177 145 -177 53 0 69 9 164 93 255 225 553 337 896 337 344
0 639 -111 896 -337 95 -84 111 -93 164 -93 99 0 166 84 145 181 -14 62 -191
220 -362 323 -145 87 -330 159 -510 197 -78 17 -139 22 -303 24 -113 2 -218 1
-235 -1z"></path>
            <path d="M2372 3749 c-145 -25 -328 -107 -446 -198 -121 -94 -160 -153 -149
-228 7 -44 57 -100 103 -114 60 -18 100 -5 171 57 84 73 175 127 274 160 114
39 295 46 415 15 115 -29 213 -80 312 -162 51 -42 96 -71 116 -75 103 -20 195
79 172 182 -16 72 -187 213 -343 284 -142 64 -227 82 -407 86 -91 1 -189 -1
-218 -7z"></path>
            <path d="M2413 3137 c-79 -28 -165 -90 -192 -138 -71 -126 61 -265 192 -204
18 8 47 26 66 40 47 34 115 34 162 0 82 -60 152 -71 210 -32 67 45 88 132 46
198 -82 134 -311 198 -484 136z"></path>
        </g>
    </symbol>
    <symbol version="1.0" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512.000000 512.000000" id="antenna">
        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#115cfa" stroke="none">
            <path d="M2778 5099 c-23 -12 -46 -35 -58 -59 -19 -38 -20 -58 -20 -680 l0
-640 -150 0 -150 0 0 490 c0 472 -1 492 -20 530 -23 45 -80 80 -130 80 -50 0
-107 -35 -130 -80 -19 -38 -20 -58 -20 -530 l0 -490 -150 0 -150 0 0 390 c0
372 -1 393 -20 430 -23 45 -80 80 -130 80 -50 0 -107 -35 -130 -80 -19 -37
-20 -58 -20 -430 l0 -390 -150 0 -150 0 0 240 c0 222 -2 244 -20 280 -23 45
-80 80 -130 80 -50 0 -107 -35 -130 -80 -18 -36 -20 -58 -20 -280 l0 -240
-150 0 -150 0 0 90 c0 112 -20 159 -80 190 -50 25 -90 25 -140 0 -60 -31 -80
-78 -80 -190 l0 -90 -90 0 c-112 0 -159 -20 -190 -80 -25 -50 -25 -90 0 -140
31 -60 78 -80 190 -80 l90 0 0 -90 c0 -112 20 -159 80 -190 50 -25 90 -25 140
0 60 31 80 78 80 190 l0 90 150 0 150 0 0 -240 c0 -222 2 -244 20 -280 23 -45
80 -80 130 -80 50 0 107 35 130 80 18 36 20 58 20 280 l0 240 150 0 150 0 0
-390 c0 -372 1 -393 20 -430 23 -45 80 -80 130 -80 50 0 107 35 130 80 19 37
20 58 20 430 l0 390 150 0 150 0 0 -490 c0 -472 1 -492 20 -530 23 -45 80 -80
130 -80 50 0 107 35 130 80 19 38 20 58 20 530 l0 490 150 0 150 0 0 -640 c0
-622 1 -642 20 -680 23 -45 80 -80 130 -80 50 0 107 35 130 80 19 38 20 58 20
680 l0 640 150 0 150 0 0 -265 c0 -247 1 -269 20 -305 13 -26 34 -47 60 -60
36 -18 58 -20 280 -20 l240 0 0 800 0 800 -240 0 c-222 0 -244 -2 -280 -20
-26 -13 -47 -34 -60 -60 -19 -36 -20 -58 -20 -305 l0 -265 -150 0 -150 0 0
640 c0 622 -1 642 -20 680 -37 73 -127 99 -202 59z"></path>
            <path d="M4278 5099 c-23 -12 -46 -35 -58 -59 -20 -39 -20 -54 -20 -2480 0
-2427 0 -2441 20 -2480 36 -70 70 -80 280 -80 210 0 244 10 280 80 20 39 20
55 20 1690 l0 1650 100 0 c81 0 108 4 140 20 45 23 80 80 80 130 0 50 -35 107
-80 130 -32 16 -59 20 -140 20 l-100 0 0 640 c0 622 -1 642 -20 680 -36 71
-69 80 -282 80 -162 -1 -187 -3 -220 -21z"></path>
        </g>
    </symbol>
    <symbol version="1.0" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512.000000 512.000000" id="repiter">
        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#115cfa" stroke="none">
            <path d="M2465 5114 c-11 -2 -45 -9 -75 -15 -219 -45 -433 -228 -523 -449 -43
-106 -51 -149 -51 -275 0 -139 22 -234 81 -350 l35 -70 -386 -382 -386 -382
-82 39 c-123 59 -193 74 -333 74 -66 0 -140 -6 -165 -12 -281 -77 -492 -289
-561 -562 -18 -71 -18 -269 0 -340 69 -274 287 -492 561 -561 78 -20 269 -18
350 4 113 30 239 99 322 176 41 39 85 86 99 105 13 20 29 36 36 36 11 0 755
-264 771 -274 5 -3 0 -45 -10 -93 -62 -301 -13 -665 127 -944 279 -557 866
-888 1473 -831 362 34 665 174 921 425 537 526 600 1362 149 1967 -27 36 -86
103 -131 149 -400 408 -983 550 -1537 376 -108 -35 -308 -138 -405 -209 -178
-131 -361 -339 -445 -506 -12 -25 -24 -47 -26 -49 -2 -2 -178 59 -391 134
l-388 138 0 116 c0 154 -28 267 -96 382 l-27 46 337 334 c185 184 359 356 387
382 l51 48 69 -34 c92 -47 143 -63 243 -77 375 -55 737 193 832 570 8 31 14
105 14 170 0 65 -6 139 -14 170 -68 269 -277 482 -546 557 -51 14 -243 26
-280 17z m176 -304 c235 -45 399 -275 361 -506 -32 -196 -180 -344 -376 -376
-289 -48 -556 219 -508 508 42 252 277 420 523 374z m-1810 -1810 c235 -45
399 -275 361 -506 -32 -196 -180 -344 -376 -376 -289 -48 -556 219 -508 508
42 252 277 420 523 374z m3024 -325 c750 -156 1169 -957 864 -1652 -44 -98
-97 -189 -156 -261 l-35 -43 -48 98 c-88 184 -205 307 -404 428 -14 9 -12 15
20 55 103 127 145 313 109 485 -57 270 -309 475 -585 475 -324 0 -600 -276
-600 -600 0 -123 50 -269 124 -360 32 -40 34 -46 20 -55 -199 -121 -316 -244
-404 -428 l-48 -98 -35 43 c-212 261 -301 636 -232 973 118 575 624 978 1205
961 69 -2 161 -12 205 -21z m-113 -743 c59 -26 124 -91 151 -151 16 -34 22
-66 22 -121 0 -91 -24 -149 -85 -210 -61 -61 -119 -85 -210 -85 -336 0 -413
464 -95 578 62 22 153 18 217 -11z m79 -905 c166 -56 301 -169 377 -313 43
-85 78 -193 69 -217 -14 -37 -253 -138 -409 -174 -102 -23 -374 -23 -476 0
-156 36 -395 137 -409 174 -9 24 26 132 69 217 68 130 195 243 338 300 133 53
306 58 441 13z"></path>
        </g>
    </symbol>
    <symbol version="1.0" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512.000000 512.000000" id="jack-connector">
        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#115cfa" stroke="none">
            <path d="M610 4820 l0 -300 -150 0 -150 0 0 -755 0 -755 149 0 149 0 5 -292
c4 -309 8 -336 62 -463 83 -192 313 -385 501 -421 l33 -6 3 -537 c4 -518 5
-539 26 -616 91 -326 341 -570 669 -652 103 -26 323 -23 428 6 317 85 557 326
647 646 l23 80 5 1100 c5 1094 5 1100 26 1157 96 251 379 366 622 251 73 -34
170 -131 204 -203 35 -76 48 -144 48 -255 l0 -95 -123 0 -122 0 -178 -355
-177 -355 0 -700 0 -700 150 0 150 0 0 -300 0 -300 450 0 450 0 0 300 0 300
150 0 150 0 0 700 0 700 -177 355 -178 355 -122 0 -123 0 0 110 c0 235 -72
419 -221 569 -421 421 -1143 203 -1263 -381 -14 -67 -16 -209 -16 -1126 0
-1012 -1 -1052 -20 -1126 -28 -111 -73 -189 -160 -276 -86 -87 -162 -131 -276
-160 -98 -25 -190 -25 -288 0 -111 28 -189 73 -276 160 -87 86 -131 162 -160
276 -19 72 -20 112 -20 574 l0 496 52 14 c238 61 442 263 520 518 19 60 22 99
25 360 l5 292 149 0 149 0 0 755 0 755 -150 0 -150 0 0 300 0 300 -150 0 -150
0 0 -300 0 -300 -150 0 -150 0 0 -755 0 -755 150 0 150 0 0 -245 c0 -273 -6
-320 -57 -417 -63 -121 -183 -206 -323 -230 -230 -40 -459 118 -509 350 -6 31
-11 153 -11 297 l0 245 150 0 150 0 0 755 0 755 -150 0 -150 0 0 300 0 300
-150 0 -150 0 0 -300z m300 -1055 l0 -455 -150 0 -150 0 0 455 0 455 150 0
150 0 0 -455z m1200 0 l0 -455 -150 0 -150 0 0 455 0 455 150 0 150 0 0 -455z
m2278 -1600 l122 -245 0 -510 0 -510 -450 0 -450 0 0 510 0 510 122 245 123
245 205 0 205 0 123 -245z m-178 -1715 l0 -150 -150 0 -150 0 0 150 0 150 150
0 150 0 0 -150z"></path>
        </g>
    </symbol>
    <symbol version="1.0" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512.000000 512.000000" id="jack">
        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#115cfa" stroke="none">
            <path d="M2330 5108 c-584 -55 -1160 -365 -1536 -828 -284 -351 -455 -760
-504 -1212 -6 -63 -10 -565 -10 -1418 l0 -1320 165 0 165 0 0 -165 0 -165 170
0 170 0 0 165 0 165 165 0 165 0 0 310 0 310 83 -52 c192 -121 482 -238 712
-288 311 -67 659 -67 970 0 230 50 520 167 713 288 l82 52 0 -310 0 -310 165
0 165 0 0 -165 0 -165 170 0 170 0 0 165 0 165 165 0 165 0 0 1320 c0 853 -4
1355 -10 1418 -79 727 -482 1358 -1105 1730 -417 248 -903 357 -1395 310z
m505 -344 c187 -26 429 -100 596 -184 431 -217 784 -611 951 -1060 85 -230
122 -432 122 -680 0 -523 -199 -1005 -569 -1375 -298 -298 -655 -480 -1085
-552 -144 -24 -436 -24 -580 0 -430 72 -787 254 -1085 552 -488 487 -679 1185
-510 1855 85 335 261 643 512 893 246 247 541 417 875 506 253 67 501 82 773
45z m-2188 -3166 c67 -104 217 -291 277 -347 l26 -24 0 -279 0 -278 -170 0
-170 0 0 485 c0 267 2 485 5 485 3 0 17 -19 32 -42z m3863 -443 l0 -485 -170
0 -170 0 0 278 0 279 26 24 c60 56 210 243 277 347 15 23 29 42 32 42 3 0 5
-218 5 -485z"></path>
            <path d="M2334 4435 c-364 -54 -681 -218 -939 -486 -223 -232 -372 -530 -426
-853 -27 -160 -22 -427 11 -581 67 -315 216 -590 441 -814 309 -310 701 -472
1139 -472 438 0 830 162 1139 472 225 224 374 499 441 814 33 154 38 421 11
581 -134 788 -809 1358 -1601 1353 -69 -1 -166 -7 -216 -14z m347 -325 c150
-15 248 -41 394 -103 505 -213 823 -769 754 -1317 -68 -553 -470 -989 -1019
-1107 -119 -25 -381 -25 -500 0 -251 54 -478 177 -654 353 -89 90 -141 158
-205 269 -252 441 -220 984 82 1395 125 170 324 328 512 407 141 60 245 88
375 102 122 12 146 12 261 1z"></path>
            <path d="M2365 3763 c-468 -100 -788 -536 -744 -1013 21 -227 120 -433 286
-591 186 -177 397 -262 653 -262 256 0 467 85 653 262 166 158 265 364 286
591 44 481 -279 917 -751 1014 -97 20 -288 20 -383 -1z m375 -341 c267 -94
429 -314 430 -583 0 -230 -136 -449 -342 -547 -98 -48 -161 -62 -268 -62 -107
0 -170 14 -269 62 -67 32 -101 56 -160 117 -88 88 -133 165 -161 277 -89 346
133 689 490 758 55 10 226 -3 280 -22z"></path>
        </g>
    </symbol>
</svg>
</body>
</html>