<?php
/**
 * @var $form CActiveForm
 * @var $model User
 */
?>
<section class="content">
    <div class="enter-bg">
        <div class="wrap">
            <div class="e-form">
                <?php $form = $this->beginWidget('CActiveForm', array(
                    'enableAjaxValidation' => false,
                    'enableClientValidation' => true,
                )); ?>
                    <div class="e-form__t">
                        <div class="e-form__title">
                            <?= Yii::t('views.site.login', 'h1'); ?>
                        </div>
                        <?= $form->textField($model, 'login', array(
                            'class' => 'e-form__input',
                            'placeholder' => Yii::t('views.site.login', 'placeholder-login')
                        )); ?>
                        <?= $form->error($model, 'login'); ?>
                        <?= $form->passwordField($model, 'password', array(
                            'class' => 'e-form__input',
                            'placeholder' => Yii::t('views.site.login', 'placeholder-password')
                        )); ?>
                        <?= $form->error($model, 'login'); ?>
                        <div class="clearfix">
                            <a href="javascript:" data-selector="form-password" class="forget-pass overlayElementTrigger">
                                <?= Yii::t('views.site.login', 'link-forget'); ?>
                            </a>
                        </div>
                        <?= CHtml::submitButton(
                            Yii::t('views.site.login', 'button-submit'),
                            array('class' => 'e-form__submit')
                        ); ?>
                    </div>
                    <div class="e-form__b">
                        <?= Yii::t('views.site.login', 'no-account'); ?>
                        <?= CHtml::link(
                            Yii::t('views.site.login', 'link-signup'),
                            array('signup')
                        ); ?>
                    </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</section>