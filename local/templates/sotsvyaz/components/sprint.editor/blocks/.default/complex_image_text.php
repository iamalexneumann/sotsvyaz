<?php
/**
 * @var array $block
 */

$image_lqip = Sprint\Editor\Blocks\Image::getImage(
    $block['image'], [
        'width'  => 100,
//        'height' => 100,
        'exact'  => 0,
    ]
);

$image = Sprint\Editor\Blocks\Image::getImage(
    $block['image'], [
        'width'  => 700,
//        'height' => 500,
        'exact'  => 0,
    ]
);
$block_align = $block['settings']['align'];
$text = Sprint\Editor\Blocks\Text::getValue($block['text']);
$use_fancybox = $block['settings']['fancybox'];
?>

<div class="clearfix pt-3 pb-3">
    <?php if ($image) { ?>
    <figure class="figure-media<?php if ($block_align): echo ' figure-media_float-' . $block_align; endif; ?>">
        <<?= ($use_fancybox === 'Y') ? 'a href="' . $image['ORIGIN_SRC'] . '"' : 'div'; ?>
           class="figure-media__img-link"
           <?php if ($use_fancybox === 'Y'): ?>
           data-fancybox="sprint-image"
            <?php if ($image['DESCRIPTION']): ?>
            data-caption="<?= $image['DESCRIPTION']; ?>"
            <?php endif; ?>
            <?php endif; ?>>
            <img src="<?= $image_lqip['SRC']; ?>"
                 data-src="<?= $image['SRC']; ?>"
                 class="figure-media__img lazyload blur-up"
                 width="850"
                 alt="<?= $image['DESCRIPTION']; ?>">
        </<?= ($use_fancybox === 'Y') ? 'a' : 'div'; ?>>
        <?php if ($image['DESCRIPTION']): ?>
        <figcaption class="figure-media__figcaption"><?= $image['DESCRIPTION']; ?></figcaption>
        <?php endif; ?>
    </figure>
    <?php } ?>
    <div class="content<?= ($block_align == 'left') ? ' content-left-ul' : ''; ?>">
        <?= $text ?>
    </div>
</div>
