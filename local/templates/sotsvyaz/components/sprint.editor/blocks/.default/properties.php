<?php
/** @var $block array */
use Bitrix\Main\Localization\Loc;
?>
<div class="table-responsive">
    <table class="table table-bordered">
        <caption><?= Loc::getMessage('PROPERTIES_TABLE_CAPTION'); ?></caption>
        <tbody>
            <?php foreach ($block['elements'] as $item): ?>
            <tr>
                <th scope="row"><?= $item['title'] ?></th>
                <td><?= $item['text'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>