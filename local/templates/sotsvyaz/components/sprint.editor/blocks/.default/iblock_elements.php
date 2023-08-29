<?php /** @var $block array */ ?><?php
$elements = Sprint\Editor\Blocks\IblockElements::getList(
    $block, [
        'NAME',
        'DETAIL_PAGE_URL',
        'DETAIL_PICTURE',
        'PROPERTY_ATT_PRICE',
        'PROPERTY_ATT_BRAND',
    ]
);
$template = $block['settings']['template'];
use Bitrix\Main\Localization\Loc;
?>
<?php
switch ($template):
    case 'product':
?>
<section class="sprint-elements">
    <h2 class="sprint-elements__title"><?= Loc::getMessage('SPRINT_EDITOR_IBLOCK_ELEMENTS_PRODUCT_TITLE'); ?></h2>
    <div class="catalog-list row">
        <?php
        foreach ($elements as $aItem):
            $picture_arr = CFile::GetFileArray($aItem['DETAIL_PICTURE']);
            $picture = CFile::ResizeImageGet(
                $picture_arr,
                [
                    'width' => 650,
                    'height' => 650,
                ],
                BX_RESIZE_IMAGE_PROPORTIONAL,
                true
            );
            $picture_lqip = CFile::ResizeImageGet(
                $picture_arr,
                [
                    'width' => 100,
                    'height' => 100,
                ],
                BX_RESIZE_IMAGE_PROPORTIONAL,
                true
            );
        ?>
        <div class="col-xl-3 col-md-6 catalog-list__col">
            <article class="catalog-item">
                <a href="<?= $aItem['DETAIL_PAGE_URL']; ?>"
                   class="catalog-item__img-link"
                   title="<?= $aItem['NAME']; ?>"
                   rel="nofollow">
                    <img src="<?= $picture_lqip['src']; ?>"
                         data-src="<?= $picture['src']; ?>"
                         class="catalog-item__img lazyload blur-up"
                         alt="<?= $aItem['NAME']; ?>"
                         width="<?= $picture['width']; ?>"
                         height="<?= $picture['height']; ?>">
                </a>
                <div class="catalog-item__wrapper">
                    <header class="catalog-item__header">
                        <h3 class="catalog-item__title">
                            <a href="<?= $aItem['DETAIL_PAGE_URL']; ?>" class="catalog-item__link"><?= $aItem['NAME']; ?></a>
                        </h3>
                        <?php if ($aItem['PROPERTY_ATT_BRAND_VALUE']): ?>
                        <div class="catalog-item__brand"><?= Loc::getMessage('SPRINT_EDITOR_IBLOCK_ELEMENTS_BRAND'); ?>: <?= $aItem['PROPERTY_ATT_BRAND_VALUE']; ?></div>
                        <?php endif; ?>
                        <div class="catalog-item__price"><?= number_format($aItem['PROPERTY_ATT_PRICE_VALUE'], 0, '', ' ') . ' ' . Loc::getMessage('SPRINT_EDITOR_IBLOCK_ELEMENTS_CURRENCY'); ?></div>
                    </header>
                    <div class="catalog-item__btns">
                        <div class="catalog-item__quantity quantity">
                            <input type="button" value="−" class="btn quantity__btn quantity__btn_minus" data-field="quantity">
                            <input type="number" step="1" max="1000" value="1" min="1" name="quantity" class="quantity__field">
                            <input type="button" value="+" class="btn quantity__btn quantity__btn_plus" data-field="quantity">
                        </div>
                        <button class="btn btn-sm btn-primary catalog-item__btn-order" data-product-id="<?= $aItem['ID']; ?>">
                            <?= Loc::getMessage('SPRINT_EDITOR_IBLOCK_ELEMENTS_BUY_BTN_TEXT'); ?>
                        </button>
                    </div>
                </div>
            </article>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<?php
        break;
    case 'default':
    default:
?>
<div class="sprint-elements">
    <?php foreach ($elements as $aItem): ?>
    <article class="element-item">
        <a href="<?= $aItem['DETAIL_PAGE_URL']; ?>" class="element-item__link"><?= $aItem['NAME']; ?></a>
        <a href="<?= $aItem['DETAIL_PAGE_URL']; ?>" rel="nofollow" class="link-primary"><?= Loc::getMessage('SPRINT_EDITOR_IBLOCK_ELEMENTS_BTN_TEXT'); ?></a>
    </article>
    <?php endforeach; ?>
</div>
<?php
        break;
endswitch;
?>