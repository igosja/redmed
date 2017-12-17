<?php
/**
 * @var $form   CActiveForm
 * @var $o_user User
 */
?>
<section class="content">
    <div class="breadchambs">
        <div class="wrap">
            <?= Yii::t('views.profile.update', 'h1'); ?>
        </div>
    </div>
    <div class="clearfix in-page wrap">
        <h2 class="title title_profile"><?= Yii::t('views.profile.update', 'h2'); ?></h2>
        <div class="clearfix lk-form">
            <?php $form = $this->beginWidget('CActiveForm', array(
                'enableAjaxValidation' => false,
                'enableClientValidation' => true,
            )); ?>
                <div class="lk-profile__three">
                    <?= $form->labelEx($o_user, 'name'); ?>
                    <?= $form->textField($o_user, 'name', array('class' => 'e-form__input')); ?>
                    <?= $form->error($o_user, 'name'); ?>
                </div>
                <div class="lk-profile__three">
                    <?= $form->labelEx($o_user, 'phone'); ?>
                    <?= $form->textField($o_user, 'phone', array('class' => 'e-form__input phone_mask')); ?>
                    <?= $form->error($o_user, 'phone'); ?>
                </div>
                <div class="lk-profile__three">
                    <?= $form->labelEx($o_user, 'email'); ?>
                    <?= $form->textField($o_user, 'email', array('class' => 'e-form__input')); ?>
                    <?= $form->error($o_user, 'email'); ?>
                </div>
                <div class="lk-profile__three lk-profile__three_w">
                    <?= $form->labelEx($o_user, 'address'); ?>
                    <?= $form->textField($o_user, 'address', array('class' => 'e-form__input')); ?>
                    <?= $form->error($o_user, 'address'); ?>
                </div>
                <?= CHtml::link(
                    Yii::t('views.profile.update', 'link-cancel'),
                    array('view'),
                    array('class' => 'lk-form__exit')
                ); ?>
                <?= CHtml::submitButton(
                    Yii::t('views.profile.update', 'button-submit'),
                    array('class' => 'lk-form__sbm')
                ); ?>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</section>