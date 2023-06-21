<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>

<div class="page-contacts row">
    <div class="col-lg-7 col-xl-8">
    <?php if ($siteparam_api_key_yandex_map): ?>
        <script src="https://api-maps.yandex.ru/2.1?apikey=<?= $siteparam_api_key_yandex_map; ?>&lang=<?= LANGUAGE_ID; ?>"></script>
        <script>
            ymaps.ready(function () {
                const mainMap = new ymaps.Map("main-map", {
                    center: [<?= $siteparam_coors_yandex_map; ?>],
                    zoom: <?= $siteparam_zoom_yandex_map; ?>
                });

                mainPlacemark = new ymaps.Placemark([<?= $siteparam_coors_yandex_map; ?>], {
                    hintContent: "<?= htmlspecialchars($siteparam_logo_name); ?>",
                }, {
                    iconLayout: 'default#image',
                    iconImageHref: '<?= SITE_TEMPLATE_PATH; ?>/img/pin.png',
                    iconImageSize: [48, 64],
                    iconImageOffset: [-24, -64],
                });

                mainMap.geoObjects.add(mainPlacemark);
            });
        </script>
        <div id="main-map" class="page-contacts__map"></div>
    <?php endif; ?>
    </div>

    <div class="page-contacts__wrapper col-lg-5 col-xl-4">
        <a class="page-contacts__phone-link" href="tel:<?= $siteparam_main_phone_tel; ?>"
           title="Позвонить"><?= $siteparam_main_phone; ?></a>

        <?php if ($siteparam_address): ?>
        <div class="page-contacts__address">
            <i class="fa-solid fa-location-dot"></i>
            <?= $siteparam_address; ?>
        </div>
        <?php endif; ?>

        <?php if ($siteparam_schedule): ?>
        <div class="page-contacts__schedule">
            <i class="fa-regular fa-clock"></i>
            <?= $siteparam_schedule; ?>
        </div>
        <?php endif; ?>

        <?php if ($siteparam_whatsapp_number || $siteparam_telegram_link): ?>
        <ul class="messengers page-contacts__messengers">
            <?php if ($siteparam_telegram_link): ?>
            <li class="messengers__item">
                <a href="<?= $siteparam_telegram_link; ?>"
                   class="messengers__link messengers__link_telegram"
                   target="_blank"
                   title="Написать в Telegram">Telegram</a>
            </li>
            <?php endif; ?>
            <?php if ($siteparam_whatsapp_number): ?>
            <li class="messengers__item">
                <a href="https://wa.me/<?php echo $siteparam_whatsapp_number_tel; echo $siteparam_whatsapp_message ?: '' ?>"
                   class="messengers__link messengers__link_whatsapp"
                   target="_blank"
                   title="Написать в WhatsApp">WhatsApp</a>
            </li>
            <?php endif; ?>
        </ul>
        <?php endif; ?>

        <a href="mailto:<?= $siteparam_email; ?>" class="page-contacts__email-link"><?= $siteparam_email; ?></a>

        <button type="button"
                class="btn btn-sm btn-primary page-contacts__callback-btn"
                data-bs-toggle="modal"
                data-bs-target="#callbackModal"
                data-bs-modal-title="Заказать звонок">Заказать звонок</button>
    </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>