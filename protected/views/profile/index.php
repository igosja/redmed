<?php
/**
 * @var $o_user User
 */
?>
<section class="content">
    <div class="breadchambs">
        <div class="wrap">
            <?= Yii::t('views.profile.index', 'h1'); ?>
        </div>
    </div>
    <div class="clearfix in-page wrap">
        <h2 class="title">
            <?= Yii::t('views.profile.index', 'hello'); ?>,
            <?= $o_user['name']; ?>!
        </h2>
        <div class="lk-m-item">
            <img src="/img/lk-m-item-1.png" alt="">
            <div class="lk-m-item__title"><?= Yii::t('views.profile.index', 'profile'); ?></div>
            <div class="lk-m-item__text">
                <?= Yii::t('views.profile.index', 'update-profile'); ?>
            </div>
            <?= CHtml::link(
                Yii::t('views.profile.index', 'link-info'),
                array('view'),
                array('class' => 'btn-more')
            ); ?>
        </div>
        <div class="lk-m-item">
            <img src="/img/lk-m-item-2.png" alt="">
            <div class="lk-m-item__title"><?= Yii::t('views.profile.index', 'product'); ?></div>
            <div class="lk-m-item__text">
                <?= Yii::t('views.profile.index', 'order-product'); ?>
            </div>
            <?= CHtml::link(
                Yii::t('views.profile.index', 'link-product'),
                array('product'),
                array('class' => 'btn-more')
            ); ?>
        </div>
        <div class="lk-m-item">
            <img src="/img/lk-m-item-3.png" alt="">
            <div class="lk-m-item__title"><?= Yii::t('views.profile.index', 'order'); ?></div>
            <div class="lk-m-item__text">
                <?= Yii::t('views.profile.index', 'manage-order'); ?>
            </div>
            <?= CHtml::link(
                Yii::t('views.profile.index', 'link-order'),
                array('order'),
                array('class' => 'btn-more')
            ); ?>
        </div>
        <div class="lk-m-item">
            <img src="/img/lk-m-item-4.png" alt="">
            <div class="lk-m-item__title"><?= Yii::t('views.profile.index', 'info'); ?></div>
            <div class="lk-m-item__text">
                <?= Yii::t('views.profile.index', 'catalog-and-other'); ?>
            </div>
            <?= CHtml::link(
                Yii::t('views.profile.index', 'link-info'),
                array('info'),
                array('class' => 'btn-more')
            ); ?>
        </div>
    </div>
</section>
