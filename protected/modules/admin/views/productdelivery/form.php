<?php
/**
 * @var $form CActiveForm
 * @var $model PageCatalog
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center"><?= $this->h1; ?></h1>
        <ul class="list-inline preview-links text-center">
            <li>
                <?= CHtml::link(
                    'Назад',
                    array('index'),
                    array('class' => 'btn btn-default')
                ); ?>
            </li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
        )); ?>
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <td class="col-lg-3"><?= $form->labelEx($model, 'delivery_h3_ru'); ?></td>
                <td>
                    <?= $form->textField($model, 'delivery_h3_ru', array('class' => 'form-control')); ?>
                    <?= $form->error($model, 'delivery_h3_ru'); ?>
                </td>
            </tr>
            <tr>
                <td class="col-lg-3"><?= $form->labelEx($model, 'delivery_h3_uk'); ?></td>
                <td>
                    <?= $form->textField($model, 'delivery_h3_uk', array('class' => 'form-control')); ?>
                    <?= $form->error($model, 'delivery_h3_uk'); ?>
                </td>
            </tr>
            <tr>
                <td class="col-lg-3"><?= $form->labelEx($model, 'delivery_text_ru'); ?></td>
                <td>
                    <?= $form->textArea($model, 'delivery_text_ru', array('class' => 'ckeditor')); ?>
                    <?= $form->error($model, 'delivery_text_ru'); ?>
                </td>
            </tr>
            <tr>
                <td class="col-lg-3"><?= $form->labelEx($model, 'delivery_text_uk'); ?></td>
                <td>
                    <?= $form->textArea($model, 'delivery_text_uk', array('class' => 'ckeditor')); ?>
                    <?= $form->error($model, 'delivery_text_uk'); ?>
                </td>
            </tr>
            <tr>
                <td class="col-lg-3"><?= $form->labelEx($model, 'payment_h3_ru'); ?></td>
                <td>
                    <?= $form->textField($model, 'payment_h3_ru', array('class' => 'form-control')); ?>
                    <?= $form->error($model, 'payment_h3_ru'); ?>
                </td>
            </tr>
            <tr>
                <td class="col-lg-3"><?= $form->labelEx($model, 'payment_h3_uk'); ?></td>
                <td>
                    <?= $form->textField($model, 'payment_h3_uk', array('class' => 'form-control')); ?>
                    <?= $form->error($model, 'payment_h3_uk'); ?>
                </td>
            </tr>
            <tr>
                <td class="col-lg-3"><?= $form->labelEx($model, 'payment_text_ru'); ?></td>
                <td>
                    <?= $form->textArea($model, 'payment_text_ru', array('class' => 'ckeditor')); ?>
                    <?= $form->error($model, 'payment_text_ru'); ?>
                </td>
            </tr>
            <tr>
                <td class="col-lg-3"><?= $form->labelEx($model, 'payment_text_uk'); ?></td>
                <td>
                    <?= $form->textArea($model, 'payment_text_uk', array('class' => 'ckeditor')); ?>
                    <?= $form->error($model, 'payment_text_uk'); ?>
                </td>
            </tr>
        </table>
        <p class="text-center">
            <?= CHtml::submitButton('Сохранить', array('class' => 'btn btn-default text-center')); ?>
        </p>
        <?php $this->endWidget(); ?>
    </div>
</div>
