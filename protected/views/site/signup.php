<?php
/**
 * @var $form  CActiveForm
 * @var $model User
 */
?>
<section class="content">
    <div class="enter-bg enter-bg_reg">
        <div class="wrap">
            <div class="e-form e-form__reg">
                <?php $form = $this->beginWidget('CActiveForm', array(
                    'enableAjaxValidation' => false,
                    'enableClientValidation' => true,
                )); ?>
                    <div class="e-form__t">
                        <div class="e-form__title">
                            <?= Yii::t('views.site.signup', 'h1'); ?>
                        </div>
                        <?= $form->textField($model, 'name', array(
                            'class' => 'e-form__input',
                            'placeholder' => Yii::t('views.site.signup', 'placeholder-name'),
                        )); ?>
                        <?= $form->error($model, 'name'); ?>
                        <div class="clearfix">
                            <div class="e-form__half">
                                <?= $form->textField($model, 'phone', array(
                                    'class' => 'e-form__input phone_mask',
                                    'placeholder' => Yii::t('views.site.signup', 'placeholder-phone'),
                                )); ?>
                                <?= $form->error($model, 'phone'); ?>
                            </div>
                            <div class="e-form__half">
                                <?= $form->textField($model, 'usertype', array(
                                    'class' => 'e-form__input',
                                    'placeholder' => Yii::t('views.site.signup', 'placeholder-usertype'),
                                )); ?>
                                <?= $form->error($model, 'usertype'); ?>
                            </div>
                            <div class="e-form__half">
                                <?= $form->textField($model, 'email', array(
                                    'class' => 'e-form__input',
                                    'placeholder' => Yii::t('views.site.signup', 'placeholder-email'),
                                )); ?>
                                <?= $form->error($model, 'email'); ?>
                            </div>
                            <div class="e-form__half">
                                <?= $form->textField($model, 'address', array(
                                    'class' => 'e-form__input',
                                    'placeholder' => Yii::t('views.site.signup', 'placeholder-address'),
                                )); ?>
                                <?= $form->error($model, 'email'); ?>
                            </div>
                            <?= $form->textField($model, 'message', array(
                                'class' => 'e-form__input hiden-mess',
                                'placeholder' => Yii::t('views.site.signup', 'placeholder-message'),
                            )); ?>
                            <?= $form->error($model, 'message'); ?>
                            <a href="javascript:" class="forget-pass show-mess">
                                <?= Yii::t('views.site.signup', 'link-message'); ?>
                            </a>
                            <?= CHtml::submitButton(
                                Yii::t('views.site.signup', 'button-submit'),
                                array('class' => 'e-form__submit')
                            ); ?>
                        </div>
                    </div>
                    <div class="e-form__b">
                        <?= Yii::t('views.site.signup', 'already'); ?>
                        <?= CHtml::link(
                            Yii::t('views.site.signup', 'link-login'),
                            array('login')
                        ); ?>
                    </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</section>