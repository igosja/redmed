<?php
/**
 * @var $form CActiveForm
 * @var $model Forget
 */
?>
<section class="content">
    <div class="log-page">
        <div class="wrap">
            <h1 class="log-page__title">
                <?= Yii::t('views.site.forget', 'h1'); ?>
            </h1>
            <div class="login">
                <?php $form = $this->beginWidget('CActiveForm', array(
                    'enableAjaxValidation' => false,
                    'enableClientValidation' => true,
                )); ?>
                    <label class="log-label"><?= Yii::t('views.site.forget', 'label-email'); ?></label>
                    <?= $form->textField($model, 'email', array('autofocus' => true, 'class' => 'log-input log-input__login')); ?>
                    <?= $form->error($model, 'email'); ?>
                    <div class="centered">
                        <?= CHtml::submitButton('', array('style' => 'display:none;')); ?>
                        <a href="javascript:" class="btn submit-link">
                            <?=Yii::t('views.site.forget', 'submit'); ?>
                        </a>
                        <div class="login__text">
                            <?=Yii::t('views.site.forget', 'or'); ?>
                            <?= CHtml::link(
                                Yii::t('views.site.forget', 'link-login'),
                                array('site/login')
                            ); ?>
                        </div>
                    </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</section>