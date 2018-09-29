<?php
/**
 * @var $a_category array
 * @var $a_news    array
 * @var $a_product array
 * @var $o_page    array
 */
?>
<section class="content">
    <div class="breadchambs">
        <div class="wrap">
            <?= Yii::t('views.search.index', 'seo-title'); ?>
        </div>
    </div>
    <?= $this->renderPartial('/include/bread'); ?>
    <div class="clearfix in-page wrap">
        <div class="clearfix">
            <?php foreach ($a_category as $item) { ?>
                <?= $this->renderPartial('item', array('item' => $item, 'model' => 'category')); ?>
            <?php } ?>
            <?php foreach ($a_product as $item) { ?>
                <?= $this->renderPartial('item', array('item' => $item, 'model' => 'product')); ?>
            <?php } ?>
        </div>
    </div>
</section>
