<?php
/**
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
                <div class="item">
                    <img src="img/brands/brands-1.png" alt="">
                </div>
                <div class="item">
                    <img src="img/brands/brands-2.png" alt="">
                </div>
                <div class="item">
                    <img src="img/brands/brands-3.png" alt="">
                </div>
                <div class="item">
                    <img src="img/brands/brands-4.png" alt="">
                </div>
                <div class="item">
                    <img src="img/brands/brands-5.png" alt="">
                </div>
                <div class="item">
                    <img src="img/brands/brands-1.png" alt="">
                </div>
                <div class="item">
                    <img src="img/brands/brands-2.png" alt="">
                </div>
                <div class="item">
                    <img src="img/brands/brands-3.png" alt="">
                </div>
                <div class="item">
                    <img src="img/brands/brands-4.png" alt="">
                </div>
                <div class="item">
                    <img src="img/brands/brands-5.png" alt="">
                </div>
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