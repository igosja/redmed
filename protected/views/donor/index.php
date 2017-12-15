<?php
/**
 * @var $o_page PageDonor
 */
?>
<section class="content">
    <div class="breadchambs">
        <div class="wrap">
            <?= $o_page['h1_' . Yii::app()->language]; ?>
        </div>
    </div>
    <div class="clearfix in-page wrap">
        <img src="<?= ImageIgosja::resize($o_page['image_id'], 1280, 450) ?>" alt="<?= $o_page['h1_' . Yii::app()->language]; ?>" style="margin-bottom: 25px;">
        <h2 class="title"><?= $o_page['h2_' . Yii::app()->language]; ?></h2>
        <?= $o_page['text_' . Yii::app()->language]; ?>
        <div class="don-three clearfix">
            <div class="don-three__i">
                <img src="/img/don-three-i-1.png" alt="">
                <div class="don-three__i__title">
                    <?= $o_page['title_1_' . Yii::app()->language]; ?>
                </div>
                <div class="don-three__i__text">
                    <?= $o_page['text_1_' . Yii::app()->language]; ?>
                </div>
            </div>

            <div class="don-three__i">
                <img src="/img/don-three-i-2.png" alt="">
                <div class="don-three__i__title">
                    <?= $o_page['title_2_' . Yii::app()->language]; ?>
                </div>
                <div class="don-three__i__text">
                    <?= $o_page['text_2_' . Yii::app()->language]; ?>
                </div>
            </div>

            <div class="don-three__i">
                <img src="/img/don-three-i-3.png" alt="">
                <div class="don-three__i__title">
                    <?= $o_page['title_3_' . Yii::app()->language]; ?>
                </div>
                <div class="don-three__i__text">
                    <?= $o_page['text_3_' . Yii::app()->language]; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="don-adr">
        <div class="wrap clearfix">
            <h2 class="title"><?= Yii::t('views.donor.index', 'where'); ?></h2>
            <div class="contacts-i">
                <div class="contacts-i__adress">
                    01051, Киев, ул. Ревуцького, 8, офис 15<br>
                </div>
                <strong>044 482 36 02</strong>
                <strong>093 129 80 46</strong>
            </div>
            <div class="contacts-i">
                <div class="contacts-i__adress">
                    01051, Киев, ул. Борщаговская, 23, офис 1<br>
                </div>
                <strong>044 482 36 00</strong>
                <strong>096 129 80 46</strong>
            </div>
        </div>
    </div>
    <div id="map-don"></div>
</section>