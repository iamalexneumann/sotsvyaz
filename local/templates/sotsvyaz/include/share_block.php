<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
use Bitrix\Main\Localization\Loc;
?>
<div class="share-section">
    <div class="share-section__title"><?= Loc::getMessage('SHARE_SECTION_TITLE') ?></div>
    <div class="share-section__subtitle"><?= Loc::getMessage('SHARE_SECTION_SUBTITLE') ?></div>
    <script src="https://yastatic.net/share2/share.js"></script>
    <div class="ya-share2 section__module" data-curtain data-services="vkontakte,odnoklassniki,telegram,viber,whatsapp"></div>
</div>