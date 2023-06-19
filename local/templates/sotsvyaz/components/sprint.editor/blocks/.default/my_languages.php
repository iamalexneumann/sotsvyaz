<?php /**
 * @var $block array
 * @var $this  SprintEditorBlocksComponent
 */ ?><?php
$images = Sprint\Editor\Blocks\Gallery::getImages(
    $block, [
    'width'  => 350,
//    'height' => 300,
    'exact'  => 0,
]
);
?>

<?php if (!empty($images)) { ?>
<div class="languages-alt-list">
    <?php foreach ($images as $image) { ?>
    <div class="languages-alt-item">
        <img alt="<?= $image['DESCRIPTION'] ?>" src="<?= $image['SRC'] ?>" class="languages-alt-item__img">
        <?php if (!empty($image['DESCRIPTION'])) { ?>
        <div class="languages-alt-item__description"><?= $image['DESCRIPTION'] ?></div>
        <?php } ?>
    </div>
    <?php } ?>
</div>
<?php } ?>
