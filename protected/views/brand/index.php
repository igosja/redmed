<?php
/**
 * @var $a_brand array
 * @var $o_page PageBrand
 */
?>
<section class="content">
    <div class="breadchambs">
        <div class="wrap">
            <?= $o_page['h1_' . Yii::app()->language]; ?>
        </div>
    </div>
    <?= $this->renderPartial('/include/bread'); ?>
    <div class="clearfix in-page wrap">
        <div class="clearfix">
            <div class="brands-half">
                <?= $o_page['text_1_' . Yii::app()->language]; ?>
            </div>
            <div class="brands-half">
                <?= $o_page['text_2_' . Yii::app()->language]; ?>
            </div>
        </div>
        <div class="p-brands clearfix">
            <h2 class="title">
                <?= Yii::t('views.brand.index', 'brands'); ?>
            </h2>
            <?php foreach ($a_brand as $item) { ?>
                <div class="p-brands__it">
                    <?= CHtml::link(
                        '<img
                                src="' . ImageIgosja::resize($item['image_id'], 120, 120, 0) . '"
                                alt="' . $item['h1_' . Yii::app()->language]. '"
                        />',
                        array('catalog/index', 'brand[]' => $item['id'])
                    )?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
