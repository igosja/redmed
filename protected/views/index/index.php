<?php
/**
 * @var $a_brand array
 * @var $a_slide array
 * @var $o_page PageMain
 */
?>
<section class="content">
    <div class="m-slider owl-carousel" id="slider">
        <?php foreach ($a_slide as $item) { ?>
            <div class="item" style="background: url(<?= ImageIgosja::resize($item['image_id'], 1920, 590) ?>) center top no-repeat;">
                <div class="wrap">
                    <h2 class="m-slider__title">
                        <?= $item['text_' . Yii::app()->language] ? nl2br($item['text_' . Yii::app()->language]) : ''; ?>
                    </h2>
                    <?php if ($item['url']) { ?>
                        <div class="centered">
                            <a href="<?= $item['url']; ?>" class="btn-more">
                                <?= $item['link_' . Yii::app()->language] ? $item['link_' . Yii::app()->language] : ''; ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="m-cat clearfix">
        <div class="wrap">
            <?= $this->renderPartial('/include/catalog'); ?>
        </div>
    </div>
    <div class="b-mhalf">
        <div class="wrap clearfix">
            <div class="b-mhalf__i">
                <div class="title">
                    <?= $o_page['title_1_' . Yii::app()->language]; ?>
                </div>
                <?= $o_page['text_1_' . Yii::app()->language]; ?>
            </div>
            <div class="b-mhalf__i">
                <div class="title">
                    <?= $o_page['title_2_' . Yii::app()->language]; ?>
                </div>
                <?= $o_page['text_2_' . Yii::app()->language]; ?>
                <?= CHtml::link(
                    Yii::t('views.index.index', 'link-about'),
                    array('about/index'),
                    array('class' => 'btn-more')
                )?>
            </div>
        </div>
    </div>
    <div class="b-brands">
        <div class="wrap">
            <div class="title">
                <?= Yii::t('views.index.index', 'brands'); ?>
            </div>
            <div class="brands owl-carousel">
                <?php foreach ($a_brand as $item) { ?>
                    <div class="item">
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
    </div>
    <div class="b-text">
        <div class="wrap">
            <h2 class="b-text__title">
                <?= $o_page['title_3_' . Yii::app()->language]; ?>
            </h2>
            <?= $o_page['title_3_' . Yii::app()->language]; ?>
        </div>
    </div>
</section>