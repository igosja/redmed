<?php
/**
 * @var $form CActiveForm
 * @var $model Contact
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
        <ul class="nav nav-tabs">
            <li class="active"><a href="#main" data-toggle="tab">Общая информация</a></li>
            <li><a href="#seo" data-toggle="tab">SEO</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="main">
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'h1_ru'); ?></td>
                        <td>
                            <?= $form->textField($model, 'h1_ru', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'h1_ru'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'h1_uk'); ?></td>
                        <td>
                            <?= $form->textField($model, 'h1_uk', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'h1_uk'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'name_ru'); ?></td>
                        <td>
                            <?= $form->textField($model, 'name_ru', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'name_ru'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'name_uk'); ?></td>
                        <td>
                            <?= $form->textField($model, 'name_uk', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'name_uk'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3">
                            <?= $form->labelEx($model, 'address_ru'); ?>
                        </td>
                        <td>
                            <?= $form->textArea($model, 'address_ru', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'address_ru'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3">
                            <?= $form->labelEx($model, 'address_uk'); ?>
                        </td>
                        <td>
                            <?= $form->textArea($model, 'address_uk', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'address_uk'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'phone_city'); ?></td>
                        <td>
                            <?= $form->textField($model, 'phone_city', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'phone_city'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'phone_kyiv'); ?></td>
                        <td>
                            <?= $form->textField($model, 'phone_kyiv', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'phone_kyiv'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'phone_life'); ?></td>
                        <td>
                            <?= $form->textField($model, 'phone_life', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'phone_life'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'email'); ?></td>
                        <td>
                            <?= $form->textField($model, 'email', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'email'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'email_letter'); ?></td>
                        <td>
                            <?= $form->textField($model, 'email_letter', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'email_letter'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'lat'); ?></td>
                        <td>
                            <?= $form->textField($model, 'lat', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'lat'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'lng'); ?></td>
                        <td>
                            <?= $form->textField($model, 'lng', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'lng'); ?>
                        </td>
                    </tr>
                </table>
            </div>
            <?= $this->renderPartial('/include/seo-form', array('model' => $model, 'form' => $form)) ?>
        </div>
        <p class="text-center">
            <?= CHtml::submitButton('Сохранить', array('class' => 'btn btn-default text-center')); ?>
        </p>
        <?php $this->endWidget(); ?>
    </div>
</div>