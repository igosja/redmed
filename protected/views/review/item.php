<?php
/**
 * @var $item Review
 */
?>
<div class="otz-i">
    <div class="otz-i__name">
        <?= $item['name']; ?>
    </div>
    <div class="otz-i__date">
        <?= date('d.m.Y / H:i', $item['date']); ?>
    </div>
    <p class="otz-i__text">
        <?= CHtml::encode($item['text']); ?>
    </p>
</div>