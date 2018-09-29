<?php
/**
 * @var $form  CActiveForm
 * @var $model Product
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center"><?= $this->h1; ?></h1>
        <ul class="list-inline preview-links text-center">
            <li>
                <?= CHtml::link(
                    'Назад',
                    isset($model->id) ? array('view', 'id' => $model->id) : array('index'),
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
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        )); ?>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#main" data-toggle="tab">Общая информация</a></li>
            <li><a href="#seo" data-toggle="tab">SEO</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="main">
                <table class="table table-striped table-bordered table-hover">
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'sku'); ?></td>
                        <td>
                            <?= $form->textField($model, 'sku', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'sku'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'category_id'); ?></td>
                        <td>
                            <?= $form->dropDownList($model, 'category_id',
                                CHtml::listData(Category::model()->findAll(), 'id', 'h1_ru'),
                                array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'category_id'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'brand_id'); ?></td>
                        <td>
                            <?= $form->dropDownList($model, 'brand_id',
                                CHtml::listData(Brand::model()->findAll(), 'id', 'h1_ru'),
                                array('class' => 'form-control', 'prompt' => 'Нет')); ?>
                            <?= $form->error($model, 'brand_id'); ?>
                        </td>
                    </tr>
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
                        <td class="col-lg-3"><?= $form->labelEx($model, 'url'); ?></td>
                        <td>
                            <?= $form->textField($model, 'url', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'url'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'order'); ?></td>
                        <td>
                            <?= $form->textField($model, 'order', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'order'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'price_usd'); ?></td>
                        <td>
                            <?= $form->textField($model, 'price_usd', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'price_usd'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'price_eur'); ?></td>
                        <td>
                            <?= $form->textField($model, 'price_eur', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'price_eur'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'price_pln'); ?></td>
                        <td>
                            <?= $form->textField($model, 'price_pln', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'price_pln'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'price_cny'); ?></td>
                        <td>
                            <?= $form->textField($model, 'price_cny', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'price_cny'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'discount'); ?></td>
                        <td>
                            <?= $form->textField($model, 'discount', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'discount'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'video'); ?></td>
                        <td>
                            <?= $form->textField($model, 'video', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'video'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'pdf_field'); ?></td>
                        <td>
                            <input type="file" name="pdf[]" class="form-control" multiple="multiple" />
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'image'); ?></td>
                        <td>
                            <input type="file" name="image[]" class="form-control" multiple/>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'use_ru'); ?></td>
                        <td>
                            <?= $form->textField($model, 'use_ru', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'use_ru'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'use_uk'); ?></td>
                        <td>
                            <?= $form->textField($model, 'use_uk', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'use_uk'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'table_ru'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'table_ru', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'table_ru'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'table_ru_excel'); ?></td>
                        <td>
                            <input type="file" name="table_ru_excel" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'table_uk'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'table_uk', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'table_uk'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'table_uk_excel'); ?></td>
                        <td>
                            <input type="file" name="table_uk_excel" class="form-control" />
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'text_ru'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'text_ru', array('class' => 'ckeditor')); ?>
                            <?= $form->error($model, 'text_ru'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'text_uk'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'text_uk', array('class' => 'ckeditor')); ?>
                            <?= $form->error($model, 'text_uk'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'technical_ru'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'technical_ru', array('class' => 'ckeditor')); ?>
                            <?= $form->error($model, 'technical_ru'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'technical_uk'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'technical_uk', array('class' => 'ckeditor')); ?>
                            <?= $form->error($model, 'technical_uk'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'filter_field'); ?></td>
                        <td>
                            <div class="checkbox-overflow">
                                <?= $form->checkBoxList(
                                    $model,
                                    'filter_field',
                                    CHtml::listData(Filter::model()->findAll(), 'id', 'h1_ru')
                                ); ?>
                            </div>
                            <?= $form->error($model, 'filter_field'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'analog_field'); ?></td>
                        <td>
                            <div class="checkbox-overflow">
                                <?= $form->checkBoxList(
                                    $model,
                                    'analog_field',
                                    CHtml::listData(Product::model()->findAll(), 'id', 'h1_ru')
                                ); ?>
                            </div>
                            <?= $form->error($model, 'analog_field'); ?>
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
