<?php
/**
 * @var $o_page PageAbout
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
        <img src="<?= ImageIgosja::resize($o_page['image_id'], 1280, 450) ?>" alt="<?= $o_page['h1_' . Yii::app()->language]; ?>" style="margin-bottom: 25px;">
        <h2 class="title"><?= $o_page['title_1_' . Yii::app()->language]; ?></h2>
        <div class="clearfix">
            <div class="brands-half">
                <?= $o_page['text_11_' . Yii::app()->language]; ?>
            </div>
            <div class="brands-half">
                <?= $o_page['text_12_' . Yii::app()->language]; ?>
            </div>
        </div>

        <div class="about-text">
            <h2 class="title"><?= $o_page['title_2_' . Yii::app()->language]; ?></h2>
            <?= $o_page['text_2_' . Yii::app()->language]; ?>
            <div class="clearfix m-cat_in">
                <?= $this->renderPartial('/include/catalog'); ?>
            </div>
        </div>
    </div>
    <div class="b-text">
        <div class="wrap">
            <h2 class="b-text__title"><?= $o_page['title_3_' . Yii::app()->language]; ?></h2>
            <?= $o_page['text_3_' . Yii::app()->language]; ?>
        </div>
    </div>
</section>
