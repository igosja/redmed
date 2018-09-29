<?php
/**
 * @var $form  CActiveForm
 * @var $model Order
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center"><?= $this->h1; ?></h1>
        <ul class="list-inline preview-links text-center">
            <li>
                <?= CHtml::link(
                    'Назад',
                    array('view', 'id' => $model->id),
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
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <td class="col-lg-3"><?= $form->labelEx($model, 'email'); ?></td>
                <td>
                    <?= $form->textField($model, 'email', array('class' => 'form-control')); ?>
                    <?= $form->error($model, 'email'); ?>
                </td>
            </tr>
            <tr>
                <td class="col-lg-3"><?= $form->labelEx($model, 'name'); ?></td>
                <td>
                    <?= $form->textField($model, 'name', array('class' => 'form-control')); ?>
                    <?= $form->error($model, 'name'); ?>
                </td>
            </tr>
            <tr>
                <td class="col-lg-3"><?= $form->labelEx($model, 'phone'); ?></td>
                <td>
                    <?= $form->textField($model, 'phone', array('class' => 'form-control')); ?>
                    <?= $form->error($model, 'phone'); ?>
                </td>
            </tr>
            <tr>
                <td class="col-lg-3"><?= $form->labelEx($model, 'shipping'); ?></td>
                <td>
                    <?= $form->dropDownList(
                        $model,
                        'shipping',
                        CHtml::listData(
                            Shipping::model()->findAllByAttributes(array('order' => '`order`')),
                            'name_ru',
                            'name_ru'
                        ),
                        array('empty' => 'Доставка', 'class' => 'form-control')
                    ); ?>
                    <?= $form->error($model, 'shipping'); ?>
                </td>
            </tr>
        </table>
        <p class="text-center">
            Товары:
        </p>
        <table class="table table-striped table-bordered table-hover order-product-table">
            <tr>
                <th class="col-md-7">Товар</th>
                <th class="col-md-4">Количество</th>
                <th>
                    <a href="javascript:" class="order-product-add">
                        Добавить
                    </a>
                </th>
            </tr>
            <?php foreach ($model['product'] as $key => $item) { ?>
                <tr data-key="<?= $key; ?>">
                    <td class="col-lg-3">
                        <?= CHtml::dropDownList(
                            'Product[' . $key . '][product_id]',
                            $item['product_id'],
                            CHtml::listData(Product::model()->findAll(array('order' => 'h1_ru')), 'id', 'h1_ru'),
                            array('class' => 'form-control')
                        ); ?>
                    </td>
                    <td>
                        <?= CHtml::textField(
                            'Product[' . $key . '][quantity]',
                            $item['quantity'],
                            array('class' => 'form-control')
                        ); ?>
                    </td>
                    <td class="text-center">
                        <a href="javascript:" class="order-product-delete">
                            Удалить
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <p class="text-center">
            <?= CHtml::submitButton('Сохранить', array('class' => 'btn btn-default text-center')); ?>
        </p>
        <?php $this->endWidget(); ?>
    </div>
</div>
<div class="order-product-select-div" style="display: none;">
    <?= CHtml::dropDownList(
        'Product[0][product_id]',
        $item['product_id'],
        CHtml::listData(Product::model()->findAll(array('order' => 'h1_ru')), 'id', 'h1_ru'),
        array('class' => 'form-control')
    ); ?>
</div>
