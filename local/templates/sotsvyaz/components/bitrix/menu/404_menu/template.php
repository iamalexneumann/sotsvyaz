<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) {
    die();
    }
?>
<?php if (!empty($arResult)): ?>
<div class="sitemap">
    <ol class="sitemap__list">
    <?php
    $previousLevel = 0;
    foreach ($arResult as $arItem): ?>

        <?php if ($previousLevel && $arItem['DEPTH_LEVEL'] < $previousLevel):?>
            <?= str_repeat('</ol></li>', ($previousLevel - $arItem['DEPTH_LEVEL'])); ?>
        <?php endif; ?>

        <?php if ($arItem['IS_PARENT']):?>
            <?php if ($arItem['DEPTH_LEVEL'] == 1):?>
            <li class="sitemap__item">
                <a href="<?= $arItem['LINK']; ?>" class="sitemap__link"><?= $arItem['TEXT']; ?></a>
                <ol class="sitemap__sub-list">
            <?php else: ?>
            <li class="sitemap__item">
                <a href="<?= $arItem['LINK']; ?>" class="sitemap__link"><?= $arItem['TEXT']; ?></a>
                <ol class="sitemap__sub-list">
            <?php endif; ?>

        <?php else: ?>

            <?php if ($arItem['PERMISSION'] > 'D'):?>
                <?php if ($arItem['DEPTH_LEVEL'] == 1):?>
                <li class="sitemap__item">
                    <a href="<?= $arItem['LINK']; ?>" class="sitemap__link"><?= $arItem['TEXT']; ?></a>
                </li>
                <?php else: ?>
                <li class="sitemap__item">
                    <a href="<?= $arItem['LINK']; ?>" class="sitemap__link"><?= $arItem['TEXT']; ?></a>
                </li>
                <?php endif; ?>
            <?php endif; ?>

        <?php endif; ?>

        <?php $previousLevel = $arItem['DEPTH_LEVEL']; ?>

    <?php endforeach?>

    <?php if ($previousLevel > 1): ?>
        <?= str_repeat('</ol></li>', ($previousLevel - 1)); ?>
    <?php endif; ?>
    </ol>
</div>
<?php endif; ?>