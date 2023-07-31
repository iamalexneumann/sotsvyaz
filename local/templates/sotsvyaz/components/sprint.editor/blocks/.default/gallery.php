<?php
/**
 * @var array $block
 * @var CMain $APPLICATION
 * @var CBitrixComponentTemplate $this
 */
use Bitrix\Main\Localization\Loc;
$rand_id = rand(100000, 999999);
switch ($block['settings']['type']) {
    case 'carousel':
        $images = Sprint\Editor\Blocks\Gallery::getImages(
            $block,
            [
                'width'  => 100,
                'height' => 100,
                'exact'  => 0,
            ],
            [
                'width'  => 1300,
                'height' => 1300,
                'exact'  => 0,
            ]
        );
        break;
    case 'tiles':
        $titles_row = $block['settings']['tiles_row'];
        switch ($titles_row) {
            case 'two':
                $img_wigth = 700;
                $extended_class = 'col-sm-6';
                break;
            case 'three':
                $img_wigth = 500;
                $extended_class = 'col-lg-4 col-sm-6';
                break;
            case 'four':
                $img_wigth = 400;
                $extended_class = 'col-xl-3 col-md-4 col-sm-6';
                break;
        }
        $images = Sprint\Editor\Blocks\Gallery::getImages(
            $block,
            [
                'width'  => 100,
                'height' => 100,
                'exact'  => 1,
            ],
            [
                'width'  => $img_wigth,
                'height' => $img_wigth,
                'exact'  => 1,
            ]
        );
        $use_fancybox = $block['settings']['fancybox'];
        break;
} ?>
<?php if (!empty($images)): ?>
    <?php
    switch ($block['settings']['type']):
        case 'carousel':
    ?>
    <figure role="group" id="carousel<?= $rand_id; ?>" class="carousel slide carousel-fade<?php if ($block['settings']['carousel']) echo ' carousel-' . $block['settings']['carousel']; ?>">
        <div class="carousel-indicators">
            <?php foreach ($images as $key => $image): ?>
            <button type="button" data-bs-target="#carouselContacts" data-bs-slide-to="<?= $key; ?>"
                    <?= ($key === 0) ? 'class="active" aria-current="true"' : '' ?>
                    aria-label="<?= Loc::getMessage('SPRINT_EDITOR_GALLERY_CAROUSEL_INDICATOR_TEXT') . ' №' . $key + 1; ?>"></button>
            <?php endforeach; ?>
        </div>
        <div class="carousel-inner">
            <?php foreach ($images as $key => $image): ?>
            <figure class="carousel-item<?= ($key === 0) ? ' active' : '' ?>">
                <img src="<?= $image['SRC']; ?>"
                     data-src="<?= $image['DETAIL_SRC']; ?>"
                     class="carousel-img lazyload"
                     alt="<?= $image['DESCRIPTION']; ?>">
                <figcaption class="carousel-caption"><?= $image['DESCRIPTION']; ?></figcaption>
            </figure>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel<?= $rand_id; ?>" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden"><?= Loc::getMessage('SPRINT_EDITOR_GALLERY_CAROUSEL_PREV_BTN_TEXT'); ?></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel<?= $rand_id; ?>" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden"><?= Loc::getMessage('SPRINT_EDITOR_GALLERY_CAROUSEL_NEXT_BTN_TEXT'); ?></span>
        </button>
    </figure>
    <?php
            break;
        case 'tiles':
    ?>
    <figure role="group" class="gallery">
        <div class="row gallery__row">
            <?php foreach ($images as $key => $image): ?>
            <div class="<?= $extended_class; ?> gallery__col">
                <figure class="gallery-item">
                    <<?= ($use_fancybox === 'Y') ? 'a href="' . $image['ORIGIN_SRC'] . '"' : 'div'; ?>
                       class="gallery-item__img-link"
                        <?php if ($use_fancybox === 'Y'): ?>
                       data-fancybox="gallery<?= $rand_id; ?>"
                        <?php if ($image['DESCRIPTION']): ?>
                       data-caption="<?= $image['DESCRIPTION']; ?>"
                        <?php endif; ?>
                        <?php endif; ?>>
                        <img src="<?= $image['SRC']; ?>"
                             data-src="<?= $image['DETAIL_SRC']; ?>"
                             class="gallery-item__img lazyload"
                             width="<?= $img_wigth; ?>"
                             alt="<?= $image['DESCRIPTION']; ?>">
                    </<?= ($use_fancybox === 'Y') ? 'a' : 'div'; ?>>
                    <?php if ($image['DESCRIPTION']): ?>
                    <figcaption class="gallery-item__figcaption"><?= $image['DESCRIPTION']; ?></figcaption>
                    <?php endif; ?>
                </figure>
            </div>
            <?php endforeach; ?>
        </div>
    </figure>
    <?php
            break;
    endswitch;
    ?>
<?php endif; ?>
