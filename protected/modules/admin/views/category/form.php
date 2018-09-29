<?php
/**
 * @var $form  CActiveForm
 * @var $model Category
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
                        <td class="col-lg-3"><?= $form->labelEx($model, 'text_ru'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'text_ru', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'text_ru'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'text_uk'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'text_uk', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'text_uk'); ?>
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
                        <td class="col-lg-3"><?= $form->labelEx($model, 'image_id'); ?></td>
                        <td>
                            <?php if (isset($model['image']['url'])) { ?>
                                <div class="col-lg-6">
                                    <a href="javascript:" class="thumbnail">
                                        <img src="<?= $model['image']['url']; ?>"/>
                                    </a>
                                </div>
                                <?= CHtml::link('<i class="fa fa-times"></i>', array('image', 'id' => $model['image_id'])); ?>
                            <?php } else { ?>
                                <input type="file" name="image" class="form-control"/>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'text_1_ru'); ?></td>
                        <td>
                            <?= $form->textField($model, 'text_1_ru', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'text_1_ru'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'text_1_uk'); ?></td>
                        <td>
                            <?= $form->textField($model, 'text_1_uk', array('class' => 'form-control')); ?>
                            <?= $form->error($model, 'text_1_uk'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'text_2_ru'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'text_2_ru', array('class' => 'ckeditor')); ?>
                            <?= $form->error($model, 'text_2_ru'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'text_2_uk'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'text_2_uk', array('class' => 'ckeditor')); ?>
                            <?= $form->error($model, 'text_2_uk'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'seotext_ru'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'seotext_ru', array('class' => 'ckeditor')); ?>
                            <?= $form->error($model, 'seotext_ru'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-lg-3"><?= $form->labelEx($model, 'seotext_uk'); ?></td>
                        <td>
                            <?= $form->textArea($model, 'seotext_uk', array('class' => 'ckeditor')); ?>
                            <?= $form->error($model, 'seotext_uk'); ?>
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
