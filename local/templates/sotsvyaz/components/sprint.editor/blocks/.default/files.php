<?php /**
 * @var $block array
 * @var $this  SprintEditorBlocksComponent
 */ ?><?php
?>

<?php if (!empty($block['files'])) { ?>
<div class="sp-lists mt-3">
    <ol>
        <?php foreach ($block['files'] as $item) { ?>
        <li><a download="<?= $item['file']['ORIGINAL_NAME']; ?>" title="<?= $item['desc']; ?>" href="<?= $item['file']['SRC']; ?>"><?= $item['desc'] ?: $item['file']['ORIGINAL_NAME']; ?></a></li>
        <?php } ?>
    </ol>
</div>
<?php } ?>
