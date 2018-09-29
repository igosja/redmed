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
                        <td class="col-lg-3">
                            <?= $form->labelEx($model, 'address_book_ru'); ?>
                        </td>
                        <td>
                            <?= $form->textArea($model, 'address_book_ru', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'address_book_ru'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3">
                            <?= $form->labelEx($model, 'address_book_uk'); ?>
                        </td>
                        <td>
                            <?= $form->textArea($model, 'address_book_uk', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'address_book_uk'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3">
                            <?= $form->labelEx($model, 'address_direct_ru'); ?>
                        </td>
                        <td>
                            <?= $form->textArea($model, 'address_direct_ru', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'address_direct_ru'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3">
                            <?= $form->labelEx($model, 'address_direct_uk'); ?>
                        </td>
                        <td>
                            <?= $form->textArea($model, 'address_direct_uk', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'address_direct_uk'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3">
                            <?= $form->labelEx($model, 'address_tender_ru'); ?>
                        </td>
                        <td>
                            <?= $form->textArea($model, 'address_tender_ru', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'address_tender_ru'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3">
                            <?= $form->labelEx($model, 'address_tender_uk'); ?>
                        </td>
                        <td>
                            <?= $form->textArea($model, 'address_tender_uk', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'address_tender_uk'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3">
                            <?= $form->labelEx($model, 'address_warehouse_ru'); ?>
                        </td>
                        <td>
                            <?= $form->textArea($model, 'address_warehouse_ru', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'address_warehouse_ru'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3">
                            <?= $form->labelEx($model, 'address_warehouse_uk'); ?>
                        </td>
                        <td>
                            <?= $form->textArea($model, 'address_warehouse_uk', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'address_warehouse_uk'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'phone'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'phone', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'phone'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'phone_book'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'phone_book', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'phone_book'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'phone_direct'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'phone_direct', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'phone_direct'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'phone_tender'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'phone_tender', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'phone_tender'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'phone_warehouse'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'phone_warehouse', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'phone_warehouse'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'email'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'email', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'email'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'email_book'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'email_book', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'email_book'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'email_direct'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'email_direct', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'email_direct'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'email_tender'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'email_tender', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'email_tender'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'email_warehouse'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'email_warehouse', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'email_warehouse'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'skype'); ?></td>
                        <td>
                            <?= $form->textField($model, 'skype', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'skype'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'url'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'url', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'url'); ?>
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
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'lat_warehouse'); ?></td>
                        <td>
                            <?= $form->textField($model, 'lat_warehouse', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'lat_warehouse'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'lng_warehouse'); ?></td>
                        <td>
                            <?= $form->textField($model, 'lng_warehouse', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'lng_warehouse'); ?>
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
