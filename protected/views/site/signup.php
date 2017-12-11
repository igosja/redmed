<?php
/**
 * @var $a_usertype array
 * @var $form       CActiveForm
 * @var $model      User
 */
?>
<section class="content">
    <div class="log-page">
        <div class="wrap">
            <h1 class="log-page__title">
                <?= Yii::t('views.site.signup', 'h1'); ?>
            </h1>
            <div class="reg">
                <?php $form = $this->beginWidget('CActiveForm', array(
                    'enableAjaxValidation' => false,
                    'enableClientValidation' => true,
                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                )); ?>
                <div class="clearfix">
                    <div class="reg__half">
                        <label class="log-label">
                            <?= Yii::t('views.site.signup', 'label-name'); ?><span></span>
                        </label>
                        <?= $form->textField($model, 'name', array('class' => 'log-input')); ?>
                        <?= $form->error($model, 'name'); ?>
                    </div>
                    <div class="reg__half">
                        <label class="log-label">
                            <?= Yii::t('views.site.signup', 'label-phone'); ?><span></span>
                        </label>
                        <?= $form->textField($model, 'phone', array('class' => 'log-input phone_mask')); ?>
                        <?= $form->error($model, 'phone'); ?>
                    </div>
                    <div class="reg__half">
                        <label class="log-label">
                            <?= Yii::t('views.site.signup', 'label-email'); ?><span></span>
                        </label>
                        <?= $form->textField($model, 'email', array('class' => 'log-input')); ?>
                        <?= $form->error($model, 'email'); ?>
                    </div>
                    <div class="reg__half">
                        <label class="log-label">
                            <?= Yii::t('views.site.signup', 'label-address'); ?><span></span>
                        </label>
                        <?= $form->textField($model, 'address', array('class' => 'log-input')); ?>
                        <?= $form->error($model, 'address'); ?>
                    </div>
                </div>
                <label class="log-label">
                    <?= Yii::t('views.site.signup', 'label-usertype'); ?><span></span>
                </label>
                <div class="jqui-select">
                    <?= $form->dropDownList(
                        $model,
                        'usertype_id',
                        CHtml::listData($a_usertype, 'id', 'h1_' . Yii::app()->language)
                    ); ?>
                </div>
                <?= $form->error($model, 'usertype_id'); ?>
                <a href="javascript:" class="reg__add_file">
                    <?= Yii::t('views.site.signup', 'link-file'); ?>
                </a>
                <input type="file" name="image[]" id="upload-file" multiple />
                <input type="hidden" name="image-remove" id="upload-file-remove" />
                <div class="centered">
                    <?= CHtml::submitButton('', array('style' => 'display:none;')); ?>
                    <a href="javascript:" class="btn submit-link">
                        <?= Yii::t('views.site.signup', 'submit'); ?>
                    </a>
                </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</section>