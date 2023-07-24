<?php
/** @var $block array */
use Bitrix\Main\Localization\Loc;
?>
<div class="sprint-contents">
    <div class="sprint-contents__title"><?= Loc::getMessage('SPRINT_EDITOR_CONTENTS_TITLE'); ?></div>
    <ul class="sprint-contents__list">
        <?php foreach ($block['elements'] as $item):
            $cssclass = 'level' . $item['level'];
        ?>
        <li class="sprint-contents__item <?= $cssclass ?>">
            <a href="#<?= $item['anchor'] ?>" class="sprint-contents__link"><?= $item['text']; ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
