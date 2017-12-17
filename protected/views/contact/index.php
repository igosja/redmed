<?php
/**
 * @var $form   CActiveForm
 * @var $model  FeedBack
 * @var $o_page Contact
 */
?>
<section class="content">
    <div class="breadchambs">
        <div class="wrap">
            <?= $o_page['h1_' . Yii::app()->language]; ?>
        </div>
    </div>
    <div class="clearfix in-page wrap">
        <div class="clearfix">
            <h2 class="title"><?= $o_page['name_' . Yii::app()->language]; ?></h2>
            <div class="contacts-i">
                <div class="contacts-i__adress">
                    <?= $o_page['address_' . Yii::app()->language]; ?><br />
                    <a href="#map"><?= Yii::t('views.contact.index', 'link-map'); ?></a>
                </div>
            </div>
            <div class="contacts-i">
                <strong><?= $o_page['phone_city']; ?></strong>
                <strong><?= $o_page['phone_life']; ?></strong>
            </div>
            <div class="contacts-i">
                <a href="<?= $o_page['email']; ?>"><?= $o_page['email']; ?></a>
                <a href="#form"><?= Yii::t('views.contact.index', 'link-form'); ?></a><br />
                <a href="javascript:"><?= $this->createAbsoluteUrl('index/index', array('language' => 'ru')); ?></a>
            </div>
        </div>
    </div>
    <div id="map" data-lat="<?= $o_page['lat']; ?>" data-lng="<?= $o_page['lng']; ?>">
    </div>
    <div id="form" class="contacts__form">
        <div class="wrap clearfix">
            <h2 class="title"><?= Yii::t('views.contact.index', 'h2-form'); ?></h2>
            <?php $form = $this->beginWidget('CActiveForm', array(
                'enableAjaxValidation' => false,
                'enableClientValidation' => true,
                'id' => 'page-form'
            )); ?>
            <div class="clearfix">
                <?= $form->textField($model, 'name', array(
                    'class' => 'contacts-input',
                    'placeholder' => Yii::t('views.contact.index', 'placeholder-name')
                )); ?>
                <?= $form->error($model, 'name'); ?>
                <?= $form->textField($model, 'phone', array(
                    'class' => 'contacts-input phone_mask',
                    'placeholder' => Yii::t('views.contact.index', 'placeholder-phone')
                )); ?>
                <?= $form->error($model, 'phone'); ?>
                <?= $form->textField($model, 'email', array(
                    'class' => 'contacts-input',
                    'placeholder' => Yii::t('views.contact.index', 'placeholder-email')
                )); ?>
                <?= $form->error($model, 'email'); ?>
                <?= $form->textArea($model, 'text', array(
                    'class' => 'contacts-textarea',
                    'placeholder' => Yii::t('views.contact.index', 'placeholder-text')
                )); ?>
                <?= $form->error($model, 'text'); ?>
            </div>
            <?= CHtml::submitButton(
                Yii::t('views.contact.index', 'button-submit'),
                array('class' => 'btn-more')
            ); ?>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</section>