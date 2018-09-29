<?php
/**
 * @var $model Order
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header text-center"><?= $this->h1; ?></h1>
        <ul class="list-inline preview-links text-center">
            <li>
                <?= CHtml::link(
                    'Список',
                    array('index'),
                    array('class' => 'btn btn-default')
                ); ?>
            </li>
            <li>
                <?= CHtml::link(
                    'Изменить',
                    array('update', 'id' => $model->primaryKey),
                    array('class' => 'btn btn-default')
                ); ?>
            </li>
        </ul>
    </div>
</div>
<?php
$attributes = array(
    'id',
    array(
        'name' => 'status',
        'type' => 'raw',
        'value' => CHtml::dropDownList(
            'status',
            $model['status'],
            CHtml::listData(OrderStatus::model()->findAll(array('order' => 'name')), 'id', 'name'),
            array('class' => 'form-control order-status', 'data-order' => $model['id'])
        ),
    ),
    array(
        'name' => 'date',
        'value' => date('H:i d.m.Y', $model['date']),
    ),
    array(
        'name' => 'user_id',
        'type' => 'raw',
        'value' => isset($model['user']) ? CHtml::link(
            $model['user']['name'] ? $model['user']['name'] : $model['user']['login'],
            array('user/view', 'id' => $model['user_id']),
            array('target' => '_blank')
        ) : 'Удалён',
    ),
    'email',
    'name',
    'phone',
    'shipping',
    array(
        'name' => 'total',
        'value' => Yii::app()->numberFormatter->formatDecimal($model['total']) . ' грн',
    ),
    array(
        'name' => 'comment',
        'type' => 'raw',
        'value' => nl2br($model['comment']),
    ),
);
$this->widget('zii.widgets.CDetailView', array(
    'attributes' => $attributes,
    'data' => $model,
    'htmlOptions' => array('class' => 'table'),
    'itemCssClass' => '',
    'itemTemplate' => '<tr data-controller="' . $this->uniqueid . '"><td class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">{label}</td><td>{value}</td></tr>',
    'nullDisplay' => '-',
));
?>
<table class="table table-striped table-bordered">
    <tr>
        <th>Товар</th>
        <th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Количество</th>
        <th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Цена</th>
        <th class="col-lg-2 col-md-2 col-sm-2 col-xs-2">Сумма</th>
    </tr>
    <?php foreach ($model['product'] as $item) { ?>
        <tr>
            <td><?= $item['product_ru']; ?></td>
            <td><?= $item['quantity']; ?></td>
            <td><?= Yii::app()->numberFormatter->formatDecimal($item['price']); ?> грн</td>
            <td><?= Yii::app()->numberFormatter->formatDecimal($item['total']); ?> грн</td>
        </tr>
    <?php } ?>
</table>